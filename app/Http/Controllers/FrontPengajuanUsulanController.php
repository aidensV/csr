<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pengajuan;
use App\FilePengajuan;
use File;
use Illuminate\Support\Facades\Session;

class FrontPengajuanUsulanController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
    $perusahaan = DB::table('tbl_perusahaan')->orderBy('perusahaan_nama','asc')->get();
    $program = DB::table('tbl_program')->orderBy('program_nama','asc')->get();

    return view('user.pengajuan_usulan', compact('program','perusahaan'));
}
public function history()
{
    $perusahaan_id = Session::get('perusahaan_id');
    $pengajuan = Pengajuan::join('tbl_program', 'tbl_pengajuan.program_id', '=', 'tbl_program.program_id')->where('perusahaan_id',$perusahaan_id)->orderBy('tbl_pengajuan.pengajuan_id', 'DESC')->get();

    return view('user.pengajuan_usulan_history', compact('pengajuan'));
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
    $data =  new Pengajuan();
    $data->perusahaan_id = $request->perusahaan_id;
    $data->program_id = $request->program_id;
    $data->pengajuan_nama = $request->pengajuan_nama;
    $data->pengajuan_estimasi_pembiayaan = $request->pengajuan_estimasi_pembiayaan;
    $data->pengajuan_deskripsi = $request->pengajuan_deskripsi;
    $data->pengajuan_status = '4';
    $data->pengajuan_tanggal = date('Y-m-d');
    $data->save();

    $pengajuanId = Pengajuan::max('pengajuan_id');
    return redirect('file-pengajuan-usulan/'.$pengajuanId);
}
public function uploadFile($id)
{
    $jumlah=DB::table('tbl_file_pengajuan')
    ->select(DB::raw('count(file_pengajuan_nama) as jumlah'))
    ->where('pengajuan_id', $id)
    ->get();
    $file_pengajuan = FilePengajuan::where('pengajuan_id',$id)->get();

    return view('user.pengajuan_usulan_upload_file', compact('jumlah','file_pengajuan'))->with('idPengajuan', $id);
}
public function storeFile(Request $request)
{
    $pengajuan = new FilePengajuan;
    if ($file = $request->hasFile('file_dokumen')) {
        $file = $request->file('file_dokumen');
        $filepath = time() .uniqid(). '.' . $file->getClientOriginalExtension();
        $filename = $file->getClientOriginalName();
        $destinationPath = public_path() . '/files/';
        $file->move($destinationPath, $filepath);
        $pengajuan->pengajuan_id = $request['pengajuan_id'];
        $pengajuan->file_pengajuan_path = $filepath;
        $pengajuan->file_pengajuan_nama = $filename;
        $pengajuan->save();
    }
    return redirect('file-pengajuan-usulan/'.$request['pengajuan_id']);
}
public function deleteFile(Request $request)
{
    $pengajuan = FilePengajuan::findOrFail($request['file_pengajuan_id']);
    $pengajuan_file = FilePengajuan::where('file_pengajuan_id',$request['file_pengajuan_id'])->get();
    foreach ($pengajuan_file as $value) {
        $destinationPath = public_path() . '/files/';
        File::delete($destinationPath.'/'.$value->file_pengajuan_path);
        $value->delete();
    }
    $pengajuan->delete();
    // return redirect('home');
    // return redirect->back()
    return redirect('file-pengajuan-usulan/'.$request['pengajuan_id']);
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
    $pengajuan = Pengajuan::findOrFail($request['pengajuan_id']);
    $pengajuan_file = FilePengajuan::where('file_pengajuan_id',$request['file_pengajuan_id'])->get();
    foreach ($pengajuan_file as $value) {
        $destinationPath = public_path() . '/files/';
        File::delete($destinationPath.'/'.$value->file_pengajuan_path);
        $value->delete();
    }
    $pengajuan->delete();
    return redirect('home');
}
}
