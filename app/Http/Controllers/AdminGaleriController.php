<?php

namespace App\Http\Controllers;

use App\Galeri;
use App\Pengajuan;
use Image;
use File;

use Illuminate\Http\Request;

class AdminGaleriController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galeri = Galeri::join('tbl_pengajuan', 'tbl_pengajuan.pengajuan_id', '=', 'tbl_galeri_pelaksanaan.pengajuan_id')
            ->join('tbl_program', 'tbl_program.program_id', '=', 'tbl_pengajuan.program_id')->get();

        return view('admin.galeri_pelaksanaan.index', compact('galeri'))->with('no', 1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pengajuan = Pengajuan::all();
        $galeri = Galeri::all();
        foreach ($galeri as $value) {
            $galeri2 = json_decode($value->galeri_pelaksanaan_gb1);
        }


        return view('admin.galeri_pelaksanaan.create', compact('pengajuan', 'galeri2'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $galeri = new Galeri;

        if ($request->hasFile('galeri')) {
            $filerequest = $request->file('galeri');
            $filename = time() . uniqid() . '.' . $filerequest->getClientOriginalExtension();
            Image::make($filerequest)->resize(1040, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('/images/galeri-' . $filename));
            Image::make($filerequest)->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('/images/tumb/tumb-' . $filename));
            $galeri->galeri_pelaksanaan_gb1 = $filename;
            $galeri->pengajuan_id = $request['pengajuan_id'];
            $galeri->save();
        } else {
            echo "GAGAL MENYIMPAN GAMBAR";
        }
        return redirect('admin_galeri');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Galeri $galeri
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $galeri = Galeri::where('galeri_pelaksanaan_id', $id)
            ->join('tbl_pengajuan', 'tbl_pengajuan.pengajuan_id', '=', 'tbl_galeri_pelaksanaan.pengajuan_id')
            ->first();
        return view('admin.galeri_pelaksanaan.show', compact('galeri'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Galeri $galeri
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $galeri = Galeri::select('tbl_pengajuan.pengajuan_nama', 'tbl_galeri_pelaksanaan.pengajuan_id')
            ->where('galeri_pelaksanaan_id', $id)
            ->join('tbl_pengajuan', 'tbl_pengajuan.pengajuan_id', '=', 'tbl_galeri_pelaksanaan.pengajuan_id')
            ->first();
        $galeri2 = Galeri::find($id);
        $pengajuan = Pengajuan::select('pengajuan_nama', 'pengajuan_id')->get();
        return view('admin.galeri_pelaksanaan.edit', compact('galeri', 'pengajuan', 'galeri2'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Galeri $galeri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $galeri = Galeri::find($id);
        $this->validate($request, [


            'galeri.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);
//        dd($request['vlimage2']);
        $pathGaleri = public_path() . '/images/';
        $pathTumb = public_path() . '/images/tumb/';
      if ($request['vlimage3'] == 1){

          File::delete($pathGaleri.'/galeri-'.$galeri->galeri_pelaksanaan_gb3);
          File::delete($pathTumb.'/tumb-'.$galeri->galeri_pelaksanaan_gb3);
          $galeri->galeri_pelaksanaan_gb3 = null;
      }
      if ($request['vlimage2'] == 1){

          File::delete($pathGaleri.'/galeri-'.$galeri->galeri_pelaksanaan_gb2);
          File::delete($pathTumb.'/tumb-'.$galeri->galeri_pelaksanaan_gb2);
          $galeri->galeri_pelaksanaan_gb2 = null;
      }
      if ($request['vlimage1'] == 1){

          File::delete($pathGaleri.'/galeri-'.$galeri->galeri_pelaksanaan_gb1);
          File::delete($pathTumb.'/tumb-'.$galeri->galeri_pelaksanaan_gb1);
          $galeri->galeri_pelaksanaan_gb1 = null;
      }

        if ($request->hasFile('galeri3')) {
            $pathGaleri = public_path() . '/images/';
            $pathTumb = public_path() . '/images/tumb/';
            File::delete($pathGaleri.'/galeri-'.$galeri->galeri_pelaksanaan_gb3);
            File::delete($pathTumb.'/tumb-'.$galeri->galeri_pelaksanaan_gb3);

            $image3 = $request->file('galeri3');
            $filename3 = time() . uniqid() . '.' . $image3->getClientOriginalExtension();
            Image::make($image3)->resize(1040, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('/images/galeri-' . $filename3));

            Image::make($image3)->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('/images/tumb/tumb-' . $filename3));
            $galeri->galeri_pelaksanaan_gb3 = $filename3;
        }

        if ($request->hasFile('galeri2')) {
            $pathGaleri = public_path() . '/images/';
            $pathTumb = public_path() . '/images/tumb/';
            File::delete($pathGaleri . '/galeri-' . $galeri->galeri_pelaksanaan_gb2);
            File::delete($pathTumb . '/tumb-' . $galeri->galeri_pelaksanaan_gb2);

            $image2 = $request->file('galeri2');
            $filename2 = time() . uniqid() . '.' . $image2->getClientOriginalExtension();
            Image::make($image2)->resize(1040, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('/images/galeri-' . $filename2));

            Image::make($image2)->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('/images/tumb/tumb-' . $filename2));
            $galeri->galeri_pelaksanaan_gb2 = $filename2;
        }
        if ($request->hasFile('galeri1')) {
            $pathGaleri = public_path() . '/images/';
            $pathTumb = public_path() . '/images/tumb/';
            File::delete($pathGaleri . '/galeri-' . $galeri->galeri_pelaksanaan_gb1);
            File::delete($pathTumb . '/tumb-' . $galeri->galeri_pelaksanaan_gb1);

            $image1 = $request->file('galeri1');
            $filename1 = time() . uniqid() . '.' . $image1->getClientOriginalExtension();

            Image::make($image1)->resize(1040, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('/images/galeri-' . $filename1));

            Image::make($image1)->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('/images/tumb/tumb-' . $filename1));

            $galeri->galeri_pelaksanaan_gb1 = $filename1;
        }
        $request->pengajuan_id=$request['pengajuan_id'];
        $galeri->update();
        return redirect('admin_galeri');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Galeri $galeri
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $galeri2 = Galeri::findOrFail($id);
        $galeri = Galeri::where('galeri_pelaksanaan_id', $id)->get();
        foreach ($galeri as $value) {
            $pathGaleri = public_path() . '/images/';
            File::delete($pathGaleri . '/galeri-' . $value->galeri_pelaksanaan_gb1);
            File::delete($pathGaleri . '/galeri-' . $value->galeri_pelaksanaan_gb2);
            File::delete($pathGaleri . '/galeri-' . $value->galeri_pelaksanaan_gb3);
            $pathTumb = public_path() . '/images/tumb';
            File::delete($pathTumb . '/tumb-' . $value->galeri_pelaksanaan_gb1);
            File::delete($pathTumb . '/tumb-' . $value->galeri_pelaksanaan_gb2);
            File::delete($pathTumb . '/tumb-' . $value->galeri_pelaksanaan_gb3);
        }

        $galeri2->delete();
        return redirect('admin_galeri');
    }
}
