<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FrontRecapitulationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tahun = date('Y');
        $pendidikan = DB::table('tbl_perusahaan')->where('bidang_id','1')->whereYear('perusahaan_tahun', $tahun)->count();
        $kesehatan = DB::table('tbl_perusahaan')->where('bidang_id','2')->whereYear('perusahaan_tahun', $tahun)->count();
        $sarana_umum = DB::table('tbl_perusahaan')->where('bidang_id','3')->whereYear('perusahaan_tahun', $tahun)->count();
        $sarana_ibadah = DB::table('tbl_perusahaan')->where('bidang_id','4')->whereYear('perusahaan_tahun', $tahun)->count();
        $lingkungan_hidup = DB::table('tbl_perusahaan')->where('bidang_id','5')->whereYear('perusahaan_tahun', $tahun)->count();
        $bantuan_sosial = DB::table('tbl_perusahaan')->where('bidang_id','6')->whereYear('perusahaan_tahun', $tahun)->count();
        $program_kemitraan = DB::table('tbl_perusahaan')->where('bidang_id','7')->whereYear('perusahaan_tahun', $tahun)->count();
        $bencana_alam = DB::table('tbl_perusahaan')->where('bidang_id','8')->whereYear('perusahaan_tahun', $tahun)->count();
        $recapitulation = DB::TABLE('tbl_bidang')
        ->JOIN('tbl_perusahaan', 'tbl_bidang.bidang_id', '=', 'tbl_perusahaan.bidang_id')
        ->JOIN('tbl_pengajuan', 'tbl_perusahaan.perusahaan_id', '=', 'tbl_pengajuan.perusahaan_id')
        ->SELECT('tbl_bidang.bidang_id','tbl_bidang.bidang_nama', DB::raw('COUNT(tbl_perusahaan.perusahaan_id) AS jml_perusahaan'), DB::raw('SUM(tbl_pengajuan.pengajuan_estimasi_pembiayaan) as jumlah_anggaran'))
        ->WHERE('tbl_pengajuan.pengajuan_status','=','1')
        ->groupBy('tbl_bidang.bidang_id')
        ->get();

        return view('user.recapitulation', compact('recapitulation','tahun'));
    }
    public function indexCari(request $request)
    {
        $tahun = $request['tahun'];

        $pendidikan = DB::table('tbl_perusahaan')->where('bidang_id','1')->whereYear('perusahaan_tahun', $tahun)->count();
        $kesehatan = DB::table('tbl_perusahaan')->where('bidang_id','2')->whereYear('perusahaan_tahun', $tahun)->count();
        $sarana_umum = DB::table('tbl_perusahaan')->where('bidang_id','3')->whereYear('perusahaan_tahun', $tahun)->count();
        $sarana_ibadah = DB::table('tbl_perusahaan')->where('bidang_id','4')->whereYear('perusahaan_tahun', $tahun)->count();
        $lingkungan_hidup = DB::table('tbl_perusahaan')->where('bidang_id','5')->whereYear('perusahaan_tahun', $tahun)->count();
        $bantuan_sosial = DB::table('tbl_perusahaan')->where('bidang_id','6')->whereYear('perusahaan_tahun', $tahun)->count();
        $program_kemitraan = DB::table('tbl_perusahaan')->where('bidang_id','7')->whereYear('perusahaan_tahun', $tahun)->count();
        $bencana_alam = DB::table('tbl_perusahaan')->where('bidang_id','8')->whereYear('perusahaan_tahun', $tahun)->count();

        $recapitulation = DB::TABLE('tbl_bidang')
        ->JOIN('tbl_perusahaan', 'tbl_bidang.bidang_id', '=', 'tbl_perusahaan.bidang_id')
        ->JOIN('tbl_pengajuan', 'tbl_perusahaan.perusahaan_id', '=', 'tbl_pengajuan.perusahaan_id')
        ->SELECT('tbl_bidang.bidang_id','tbl_bidang.bidang_nama', DB::raw('COUNT(tbl_perusahaan.perusahaan_id) AS jml_perusahaan'), DB::raw('SUM(tbl_pengajuan.pengajuan_estimasi_pembiayaan) as jumlah_anggaran'))
        ->WHERE('tbl_pengajuan.pengajuan_status','=','1')
        ->whereYear('tbl_perusahaan.perusahaan_tahun', '=', $tahun)
        ->groupBy('tbl_bidang.bidang_id')
        ->get();


        return view('user.recapitulation', compact('recapitulation','tahun'));
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
