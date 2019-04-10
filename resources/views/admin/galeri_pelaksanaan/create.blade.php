<?php $hal = 'admin_galeri' ?>
@extends('layouts.admin.master')

@section('title', 'Tabel | Tambah Galeri Pengajuan')

@section('css')
<link href="{{ asset('public/admin/lib/medium-editor/medium-editor.css') }}" rel="stylesheet">
<link href="{{ asset('public/admin/lib/medium-editor/default.css') }}" rel="stylesheet">
<link href="{{ asset('public/admin/lib/summernote/summernote-bs4.css') }}" rel="stylesheet">
<link href="{{ asset('public/admin/lib/select2/css/select2.min.css') }}" rel="stylesheet">
<link href="{{ asset('public/admin/lib/spectrum/spectrum.css') }}" rel="stylesheet">

@endsection

@section('content')
<!-- ##### MAIN PANEL ##### -->

<div class="kt-pagetitle">
  <h5>Form Tambah Galeri Pelaksanaan</h5>
</div><!-- kt-pagetitle -->

<div class="kt-pagebody">

  <div class="card pd-20 pd-sm-40">

    <div class="table-wrapper">
      {{--<form class="form-horizontal tasi-form" action="{{ route('admin_galeri.store') }}" method="post" enctype="multipart/form-data">--}}
        {{--{{csrf_field()}}--}}

        {{--<div class="form-group">--}}
          {{--<label class="col-sm-2 col-sm-2 control-label">Pengajuan</label>--}}
          {{--<div class="col-sm-10">--}}
            {{--<select class="form-control" name="pengajuan_id">--}}
              {{--@foreach ($pengajuan as $data_pengajuan)--}}
              {{--<option value="{{$data_pengajuan->pengajuan_id}}">{{$data_pengajuan->pengajuan_nama}}</option>--}}
              {{--@endforeach--}}
            {{--</select>--}}
            {{-- <select type="text" class="form-control" name="nama" placeholder="Isikan Nama Pengguna"> --}}
          {{--</div>--}}
        {{--</div>--}}

        {{--<div class="form-group">--}}
          {{--<label class="col-sm-2 col-sm-2 control-label">Gambar 1 <span class="tx-danger">*</span></label>--}}
          {{--<div class="col-sm-10">--}}
            {{--<input type="file" class="form-control" name="galeri[]" >--}}
          {{--</div>--}}
        {{--</div>--}}


        {{--<div class="form-group">--}}
          {{--<label class="col-sm-4 col-sm-4 control-label">Gambar 2 <span class="tx-danger">*</span></label>--}}
          {{--<div class="col-sm-10">--}}
            {{--<input type="file"  class="form-control" name="galeri2">--}}
          {{--</div>--}}
        {{--</div>--}}

        {{--<div class="form-group">--}}
          {{--<label class="col-sm-4 col-sm-4 control-label">Gambar 3 <span class="tx-danger">*</span></label>--}}
          {{--<div class="col-sm-10">--}}
            {{--<input type="file"  class="form-control" name="galeri2">--}}
          {{--</div>--}}
        {{--</div>--}}

        {{--<div class="form-group">--}}
          {{--<label class="col-sm-2 col-sm-2 control-label"></label>--}}
          {{--<div class="col-sm-10">--}}
            {{--<button type="submit" class="btn btn-primary">Tambah</button>--}}
          {{--</div>--}}
        {{--</div>--}}

      {{--</form>--}}
      @if (count($errors) > 0)
     <div class="alert alert-danger">
       <strong>Whoops!</strong> There were some problems with your input.<br><br>
       <ul>
         @foreach ($errors->all() as $error)
             <li>{{ $error }}</li>
         @endforeach
       </ul>
     </div>
     @endif

       @if(session('danger'))
       <div class="alert alert-danger">
         {{ session('danger') }}
       </div>
       @endif
        <form method="post" action="{{route('admin_galeri.store')}}" enctype="multipart/form-data">
            {{csrf_field()}}

            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Pengajuan</label>
              <div class="col-sm-10">
                <select class="form-control" name="pengajuan_id">
                  @foreach ($pengajuan as $data)
                  <option value="{{$data->pengajuan_id}}">{{$data->pengajuan_nama}}</option>
                @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Unggah Photo</label>
              <div class="col-sm-10">
                <div class="input-group " >
                    <input type="file" name="galeri" class="form-control">

                </div>

                {{--<div class="clone hide">--}}
                    {{--<div class="control-group input-group" style="margin-top:10px">--}}
                        {{--<input type="file" name="galeri" class="form-control">--}}
                        {{--<div class="input-group-btn">--}}
                            {{--<button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Hapus</button>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

              </div>
            </div>
{{--
            <div class="input-group control-group increment" >
                <input type="file" name="galeri[]" class="form-control">
                <div class="input-group-btn">
                    <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                </div>
            </div>
            <div class="clone hide">
                <div class="control-group input-group" style="margin-top:10px">
                    <input type="file" name="galeri[]" class="form-control">
                    <div class="input-group-btn">
                        <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                    </div>
                </div>
            </div> --}}

            <button type="submit" class="btn btn-primary" style="margin-top:10px">Simpan</button>

        </form>
        {{-- @foreach ($galeri2 as $data_galeri) --}}

        {{-- @endforeach --}}
    </div><!-- table-wrapper -->
  </div><!-- card -->






</div><!-- kt-pagebody -->




@endsection


@section('js')
<!-- <script src="{{ asset('admin/lib/jquery-ui/jquery-ui.js') }}"></script> -->
<!-- <script src="{{ asset('public/admin/lib/highlightjs/highlight.pack.js') }}"></script>
  <script src="{{ asset('public/admin/lib/highlightjs/highlight.pack.js') }}"></script>
  <script src="{{ asset('public/admin/lib/datatables/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('public/admin/lib/datatables-responsive/dataTables.responsive.js') }}"></script> -->

<script src="{{ asset('public/admin/lib/highlightjs/highlight.pack.js') }}"></script>
<script src="{{ asset('public/admin/lib/medium-editor/medium-editor.js') }}"></script>
<script src="{{ asset('public/admin/lib/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('public/admin/lib/jquery-ui/jquery-ui.js') }}"></script>
<script src="{{ asset('public/admin/lib/highlightjs/highlight.pack.js') }}"></script>
<script src="{{ asset('public/admin/lib/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('public/admin/lib/spectrum/spectrum.js') }}"></script>


@endsection

@section('script')



<script>
  $(function() {
    'use strict';

    // Inline editor
    var editor = new MediumEditor('.editable');

    // Summernote editor
    $('#summernote').summernote({
      height: 150,
      tooltip: false
    });

    'use strict';

    $('.select2').select2({
      minimumResultsForSearch: Infinity
    });

    // Select2 by showing the search
    $('.select2-show-search').select2({
      minimumResultsForSearch: ''
    });

    // Select2 with tagging support
    $('.select2-tag').select2({
      tags: true,
      tokenSeparators: [',', ' ']
    });


    // Datepicker
    $('.fc-datepicker').datepicker({
      showOtherMonths: true,
      selectOtherMonths: true
    });

  });
</script>
<script type="text/javascript">

    $(document).ready(function() {

        $(".btn-success").click(function(){
            var html = $(".clone").html();
            $(".increment").after(html);
        });

        $("body").on("click",".btn-danger",function(){
            $(this).parents(".control-group").remove();
        });

    });

</script>

@endsection
