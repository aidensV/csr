<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Permohonan;
use App\Opd;
use App\Program;
use Auth;
use DB;
use File;
use App\File_permohonan;

class OpdPermohonanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $opd_permohonan = Permohonan::join('tbl_opd', 'tbl_opd.opd_id', '=', 'tbl_permohonan.opd_id')
            ->join('tbl_program', 'tbl_program.program_id', '=', 'tbl_permohonan.program_id')
            ->get();
        return view('opd.permohonan.index', compact('opd_permohonan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $user = Auth::user()->id;

         $opd = Opd::where('users_id', $user)->first();
         $program = Program::select('*')->orderBy('program_nama')->get();
         return view('opd.permohonan.create', compact('opd', 'program'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $permohonan = new Permohonan;
        $permohonan->fill($request->all())->save();
        $permohonanID = Permohonan::max('permohonan_id');

        return redirect('upload_file/'.$permohonanID);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $program = Program::select('*')->orderBy('program_nama')->get();
        $permohonan = Permohonan::where('permohonan_id',$id)
        ->join('tbl_opd','tbl_opd.opd_id','=','tbl_permohonan.opd_id')
        ->join('tbl_program','tbl_program.program_id','=','tbl_permohonan.program_id')->first();

        return view('opd.permohonan.edit',compact('permohonan','program'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $permohonan = Permohonan::find($id);
      $permohonan->fill($request->all())->update();

      return redirect('upload_file/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permohonan = Permohonan::findOrFail($id);
        $permohonan_file = File_permohonan::where('permohonan_id',$id)->get();
        foreach ($permohonan_file as $value) {
          $destinationPath = public_path() . '/files/';
          File::delete($destinationPath.'/'.$value->file_permohonan_path);
          $value->delete();
        }
        $permohonan->delete();
        return redirect('opd_permohonan');

    }

    public function upload_pdf($id)
    {
        $jumlah=DB::table('tbl_file_permohonan')
            ->select(DB::raw('count(file_permohonan_nama) as jumlah'))
            ->where('permohonan_id', $id)
            ->get();
            $file_permohonan = File_permohonan::where('permohonan_id',$id)->get();

        return view('opd.permohonan.upload_pdf', compact('jumlah','file_permohonan'))->with('idPermohonan', $id);
    }

    public function store_pdf(Request $request)
    {
        $permohonan = new File_permohonan;

        if ($file = $request->hasFile('file_dokumen')) {
              $file = $request->file('file_dokumen');
              $filepath = time() . '.' . $file->getClientOriginalExtension();
              $filename = $file->getClientOriginalName();
              $destinationPath = public_path() . '/files/';
              $file->move($destinationPath, $filepath);


        $permohonan->permohonan_id = $request['permohonan_id'];
        $permohonan->file_permohonan_path = $filepath;
        $permohonan->file_permohonan_nama = $filename;
        $permohonan->save();
}
      return redirect('upload_file/'.$request['permohonan_id']);


    }

    public function delete_pdf(Request $request)
    {
      $idFile = $request['file_id'];
      $idPermohonan = $request['permohonan_id'];
        $permohonan_file = File_permohonan::findOrFail($idFile);
        $destinationPath = public_path() . '/files/';
        File::delete($destinationPath.'/'.$permohonan_file->file_permohonan_path);
        $permohonan_file->delete();

      return redirect('upload_file/'.$idPermohonan);


    }
}
