<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\KriteriaAward;
use App\KategoriAward;

class AdminKriteriaAwardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori_award = KategoriAward::All();
        return view ('admin.kriteria_award.index',compact('kategori_award'));
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
      $kriteria_award = new KriteriaAward;
      $kriteria_award ->kategori_award_id = $request['kategori_award_id'];
      $kriteria_award ->kriteria_award_nama = $request['kriteria_award_nama'];
      $kriteria_award -> save();
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
      $kriteria_award = KriteriaAward::find($id);
      echo json_encode($kriteria_award);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $kriteria_award = KriteriaAward::find($id);
      $kriteria_award->delete();
    }

    public function listData()
    {
        $kriteria_award = KriteriaAward::join('tbl_kategori_award','tbl_kriteria_award.kategori_award_id','=','tbl_kategori_award.kategori_award_id')
                      ->orderBy('kriteria_award_id', 'desc')->get();
        $no = 0;
        $data = array();
        foreach ($kriteria_award as $list) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list->kriteria_award_nama;
            $row[] = $list->kategori_award_nama;
            $row[] = '<a onclick="editForm('.$list->kriteria_award_id.')" class="btn btn-primary" data-toggle="tooltip" data-placement="botttom" title="Edit Data"  style="color:white;"><i class="icon ion-edit"></i></a>
            <a onclick="deleteData('.$list->kriteria_award_id.')" class="btn btn-danger" data-toggle="tooltip" data-placement="botttom" title="Hapus Data" style="color:white;"><i class="icon ion-trash-b"></i></a>';
            $data[] = $row;

        }

        $output = array("data" => $data);
        return response()->json($output);
    }

}
