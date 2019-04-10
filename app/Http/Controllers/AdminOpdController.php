<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pengguna;
use App\Admin;
use App\Opd;
use Redirect;
use DB;
use Auth;

class AdminOpdController extends Controller
{

  protected $pesan = array(
      'opd_nama.required' => 'Isikan Nama OPD',
      'opd_nohp.required' => 'Isikan Nomor HP',
      'opd_alamat.required' => 'Isikan Alamat',
      'email.required' => 'Isikan Email OPD'


      );


  protected $aturan = array(
      'opd_nama' => 'required',
      'opd_nohp' => 'required',
      'opd_alamat' => 'required',
      'email' => 'required'

      );

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $opd = Opd::join('users', 'tbl_opd.users_id', '=', 'users.id')
            ->orderBy('tbl_opd.opd_id', 'asc')->get();
      return view ('admin.opd.index',compact('opd'));
      // dd($opd);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $pesan_error = "0";
      return view('admin.opd.create', compact('pesan_error'));
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
          return view('admin.opd.create', compact('pesan_error'));
        }
      }

      // dd( $eml->email);
      $pengguna = new Pengguna;
      $pengguna->name = $request['opd_nama'];
      $pengguna->email = $request['email'];
      $pengguna->password = bcrypt($request['password']);
      $pengguna->level = "2";
      $pengguna->save();

      $users_id_get = Pengguna::MAX('id')->get();

      foreach ($users_id_get as $key) {
        $users_id = $key->id;
      }

      $opd = new Opd;
      $opd->users_id = $users_id;
      $opd->opd_nama = $request['opd_nama'];
      $opd->opd_nohp = $request['opd_nohp'];
      $opd->opd_alamat = $request['opd_alamat'];
      $opd->save();

      return Redirect::route('admin_opd.index');
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
      $pengguna = Pengguna::find($id);
      $pengguna->delete();

      $opd = Opd::where('users_id','=',$id)->get();
      foreach ($opd as $key) {
        $opd_id = $key->opd_id;
      }

      $opd_delete =Opd::find($opd_id);
      $opd_delete->delete();

      return Redirect::route('admin_opd.index');
    }
}
