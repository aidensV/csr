<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Galeri;

class FrontGaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index1()
    {
        $batas=8;
        $gambar_berita = DB::table('tbl_berita')->orderBy('berita_id','desc')->paginate($batas);
        $no=$batas*($gambar_berita->currentPage()-1);
        return view('user.galeri',['no'=>$no,'gambar_berita'=>$gambar_berita]);
    }
    public function index2()
    {
        $batas=4;
        $galeri_pelaksanaan = Galeri::join('tbl_pengajuan', 'tbl_galeri_pelaksanaan.pengajuan_id', '=', 'tbl_pengajuan.pengajuan_id')->orderBy('tbl_galeri_pelaksanaan.galeri_pelaksanaan_id','DESC')->paginate($batas);
        
        $no=$batas*($galeri_pelaksanaan->currentPage()-1);
        return view('user.galeri_pelaksanaan',['no'=>$no,'galeri_pelaksanaan'=>$galeri_pelaksanaan]);
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
        //
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
        //
    }
}
