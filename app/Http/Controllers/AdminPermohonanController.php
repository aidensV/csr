<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use Auth;
use App\Permohonan;
use App\File_permohonan;
use Excel;

class AdminPermohonanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('admin.permohonan.index');
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
      $file_permohonan = File_permohonan::where('permohonan_id','=',$id)->get();
      $permohonan = Permohonan::join('tbl_opd','tbl_permohonan.opd_id','=','tbl_opd.opd_id')
                  ->join('tbl_program','tbl_permohonan.program_id','=','tbl_program.program_id')
                  ->where('tbl_permohonan.permohonan_id','=',$id)
                  ->get();
      return view('admin.permohonan.lihat',compact('permohonan','file_permohonan'));
      // dd($file_permohonan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $permohonan = Permohonan::find($id);
      echo json_encode($permohonan);
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
      $stt_query = Permohonan::find($id);
      $stt = $stt_query->permohonan_status;
      if ($stt == "3") {
        $permohonan = Permohonan::find($id);
        $permohonan ->permohonan_status = "1";
        $permohonan->update();
      }elseif ($stt == "1") {
        $permohonan = Permohonan::find($id);
        $permohonan ->permohonan_status = "2";
        $permohonan->update();
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
      $stt_query = Permohonan::find($id);
      $stt = $stt_query->permohonan_status;
      if ($stt == "3") {
        $permohonan = Permohonan::find($id);
        $permohonan ->permohonan_status = "0";
        $permohonan->update();
      }
    }

    public function listData()
    {
        $permohonan = Permohonan::join('tbl_opd','tbl_permohonan.opd_id','=','tbl_opd.opd_id')
                  ->join('tbl_program','tbl_permohonan.program_id','=','tbl_program.program_id')
                  ->join('tbl_bidang','tbl_program.bidang_id','=','tbl_bidang.bidang_id')
                  ->orderBy('tbl_permohonan.permohonan_id', 'desc')->get();
        $no = 0;
        $data = array();
        $status = "";
        $text = "";
        $text2 = "";
        $button = "";
        $button2 = "";
        $display = "";
        $display2 = "style='display:none;'";
        foreach ($permohonan as $list) {


            $stt = $list->permohonan_status;


            if ($stt=="3") {
              $status = "<span class='square-8 bg-warning mg-r-5 rounded-square'></span> ";
              $text = "Setujui";
              $button = "btn btn-success";
              $disabled = "";
              $display2 = "";
            }elseif ($stt == "1") {
              $status = "<span class='square-8 bg-success mg-r-5 rounded-square'></span> ";
              $text = "Tindak Lanjut";
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
              $text = "Ditindak Lanjuti";
              $disabled = "disabled='disabled'";
              $button = "btn btn-gray";
              $display2 = "style='display:none;'";
            }

            $no++;
            $row = array();
            $row[] = $status.' '.$no.'. ';
            $row[] = tanggal_indonesia($list->permohonan_tanggal,false);
            $row[] = $list->opd_nama;
            $row[] = $list->bidang_nama;
            $row[] = $list->program_nama;
            // $row[] = substr($list->permohonan_nama,0,20)." ...";
            $row[] = '<a href="'.url('admin_permohonan',$list->permohonan_id).'" class="btn btn-success" data-toggle="tooltip" data-placement="botttom" title="Lihat Detail dan Kelengkapan"><i class="fa fa-eye"></i></a>
                      <a onclick="editForm('.$list->permohonan_id.')"><button style="width:95px" '.$disabled.' class="'.$button.'" >'.$text.'</button></a>
                      <a '.$display2.' onclick="deleteData('.$list->permohonan_id.')"><button  class="btn btn-danger">Tolak</button></a>';
            $data[] = $row;

        }

        $output = array("data" => $data);
        return response()->json($output);
    }

    public function PermohonanPdf()
    {
      $permohonan = Permohonan::join('tbl_opd','tbl_permohonan.opd_id','=','tbl_opd.opd_id')
                ->join('tbl_program','tbl_permohonan.program_id','=','tbl_program.program_id')
                ->join('tbl_bidang','tbl_program.bidang_id','=','tbl_bidang.bidang_id')
                ->orderBy('tbl_permohonan.permohonan_id', 'desc')->get();



      $pdf = PDF::loadView('admin.permohonan.pdf',compact('permohonan'));
      $pdf->setPaper('a4', 'landscape');
      return $pdf->stream();
    }
    public function PermohonanExcel()
    {
      $permohonan = Permohonan::join('tbl_opd','tbl_permohonan.opd_id','=','tbl_opd.opd_id')
                ->join('tbl_program','tbl_permohonan.program_id','=','tbl_program.program_id')
                ->join('tbl_bidang','tbl_program.bidang_id','=','tbl_bidang.bidang_id')
                ->orderBy('tbl_permohonan.permohonan_id', 'desc')->get();



        return Excel::create('rekap pengajuan - ', function($excel) use ($permohonan) {

            $excel->sheet('rekap pengajuan', function($sheet) use ($permohonan) {
                $sheet->loadView('admin.permohonan.excel',compact('permohonan'))->with('no',1);

            });

        })->download('xls');
    }

}
