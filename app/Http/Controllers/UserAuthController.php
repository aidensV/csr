<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Perusahaan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function index()
    {
        if(!Session::get('login')){
            return redirect('login')->with('alert','Kamu harus login dulu');
        }
        else{
            return view('user');
        }
    }*/
    public function loginPost(Request $request){
        $perusahaan_email = $request->perusahaan_email;
        $perusahaan_password = md5($request->perusahaan_password);
        $redirect_to = $request->redirect_to;

        // $data = DB::table('pelanggan')->where('perusahaan_password',$perusahaan_password)->get();
        $data = DB::table('tbl_perusahaan')
        ->where([
            ['perusahaan_email', '=', $perusahaan_email],
            ['perusahaan_status', '=', '1'],
        ])->get();
        // $data = ModelUser::where('email',$email)->first();
        foreach ($data as $key ) {
            $perusahaan_id = $key->perusahaan_id;
            $perusahaan_email2 = $key->perusahaan_email;
            $perusahaan_password2 = $key->perusahaan_password;
        }

        if (count($data) != 0) {
            if ($perusahaan_email == $perusahaan_email2 && $perusahaan_password == $perusahaan_password2) {
            // return 'Password/EMail Sama';
                Session::put('perusahaan_id',$perusahaan_id);
                Session::put('perusahaan_email',$perusahaan_email);
                Session::put('perusahaan_password',$perusahaan_password);
                Session::put('perusahaan_login',TRUE);
                return redirect('home');
            // return redirect('user_reg')->with('alert-success','Selamat Anda Berhasil Login');
            // return redirect($redirect_to);
            }else{
            // return 'Password/Email Tidak Sama';
                return redirect('user_reg')->with('alert','Email atau Password, Salah!');
            }
        }else{
            return redirect('user_reg')->with('alert','Akun tidak ditemukan!');
        }


    }
    public function loginPost2(Request $request){
        $perusahaan_email = $request->perusahaan_email;
        $perusahaan_password = md5($request->perusahaan_password);
        $redirect_to = $request->redirect_to;

        // $data = DB::table('pelanggan')->where('perusahaan_password',$perusahaan_password)->get();
        $data = DB::table('tbl_perusahaan')
        ->where([
            ['perusahaan_email', '=', $perusahaan_email],
            ['perusahaan_status', '=', '1'],
        ])->get();
        // $data = ModelUser::where('email',$email)->first();
        foreach ($data as $key ) {
            $perusahaan_id = $key->perusahaan_id;
            $perusahaan_email2 = $key->perusahaan_email;
            $perusahaan_password2 = $key->perusahaan_password;
        }
        if (count($data) != 0) {
            if ($perusahaan_email == $perusahaan_email2 && $perusahaan_password == $perusahaan_password2) {
            // return 'Password/EMail Sama';
                Session::put('perusahaan_id',$perusahaan_id);
                Session::put('perusahaan_email',$perusahaan_email);
                Session::put('perusahaan_password',$perusahaan_password);
                Session::put('perusahaan_login',TRUE);
            // return redirect('user_reg')->with('alert-success','Selamat Anda Berhasil Login');
                return redirect('pengajuan-usulan');
            }else{
            // return 'Password/Email Tidak Sama';
            // return redirect($redirect_to);
                return redirect('user_reg-2/')->with('alert','Email atau Password, Salah!');
            }
        }else{
            return redirect('user_reg-2/')->with('alert','Akun tidak ditemukan!');
        }
    }
    public function logout(){
        Session::flush();
        // return redirect('user_reg');
        return redirect('user_reg')->with('alert-danger','Anda Berhasil Logout');
    }
    public function register(Request $request){
        $list_bidang = DB::table('tbl_bidang')->get();
        return view('user.register', compact('list_bidang'));
    }
    public function loginDahulu(){
        $list_bidang = DB::table('tbl_bidang')->get();
        return view('user.login', compact('list_bidang'));
    }
    public function registerPost(Request $request){
        /*$this->validate($request, [
            'pelanggan_nama' => 'required|min:4',
            'perusahaan_email' => 'required|min:4|email|unique:users',
            'perusahaan_password' => 'required',
            'confirmation' => 'required|same:perusahaan_password',
        ]);*/
        $data =  new Perusahaan();
        $data->perusahaan_nama = $request->perusahaan_nama;
        $data->bidang_id = $request->bidang_id;
        $data->perusahaan_alamat = $request->perusahaan_alamat;
        $data->perusahaan_kelurahan = $request->perusahaan_kelurahan;
        $data->perusahaan_kecamatan = $request->perusahaan_kecamatan;
        $data->perusahaan_contact_person = $request->perusahaan_contact_person;
        $data->perusahaan_status = "1";
        $data->perusahaan_tahun = date('Y-m-d');
        $data->perusahaan_email = $request->perusahaan_email;
        $data->perusahaan_alamat = $request->perusahaan_alamat;
        $data->perusahaan_password = md5($request->perusahaan_password);
        $data->save();
        return redirect('user_reg')->with('alert-success-1','Kamu berhasil Register');
    }

    public function userEdit(){
        $perusahaan_id = Session::get('perusahaan_id');
        $perusahaan = DB::table('tbl_perusahaan')->where('perusahaan_id', $perusahaan_id)->get();
        $list_bidang = DB::table('tbl_bidang')->get();
        return view('user.profil_perusahaan', compact('perusahaan','list_bidang'));
    }
    public function userUpdate(Request $request){
        $perusahaan_id = Session::get('perusahaan_id');
        $data = Perusahaan::find($perusahaan_id);
        $data->perusahaan_nama = $request->perusahaan_nama;
        $data->bidang_id = $request->bidang_id;
        $data->perusahaan_alamat = $request->perusahaan_alamat;
        $data->perusahaan_kelurahan = $request->perusahaan_kelurahan;
        $data->perusahaan_kecamatan = $request->perusahaan_kecamatan;
        $data->perusahaan_contact_person = $request->perusahaan_contact_person;
        $data->perusahaan_email = $request->perusahaan_email;
        $data->perusahaan_alamat = $request->perusahaan_alamat;
        $data->perusahaan_password = md5($request->perusahaan_password);
        $data->update();
        return redirect('home');
    }
}
