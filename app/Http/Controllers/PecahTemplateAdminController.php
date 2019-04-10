<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Admin;
use App\Perusahaan;
use App\Permohonan;
use App\Pengajuan;


class PecahTemplateAdminController extends Controller
{
  public function index()
  {

    $level = Auth::user()->level;
    $id = Auth::user()->id;

    $opdId=DB::table('tbl_opd')
    ->select('opd_id')
    ->join('users','users_id','=','users.id')
    ->where('users_id',$id)->value('opd_id');

    if ($level == "1") {
      $total_perusahaan = Perusahaan::count();
      $total_permohonan = Permohonan::count();
      $total_pengajuan = Pengajuan::count();
      return view('admin.index',compact('total_perusahaan','total_permohonan','total_pengajuan'));
    }elseif ($level == "2") {
      $total_permohonan = Permohonan::count();
      $total_status = Permohonan::where('permohonan_status','1')->orWhere('permohonan_status','2')->where('opd_id',$opdId)->count();
      $total_status_tolak = Permohonan::where('permohonan_status','0')->where('opd_id',$opdId)->count();
      // dd($total_status);
      return view('opd.index',compact('total_permohonan','total_status','total_status_tolak'));
    }

// return view('admin.index');

















    // $reguler = DB::table('produk')->where('jenis_kategori',"reguler")->count();
    // $edisi = DB::table('produk')->where('jenis_kategori',"edisi")->count();
    // $testimoni = DB::table('testimoni')->count();
    // return view('admin.index', compact('reguler','edisi','testimoni'));
  }
}
