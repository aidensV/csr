<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengguna;
use App\admin;
use App\Opd;
use Redirect;
use DB;
use Auth;

class adminPenggunaController extends Controller
{

  protected $pesan = array(
      'nama.required' => 'Isikan Nama Pengguna',
      'email.required' => 'Isikan Email Pengguna',
      'nohp.required' => 'Isikan No. HP Pengguna',
      'alamat.required' => 'Isikan Alamat Pengguna'


      );


  protected $aturan = array(
      'nama' => 'required',
      'email' => 'required',
      'nohp' => 'required',
      'alamat' => 'required'

      );

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $pengguna = admin::orderBy('admin_id', 'desc')
                  ->leftjoin('users', 'users.id', '=', 'tbl_admin.users_id')
                  ->where('users.level', "1")
                  ->get();
      return view('admin.pengguna.index', compact('pengguna'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pesan_error = "0";
        return view('admin.pengguna.create', compact('pesan_error'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, $this->aturan, $this->pesan);

      $pesan_error = "1";

      $select = Pengguna::select('email')->get();
      foreach ($select as $eml ) {
        if ($request['email'] == $eml->email) {
          return view('admin.pengguna.create', compact('pesan_error'));
        }
      }

      // dd( $eml->email);
      $pengguna = new Pengguna;
      $pengguna->name = $request['nama'];
      $pengguna->email = $request['email'];
      $pengguna->password = bcrypt($request['password']);
      $pengguna->level = "1";
      $pengguna->save();

      $users_id_get = Pengguna::MAX('id')->get();

      foreach ($users_id_get as $key) {
        $users_id = $key->id;
      }

      $admin = new admin;
      $admin->users_id = $users_id;
      $admin->admin_nama = $request['nama'];
      $admin->save();

      return Redirect::route('admin_users.index');
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

      $level = Auth::user()->level;

      if ($level == "1") {
        $pengguna = admin::join('users', 'users.id', '=', 'tbl_admin.users_id')
                    ->where('users.id', $id)
                    ->get();
        return view('admin.pengguna.edit', compact('pengguna'));
      }elseif ($level == "2") {
        $pengguna = Opd::join('users', 'users.id', '=', 'tbl_opd.users_id')
                    ->where('users.id', $id)
                    ->get();
        return view('opd.profil.edit', compact('pengguna'));
      }




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
        $this->validate($request, $this->aturan, $this->pesan);

        $level = Auth::user()->level;

        if ($level == "1") {
          $pengguna =Pengguna::find($id);
          if ($request['password'] == !null) {
            $pengguna->password = bcrypt($request['password']);
            $pengguna->name = $request['nama'];
            $pengguna->email = $request['email'];
          }else {
            $pengguna->name = $request['nama'];
            $pengguna->email = $request['email'];
          }


          $pengguna->update();

          $admin = admin::where('users_id','=',$id)->get();

          foreach ($admin as $key) {
            $admin_id = $key->admin_id;
          }

          $admin_update =admin::find($admin_id);
          $admin_update->admin_nama = $request['nama'];
          $admin_update->update();



          return Redirect::route('admin_users.index');
        }elseif ($level == "2") {
          $pengguna =Pengguna::find($id);
          if ($request['password'] == !null) {
            $pengguna->password = bcrypt($request['password']);
            $pengguna->name = $request['nama'];
            $pengguna->email = $request['email'];
          }else {
            $pengguna->name = $request['nama'];
            $pengguna->email = $request['email'];
          }


          $pengguna->update();

          $opd = Opd::where('users_id','=',$id)->get();

          foreach ($opd as $key) {
            $opd_id = $key->opd_id;
          }

          $opd_update =Opd::find($opd_id);
          $opd_update->opd_nama = $request['nama'];
          $opd_update->opd_nohp = $request['nohp'];
          $opd_update->opd_alamat = $request['alamat'];
          $opd_update->update();



          return view('opd.index');
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
      $pengguna = Pengguna::find($id);
      $pengguna->delete();

      $admin = admin::where('users_id','=',$id)->get();
      foreach ($admin as $key) {
        $admin_id = $key->admin_id;
      }

      $admin_delete =admin::find($admin_id);
      $admin_delete->delete();

      return Redirect::route('admin_users.index');
    }
}
