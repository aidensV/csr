<?php

namespace App\Http\Controllers;

use App\Berita;
use Image;
use File;
use Illuminate\Http\Request;

class AdminDataBeritaController extends Controller
{
    protected $pesan = array(
        'berita_judul.required' => 'Isikan Judul Berita',
        'berita_isi.required' => 'Isikan Isi Berita',
        'berita_gambar.required' => 'Pilih Gambar Berita'
    );
    protected $pesanUpdate = array(
        'berita_judul.required' => 'Isikan Judul Berita',
        'berita_isi.required' => 'Isikan Isi Berita'
    );


    protected $aturan = array(
        'berita_judul' => 'required',
        'berita_isi' => 'required',
        'berita_gambar' => 'required',
        'berita_gambar.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

    );
    protected $aturanUpdate = array(
        'berita_judul' => 'required',
        'berita_isi' => 'required',
        'berita_gambar.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

    );
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $berita = Berita::select('berita_id','berita_tanggal','berita_judul')->orderBy('updated_at','DESC')->get();

        return view('admin.berita.index',compact('berita'))->with('no',1);
        // dd($berita);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.berita.create');
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

        $berita = new Berita;
        if($request->hasFile('berita_gambar')){
            $filerequest = $request->file('berita_gambar');
            $filename = time() . uniqid().'.' . $filerequest->getClientOriginalExtension();
            Image::make($filerequest)->resize(1040, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('/images/berita-'. $filename));
            Image::make($filerequest)->resize(100, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('/images/tumb/tumb-'. $filename));

            $berita->berita_judul = $request['berita_judul'];
            $berita->berita_gambar = $filename;
            $berita->berita_tanggal = Date('Y-m-d');
            $berita->berita_isi = $request['berita_isi'];
            $berita->save();
        }else {
            return back()->with('danger', 'Ukuran Maksimal Gambar 2 MB');
        }
        return redirect('admin_berita');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $berita = Berita::findOrFail($id);

        return view('admin.berita.show',compact('berita'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $berita = Berita::findOrFail($id);

        return view('admin.berita.edit',compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, $this->aturanUpdate, $this->pesanUpdate);

        $berita = Berita::find($id);
        if ($request->hasFile('berita_gambar')) {
            $pathdelete = public_path() . '/images/';
            File::delete($pathdelete.'/berita-'.$berita->berita_gambar);
            File::delete($pathdelete.'/tumb/tumb-'.$berita->berita_gambar);

            $filerequest = $request->file('berita_gambar');
            $filename = time() . uniqid() . '.' . $filerequest->getClientOriginalExtension();
            Image::make($filerequest)->resize(1100, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('/images/berita-' . $filename));
            Image::make($filerequest)->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('/images/tumb/tumb-' . $filename));

            $berita->berita_judul = $request['berita_judul'];
            $berita->berita_gambar = $filename;
            $berita->berita_tanggal = Date('Y-m-d');
            $berita->berita_isi = $request['berita_isi'];
            $berita->update();
        } else {
            $berita->berita_judul = $request['berita_judul'];
            $berita->berita_tanggal = Date('Y-m-d');
            $berita->berita_isi = $request['berita_isi'];
            $berita->update();
        }


        return redirect('admin_berita');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        $pathdelete = public_path() . '/images/';
        File::delete($pathdelete.'/berita-'.$berita->berita_gambar);
        File::delete($pathdelete.'/tumb/tumb-'.$berita->berita_gambar);
        $berita->delete();
        return back();
    }
}
