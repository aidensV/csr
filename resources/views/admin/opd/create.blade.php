<?php $hal = 'admin_opd' ?>


@extends('layouts.admin.master')

@section('title', 'Tabel | OPD')

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
  <h5>Tambah Data OPD</h5>
</div><!-- kt-pagetitle -->

<div class="kt-pagebody">

  <div class="card pd-20 pd-sm-40">

    <div class="table-wrapper">
      <form class="form-horizontal tasi-form" action="{{ route('admin_opd.store') }}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

                @if ($errors->any())
    							<div class="alert alert-danger"><ul>
    							@foreach($errors->all() as $error)
    							<li>{{ $error }}</li>
    							@endforeach
    							</ul></div>
    						@endif
                @if ($pesan_error=="1")
    							<div class="alert alert-danger"><ul>

    							<li>Email Telah Digunakan</li>

    							</ul></div>
    						@endif
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Nama</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" name="opd_nama" placeholder="Isikan Nama OPD/Dinas Terkait">
                                      </div>
                                  </div>


                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">No. HP</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control"  name="opd_nohp" placeholder="Contoh: 085777666111">
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Alamat</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" name="opd_alamat" placeholder="Contoh: Jl. Brawijaya, Kediri">
                                      </div>
                                  </div>



                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">E-mail</label>
                                      <div class="col-sm-10">
                                          <input type="email" class="form-control" name="email" placeholder="Contoh: csr@gmail.com">
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="col-sm-4 col-sm-4 control-label">Password <span class="tx-danger">*</span> default (<span class="tx-danger"> opd12345</span>)</label>
                                      <div class="col-sm-10">
                                          <input type="password" readonly value="opd12345" class="form-control" name="password" placeholder="Isikan Nama Agenda">
                                      </div>
                                  </div>




                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label"></label>
                                      <div class="col-sm-10">
                                          <button type="submit" class="btn btn-primary">Tambah</button>
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
      $(function(){
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
