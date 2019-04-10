<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\KategoriAward;
use App\KriteriaAward;

class AdminKategoriAwardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('admin.kategori_award.index');
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
      $kategori_award = new KategoriAward;
      $kategori_award ->kategori_award_nama = $request['kategori_award_nama'];
      $kategori_award -> save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kriteria_award = KriteriaAward::where('kategori_award_id','=',$id)->get();
        $nama_kategori = KategoriAward::find($id);
        return view ('admin.kategori_award.lihat',compact('kriteria_award','nama_kategori'));
        // dd($kriteria_award);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $kategori_award = KategoriAward::find($id);
      echo json_encode($kategori_award);
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
      $kategori_award = KategoriAward::find($id);
      $kategori_award->kategori_award_nama = $request['kategori_award_nama'];
      $kategori_award->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $kategori_award = KategoriAward::find($id);
      $kategori_award->delete();
    }

    public function listData()
    {
        $kategori_award = KategoriAward::orderBy('kategori_award_id', 'desc')->get();
        $no = 0;
        $data = array();
        foreach ($kategori_award as $list) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list->kategori_award_nama;
            $row[] = '<a href="'.route('admin_kategori_award.show',$list->kategori_award_id).'" class="btn btn-success" data-toggle="tooltip" data-placement="botttom" title="Lihat Kriteria Award"><i class="fa fa-eye"></i></a>
                      <a onclick="editForm('.$list->kategori_award_id.')" class="btn btn-primary" data-toggle="tooltip" data-placement="botttom" title="Edit Data"  style="color:white;"><i class="icon ion-edit"></i></a>
                      <a onclick="deleteData('.$list->kategori_award_id.')" class="btn btn-danger" data-toggle="tooltip" data-placement="botttom" title="Hapus Data" style="color:white;"><i class="icon ion-trash-b"></i></a>';
            $data[] = $row;

        }

        $output = array("data" => $data);
        return response()->json($output);
    }


}
