<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slideshow;
use Image;
use File;
class AdminDataSlideshowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slideshow = Slideshow::all();
        $jumlah = count($slideshow);

        return view('admin.slideshow.index',compact('slideshow'))->with('jumlah',$jumlah);
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
        $slideshow = new Slideshow;
        if($request->hasFile('file_slideshow')){
          $filerequest = $request->file('file_slideshow');
          $filename = time() .uniqid(). '.' . $filerequest->getClientOriginalExtension();
          Image::make($filerequest)->crop(1100,500)->save(public_path('/images/slideshow-'. $filename));
          Image::make($filerequest)->resize(200, null, function ($constraint) {
          $constraint->aspectRatio();
       })->save(public_path('/images/tumb/tumb-'. $filename));
        $slideshow->slideshow_gambar=$filename;
        $slideshow->save();
     }else {
       echo "GAGAL MENYIMPAN GAMBAR";
     }
     return redirect('admin_slideshow');
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
        $slideshowdelete = Slideshow::findOrFail($id);
        $slideshow = Slideshow::where('slideshow_id',$id)->get();
        foreach ($slideshow as $value) {
          $pathSlideshow = public_path() . '/images/';
          $pathTumbnail = public_path() . '/images/tumb/';

          File::delete($pathSlideshow.'/slideshow-'.$value->slideshow_gambar);
          File::delete($pathTumbnail.'/tumb-'.$value->slideshow_gambar);
        }
        $slideshowdelete->delete();
        return redirect('admin_slideshow');
    }
}
