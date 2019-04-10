<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $berita = DB::table('tbl_berita')->get();
        $batas=4;
        $berita = DB::table('tbl_berita')->orderBy('berita_id','desc')->paginate($batas);
        $terpopuler = DB::table('tbl_berita')->orderBy('berita_counter','desc')->paginate($batas);
        $no=$batas*($berita->currentPage()-1);
        return view('user.news',['no'=>$no,'berita'=>$berita,'terpopuler'=>$terpopuler]);
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
        $berita = DB::table('tbl_berita')->where('berita_id',$id)->get();

        foreach ($berita as $dt) {
            $berita_counter2 = $dt->berita_counter+1;
        }

        DB::table('tbl_berita')->where('berita_id',$id)->update(['berita_counter'=>$berita_counter2]);

        $latestPost = DB::table('tbl_berita')->orderBy('berita_id','desc')->limit(4)->get();
        return view('user.news_detail',['berita'=>$berita,'latestPost'=>$latestPost]);
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
