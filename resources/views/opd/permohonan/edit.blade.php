<?php $hal = 'opd_permohonan' ?>


@extends('layouts.opd.master')

@section('title', 'Tabel | Admin')

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
  <h5>Ubah Permohonan </h5>
</div><!-- kt-pagetitle -->

<div class="kt-pagebody">

  <div class="card pd-20 pd-sm-40">

    <div class="table-wrapper">
      <form class="form-horizontal tasi-form" action="{{route('opd_permohonan.update',$permohonan->permohonan_id)}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        {{ method_field('PUT') }}

        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
          </ul>
        </div>
        @endif
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Nama OPD</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" readonly value="{{$permohonan->opd_nama}}">

            <input type="hidden" class="form-control" name="opd_id" readonly value="{{$permohonan->opd_id}}">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Program</label>
          <div class="col-sm-10">
            <select class="form-control" name="program_id">
              @php

                if ($permohonan['program_id'] == !null) {
                  echo "<option value='$permohonan->program_id' selected>$permohonan->program_nama</option>";
                  }

              @endphp
              @foreach ($program as $data_program )
              <option value="{{$data_program->program_id}}">{{$data_program->program_nama}}</option>
              @endforeach
            </select>
            {{-- <input type="text" class="form-control" name="admin_produk_nama" placeholder="Isikan Nama Admin Produk"> --}}
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Permohonan</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" value="{{$permohonan->permohonan_nama}}" name="permohonan_nama">
            <input type="hidden" class="form-control" value="1" name="permohonan_status">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Estimasi Anggaran</label>
          <div class="col-sm-10">
            <div class="input-group">
              <span class="input-group-addon">Rp.</span>
              <input type="number" class="form-control" name="permohonan_estimasi_anggaran" value="{{$permohonan->permohonan_estimasi_anggaran}}">
            </div>
          </div>
      </div>

        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Deskripsi</label>
          <div class="col-sm-10">
            <textarea id="summernote" name="permohonan_deskripsi" rows="8" cols="80">{{$permohonan->permohonan_deskripsi}}</textarea>
            {{-- <input type="number" class="form-control" name="admin_produk_nohp" placeholder="Contoh : 085745291865"> --}}
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label"></label>
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Ubah</button>
          </div>
        </div>

      </form>
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

@endsection
