<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use PDF;
use App\Pengajuan;
use App\File_pengajuan;
use Excel;
use PHPExcel_Worksheet_Drawing;

class AdminPengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('admin.pengajuan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $file_pengajuan = File_pengajuan::where('pengajuan_id','=',$id)->get();
      $pengajuan = Pengajuan::join('tbl_perusahaan','tbl_pengajuan.perusahaan_id','=','tbl_perusahaan.perusahaan_id')
                  ->join('tbl_program','tbl_pengajuan.program_id','=','tbl_program.program_id')
                  ->where('tbl_pengajuan.pengajuan_id','=',$id)
                  ->get();
      return view('admin.pengajuan.lihat',compact('pengajuan','file_pengajuan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $pengajuan = Pengajuan::find($id);
      echo json_encode($pengajuan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $stt_query = Pengajuan::find($id);
      $stt = $stt_query->pengajuan_status;
      if ($stt == "4") {
        $pengajuan = Pengajuan::find($id);
        $pengajuan ->pengajuan_status = "1";
        $pengajuan->update();
      }elseif ($stt == "1") {
        $pengajuan = Pengajuan::find($id);
        $pengajuan ->pengajuan_status = "2";
        $pengajuan->update();
      }elseif ($stt == "2") {
        $pengajuan = Pengajuan::find($id);
        $pengajuan ->pengajuan_status = "3";
        $pengajuan->update();
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $stt_query = Pengajuan::find($id);
      $stt = $stt_query->pengajuan_status;
      if ($stt == "4") {
        $pengajuan = Pengajuan::find($id);
        $pengajuan ->pengajuan_status = "0";
        $pengajuan->update();
      }
    }

    public function listData()
    {
        $pengajuan = Pengajuan::join('tbl_perusahaan','tbl_pengajuan.perusahaan_id','=','tbl_perusahaan.perusahaan_id')
                  ->join('tbl_program','tbl_pengajuan.program_id','=','tbl_program.program_id')
                  ->join('tbl_bidang','tbl_program.bidang_id','=','tbl_bidang.bidang_id')
                  ->orderBy('tbl_pengajuan.pengajuan_id', 'desc')->get();
        $no = 0;
        $data = array();
        $status = "";
        $text = "";
        $text2 = "";
        $button = "";
        $button2 = "";
        $display = "";
        $display2 = "style='display:none;'";
        foreach ($pengajuan as $list) {


            $stt = $list->pengajuan_status;


            if ($stt=="4") {
              $status = "<span class='square-8 bg-warning mg-r-5 rounded-square'></span> ";
              $text = "Setujui";
              $button = "btn btn-success";
              $disabled = "";
              $display2 = "";
            }elseif ($stt == "1") {
              $status = "<span class='square-8 bg-success mg-r-5 rounded-square'></span> ";
              $text = "Selenggarakan";
              $button = "btn btn-primary";
              $disabled = "";
              $display2 = "style='display:none;'";
            }elseif ($stt == "0") {
              $status = "<span class='square-8 bg-danger mg-r-5 rounded-square'></span> ";
              $text = "Ditolak";
              $disabled = "disabled='disabled'";
              $button = "btn btn-gray";
              $display2 = "style='display:none;'";
            }elseif ($stt == "2") {
              $status = "<span class='square-8 bg-primary mg-r-5 rounded-square'></span> ";
              $text = "Realisasikan";
              $button = "btn btn-dark";
              $disabled = "";
              $display2 = "style='display:none;'";
            }elseif ($stt == "3") {
              $status = "<span class='square-8 bg-dark mg-r-5 rounded-square'></span>";
              $text = "Terealisai";
              $disabled = "disabled='disabled'";
              $button = "btn btn-gray";
              $display2 = "style='display:none;'";
            }

            $no++;
            $row = array();
            $row[] = $status.' '.$no.'. ';
            $row[] = tanggal_indonesia($list->pengajuan_tanggal,false);
            $row[] = $list->perusahaan_nama;
            $row[] = $list->bidang_nama;
            $row[] = $list->program_nama;
            // $row[] = substr($list->pengajuan_nama,0,20)." ...";
            $row[] = '<a href="'.url('admin_pengajuan',$list->pengajuan_id).'" class="btn btn-success" data-toggle="tooltip" data-placement="botttom" title="Lihat Detail dan Kelengkapan"><i class="fa fa-eye"></i></a>
                      <a onclick="editForm('.$list->pengajuan_id.')"><button style="width:95px" '.$disabled.' class="'.$button.'" >'.$text.'</button></a>
                      <a '.$display2.' onclick="deleteData('.$list->pengajuan_id.')"><button  class="btn btn-danger">Tolak</button></a>';
            $data[] = $row;

        }

        $output = array("data" => $data);
        return response()->json($output);
    }

    public function PengajuanPdf()
    {
      $pengajuan = Pengajuan::join('tbl_perusahaan','tbl_pengajuan.perusahaan_id','=','tbl_perusahaan.perusahaan_id')
                ->join('tbl_program','tbl_pengajuan.program_id','=','tbl_program.program_id')
                ->join('tbl_bidang','tbl_program.bidang_id','=','tbl_bidang.bidang_id')
                ->orderBy('tbl_pengajuan.pengajuan_id', 'desc')->get();



      $pdf = PDF::loadView('admin.pengajuan.pdf',compact('pengajuan'));
      $pdf->setPaper('a4', 'landscape');
      return $pdf->stream();
    }

    public function pengajuanExcel()
    {

        $pengajuan = Pengajuan::join('tbl_perusahaan', 'tbl_pengajuan.perusahaan_id', '=', 'tbl_perusahaan.perusahaan_id')
            ->join('tbl_program', 'tbl_pengajuan.program_id', '=', 'tbl_program.program_id')
            ->join('tbl_bidang', 'tbl_program.bidang_id', '=', 'tbl_bidang.bidang_id')
            ->orderBy('tbl_pengajuan.pengajuan_id', 'desc')->get();

//

        return Excel::create('rekap pengajuan - ', function($excel) use ($pengajuan) {

            $excel->sheet('rekap pengajuan', function($sheet) use ($pengajuan) {
                $sheet->loadView('admin.pengajuan.excel',compact('pengajuan'))->with('no',1);

            });

        })->download('xls');
//    }
    }

}
