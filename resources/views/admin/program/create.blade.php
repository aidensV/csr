<?php $hal = 'admin_program' ?>


@extends('layouts.admin.master')

@section('title', 'Admin | Tambah Program')

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
  <h5>Tambah Program</h5>
</div><!-- kt-pagetitle -->

<div class="kt-pagebody">

  <div class="card pd-20 pd-sm-40">

    <div class="table-wrapper">
      <form class="form-horizontal tasi-form" action="{{ route('admin_program.store') }}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

                @if ($errors->any())
    							<div class="alert alert-danger"><ul>
    							@foreach($errors->all() as $error)
    							<li>{{ $error }}</li>
    							@endforeach
    							</ul></div>
    						@endif
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Nama Program</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" name="program_nama" placeholder="Isikan Nama Program">
                                      </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="kategori" class="col-md-3 control-label">Kategori Bidang</label>
                                    <div class="col-md-6">
                                      <select id="bidang_id" class="form-control" name="bidang_id">
                                        <option value="">-- Pilih --</option>
                                        @foreach($bidang as $list)
                                        <option value="{{ $list->bidang_id }}"> {{ $list->bidang_nama }} </option>
                                        @endforeach
                                      </select>
                                    </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Estimasi Biaya</label>
                                      <div class="col-sm-10">
                                        <div class="input-group">
                                          <span class="input-group-addon">Rp.</span>
                                          <input type="number" class="form-control" name="program_estimasi_biaya" placeholder="example : 2500000">
                                        </div>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Volume Satuan</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" name="program_volume_satuan" placeholder="Isikan Volume Satuan">
                                      </div>
                                  </div>



                                  <div class="form-group">
                                      <label class="col-sm-4 control-label">Satuan Kerja</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" name="program_satuan_kerja" placeholder="Isikan Satuan Kerja">
                                      </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="kategori" class="col-md-3 control-label">Jenis Program</label>
                                    <div class="col-md-6">
                                      <select id="program_jenis" class="form-control" name="program_jenis">
                                        <option value="">-- Pilih --</option>

                                        <option value="1"> Program Prioritas </option>
                                        <option value="2"> Program Tambahan </option>

                                      </select>
                                    </div>
                                  </div>

                                  <div class="form-group">
                                        <label class="col-sm-4 col-sm-4 control-label">Gambar (Recomended : 800x361 px)</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" name="gambar">
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
