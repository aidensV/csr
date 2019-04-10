<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Bidang;

class AdminBidangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view ('admin.bidang.index');
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
      $bidang = new Bidang;
      $bidang ->bidang_nama = $request['bidang_nama'];
      $bidang -> save();
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
      $bidang = Bidang::find($id);
      echo json_encode($bidang);
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
      $bidang = Bidang::find($id);
      $bidang->bidang_nama = $request['bidang_nama'];
      $bidang->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $bidang = Bidang::find($id);
      $bidang->delete();
    }

    public function listData()
    {
        $bidang = Bidang::orderBy('bidang_id', 'ASC')->get();
        $no = 0;
        $data = array();
        foreach ($bidang as $list) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list->bidang_nama;
            $row[] = '<a onclick="editForm('.$list->bidang_id.')" class="btn btn-primary" data-toggle="tooltip" data-placement="botttom" title="Edit Data"  style="color:white;"><i class="icon ion-edit"></i></a>
            <a onclick="deleteData('.$list->bidang_id.')" class="btn btn-danger" data-toggle="tooltip" data-placement="botttom" title="Hapus Data" style="color:white;"><i class="icon ion-trash-b"></i></a>';
            $data[] = $row;

        }

        $output = array("data" => $data);
        return response()->json($output);
    }

}
