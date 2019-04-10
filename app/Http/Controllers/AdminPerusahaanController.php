<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Perusahaan;
use App\Bidang;

class AdminPerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bidang = Bidang::All();
        // dd($bidang);
        return view ('admin.perusahaan.index',compact('bidang'));
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
        $perusahaan = Perusahaan::join('tbl_bidang', 'tbl_perusahaan.bidang_id','=','tbl_bidang.bidang_id')
                    ->where('tbl_perusahaan.perusahaan_id','=',$id)
                    ->get();
        return view('admin.perusahaan.lihat',compact('perusahaan'));
        // dd($perusahaan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $perusahaan = Perusahaan::find($id);
      echo json_encode($perusahaan);
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
        $stt_query = Perusahaan::find($id);
        $stt = $stt_query->perusahaan_status;
        if ($stt == "1") {
          $perusahaan = Perusahaan::find($id);
          $perusahaan ->perusahaan_status = "2";
          $perusahaan->update();
        }elseif ($stt == "2") {
          $perusahaan = Perusahaan::find($id);
          $perusahaan ->perusahaan_status = "1";
          $perusahaan->update();
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
      $perusahaan = Perusahaan::find($id);
      $perusahaan->delete();
    }

    public function listData()
    {
        $perusahaan = Perusahaan::orderBy('perusahaan_id', 'desc')->get();
        $no = 0;
        $data = array();
        $status = "";
        $display = "";
        foreach ($perusahaan as $list) {


            $stt = $list->perusahaan_status;


            if ($stt=="1") {
              $status = "<span class='square-8 bg-success mg-r-5 rounded-circle'></span> Aktif";
              $display = '<button class="btn btn-danger" >Non-Aktifkan</button>';
            }elseif ($stt == "2") {
              $status = "<span class='square-8 bg-danger mg-r-5 rounded-circle'></span> Non-Aktif";
              $display = '<button class="btn btn-success" >Aktifkan</button>';
            }

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list->perusahaan_nama;
            $row[] = $list->perusahaan_alamat;
            $row[] = $status;
            $row[] = '<a onclick="editForm('.$list->perusahaan_id.')">'.$display.'</a>';
            $row[] = '<a href="'.url('admin_perusahaan',$list->perusahaan_id).'" class="btn btn-success" data-toggle="tooltip" data-placement="botttom" title="Lihat Kriteria Award"><i class="fa fa-eye"></i></a>
                      <a onclick="deleteData('.$list->perusahaan_id.')" class="btn btn-danger" data-toggle="tooltip" data-placement="botttom" title="Hapus Data" style="color:white;"><i class="icon ion-trash-b"></i></a>';
            $data[] = $row;

        }

        $output = array("data" => $data);
        return response()->json($output);
    }

}
