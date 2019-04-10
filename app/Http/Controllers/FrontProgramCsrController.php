<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Program;
use App\KriteriaAward;

class FrontProgramCsrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // $program_jenis = "1";
        $program_jenis2 = "Prioritas";
        if ($id==1) {
            $program_jenis2 = "Prioritas";
        }elseif ($id==2) {
            $program_jenis2 = "Tambahan";
        }
        $program = Program::join('tbl_bidang', 'tbl_program.bidang_id', '=', 'tbl_bidang.bidang_id')->where('tbl_program.program_jenis',$id)->orderBy('tbl_program.program_id', 'DESC')->paginate(8);
        
        return view('user.program_csr',['program'=>$program,'program_jenis'=>$id,'program_jenis2'=>$program_jenis2]);
    }
    public function indexCsrAward()
    {
        $csr_award = KriteriaAward::join('tbl_kategori_award', 'tbl_kriteria_award.kategori_award_id', '=', 'tbl_kategori_award.kategori_award_id')->orderBy('tbl_kriteria_award.kriteria_award_id', 'DESC')->paginate(8);
        
        return view('user.csr_award',['csr_award'=>$csr_award]);
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
        $program = Program::join('tbl_bidang', 'tbl_program.bidang_id', '=', 'tbl_bidang.bidang_id')->where('tbl_program.program_id',$id)->get();

        return view('user.program_csr_detail',['program'=>$program]);
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
