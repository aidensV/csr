<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Program;
use App\Bidang;
use Image;
use Auth;

class AdminProgramController extends Controller
{

  protected $pesan = array(
    'program_nama.required' => 'Isikan Nama Program',
    'bidang_id.required' => 'Pilih Kategori Bidang',
    'program_estimasi_biaya.required' => 'Isikan Estimasi Biaya',
    'program_volume_satuan.required' => 'Isikan Volime Satuan',
    'program_satuan_kerja.required' => 'Isikan Satuan Kerja',
    'program_jenis.required' => 'Pilih Jenis Program',
    'gambar.required' => 'Isikan Gambar Program'

  );

  protected $aturan = array(
    'program_nama' => 'required',
    'bidang_id' => 'required',
    'program_estimasi_biaya' => 'required',
    'program_volume_satuan' => 'required',
    'program_satuan_kerja' => 'required',
    'program_jenis' => 'required',
    'gambar' => 'required'
  );

  protected $pesan_update = array(
    'program_nama.required' => 'Isikan Nama Program',
    'bidang_id.required' => 'Pilih Kategori Bidang',
    'program_estimasi_biaya.required' => 'Isikan Estimasi Biaya',
    'program_volume_satuan.required' => 'Isikan Volime Satuan',
    'program_satuan_kerja.required' => 'Isikan Satuan Kerja',
    'program_jenis.required' => 'Pilih Jenis Program'


  );

  protected $aturan_update = array(
    'program_nama' => 'required',
    'bidang_id' => 'required',
    'program_estimasi_biaya' => 'required',
    'program_volume_satuan' => 'required',
    'program_satuan_kerja' => 'required',
    'program_jenis' => 'required'
  );

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $program = Program::join('tbl_bidang', 'tbl_bidang.bidang_id', '=', 'tbl_program.bidang_id')
                ->orderBy('tbl_program.program_id', 'desc')->get();
      return view ('admin.program.index',compact('program'));

      // dd($program);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $bidang= Bidang::All();
      return view('admin.program.create',compact('bidang'));
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

      $program=new Program;
      $program->program_nama = $request->program_nama;
      $program->bidang_id = $request->bidang_id;
      $program->program_estimasi_biaya = $request->program_estimasi_biaya;
      $program->program_volume_satuan = $request->program_volume_satuan;
      $program->program_satuan_kerja = $request->program_satuan_kerja;
      $program->program_jenis = $request->program_jenis;

      $this->validate($request, [
        'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
      ]);

      if($request->hasFile('gambar')){
        $productGambar = $request->file('gambar');
        $filename = time() . '.' . $productGambar->getClientOriginalExtension();
          Image::make($productGambar)->resize(800, null, function ($constraint) {
              $constraint->aspectRatio();
          })->save(public_path('/images/program-' . $filename));
//        Image::make($productGambar)->encode('jpg', 20)->resize(800, 361)->save(public_path('images/program-'. $filename));

        $program->program_gambar = $filename;
      }
      $program->save();
      return redirect()->route('admin_program.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $program = Program::join('tbl_bidang', 'tbl_bidang.bidang_id', '=', 'tbl_program.bidang_id')
                ->where('tbl_program.program_id','=',$id)
                ->orderBy('tbl_program.program_id', 'desc')->get();
      return view ('admin.program.lihat',compact('program'));
      // dd($program);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $bidang = Bidang::All();
      $program = Program::where('program_id',$id)->get();
      return view ('admin.program.edit',compact('bidang','program'));
      // dd($program);
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
      $this->validate($request, $this->aturan_update, $this->pesan_update);


      $program=Program::find($id);

      if($request->hasFile('gambar')){

        $image = \DB::table('tbl_program')->where('program_id', $id)->first();
        $file= $image->program_gambar;

        $filename1 = public_path().'/images/program-'.$file;
        \File::delete($filename1);

        $program->program_nama = $request->program_nama;
        $program->bidang_id = $request->bidang_id;
        $program->program_estimasi_biaya = $request->program_estimasi_biaya;
        $program->program_volume_satuan = $request->program_volume_satuan;
        $program->program_satuan_kerja = $request->program_satuan_kerja;
        $program->program_jenis = $request->program_jenis;
        $productGambar = $request->file('gambar');
        $filename = time() . '.' . $productGambar->getClientOriginalExtension();
          Image::make($productGambar)->resize(800, null, function ($constraint) {
              $constraint->aspectRatio();
          })->save(public_path('/images/program-' . $filename));
//        Image::make($productGambar)->encode('jpg', 20)->resize(800, 533)->save(public_path('images/program-'. $filename));

        $program->program_gambar = $filename;
        $this->validate($request, [
          'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

      }else{
        $program->program_nama = $request->program_nama;
        $program->bidang_id = $request->bidang_id;
        $program->program_estimasi_biaya = $request->program_estimasi_biaya;
        $program->program_volume_satuan = $request->program_volume_satuan;
        $program->program_satuan_kerja = $request->program_satuan_kerja;
        $program->program_jenis = $request->program_jenis;
      }
      $program->update();



      return redirect()->route('admin_program.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $image = \DB::table('tbl_program')->where('program_id', $id)->first();
      $file= $image->program_gambar;

      $filename1 = public_path().'/images/program-'.$file;
      \File::delete($filename1);

      $program = DB::table('tbl_program')->where('program_id',$id)->delete();
      return redirect()->route('admin_program.index');
    }
}
