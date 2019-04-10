<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\DaftarPerusahaan;

class AdminDaftarPerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('admin.daftar_perusahaan.index');
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
      $daftar_perusahaan = new DaftarPerusahaan;
      $daftar_perusahaan ->daftar_perusahaan_nama = $request['daftar_perusahaan_nama'];
      $daftar_perusahaan ->daftar_perusahaan_alamat = $request['daftar_perusahaan_alamat'];
      $daftar_perusahaan ->daftar_perusahaan_kelurahan = $request['daftar_perusahaan_kelurahan'];
      $daftar_perusahaan ->daftar_perusahaan_kecamatan = $request['daftar_perusahaan_kecamatan'];
      $daftar_perusahaan ->daftar_perusahaan_tahun = $request['daftar_perusahaan_tahun'];
      $daftar_perusahaan -> save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $daftar_perusahaan = DaftarPerusahaan::find($id);
      echo json_encode($daftar_perusahaan);
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
      $daftar_perusahaan = DaftarPerusahaan::find($id);
      $daftar_perusahaan ->daftar_perusahaan_nama = $request['daftar_perusahaan_nama'];
      $daftar_perusahaan ->daftar_perusahaan_alamat = $request['daftar_perusahaan_alamat'];
      $daftar_perusahaan ->daftar_perusahaan_kelurahan = $request['daftar_perusahaan_kelurahan'];
      $daftar_perusahaan ->daftar_perusahaan_kecamatan = $request['daftar_perusahaan_kecamatan'];
      $daftar_perusahaan ->daftar_perusahaan_tahun = $request['daftar_perusahaan_tahun'];
      $daftar_perusahaan->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $daftar_perusahaan = DaftarPerusahaan::find($id);
      $daftar_perusahaan->delete();
    }

    public function listData()
    {
        $daftar_perusahaan = DaftarPerusahaan::orderBy('daftar_perusahaan_id', 'desc')->get();
        $no = 0;
        $data = array();
        foreach ($daftar_perusahaan as $list) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list->daftar_perusahaan_nama;
            $row[] = $list->daftar_perusahaan_alamat;
            $row[] = $list->daftar_perusahaan_kecamatan;
            $row[] = $list->daftar_perusahaan_kelurahan;
            $row[] = '<a onclick="editForm('.$list->daftar_perusahaan_id.')" class="btn btn-primary" data-toggle="tooltip" data-placement="botttom" title="Edit Data"  style="color:white;"><i class="icon ion-edit"></i></a>
            <a onclick="deleteData('.$list->daftar_perusahaan_id.')" class="btn btn-danger" data-toggle="tooltip" data-placement="botttom" title="Hapus Data" style="color:white;"><i class="icon ion-trash-b"></i></a>';
            $data[] = $row;

        }

        $output = array("data" => $data);
        return response()->json($output);
    }
}
