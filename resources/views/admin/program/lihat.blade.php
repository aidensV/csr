<?php $hal = 'admin_program' ?>


@extends('layouts.admin.master')

@section('title', 'Admin | Data Program')

@section('css')
<link href="{{ asset('public/admin/lib/summernote/summernote-bs4.css') }}" rel="stylesheet">

@endsection

@section('content')
<!-- ##### MAIN PANEL ##### -->

<div class="kt-pagetitle">
  <h5>Detail Program</h5>
</div><!-- kt-pagetitle -->

<div class="kt-pagebody">

  @foreach($program as $data)

  <div class="row">
    <div class="col-md-4 col-lg-3">
      <label class="content-left-label">Gambar Program </label>
      <figure class="edit-profile-photo">
        <img src="{{asset('public/images')}}/program-{{$data->program_gambar}}" class="img-fluid" alt="">

      </figure>
    </div><!-- col-3 -->
    <div class="col-md-8 col-lg-9 mg-t-30 mg-md-t-0">


      <label class="content-left-label">Informasi Data Program </label>
      <div class="card bg-gray-200 bd-0">
        <div class="edit-profile-form">
          <div class="form-group row">
            <label class="col-sm-3 form-control-label">Katrgori Bidang</label>
            <div class="col-sm-8 col-xl-6 mg-t-10 mg-sm-t-0">
              <input readonly class="form-control" placeholder="Enter lastname" type="text" value="{{$data->bidang_nama}}">
            </div>
          </div><!-- form-group -->
          <div class="form-group row">
            <label class="col-sm-3 form-control-label">Nama Program</label>
            <div class="col-sm-8 col-xl-6 mg-t-10 mg-sm-t-0">
              <input readonly class="form-control" placeholder="Enter lastname" type="text" value="{{$data->program_nama}}">
            </div>
          </div><!-- form-group -->
          <div class="form-group row">
            <label class="col-sm-3 form-control-label">Estimasi Biaya (Rp.)</label>
            <div class="col-sm-8 col-xl-6 mg-t-10 mg-sm-t-0">
              <?php $estimasi_biaya=number_format($data->program_estimasi_biaya,0,',','.'); ?>
              <input readonly class="form-control" placeholder="Enter location" type="text" value="{{$estimasi_biaya}}.-">
            </div>
          </div><!-- form-group -->
          <div class="form-group row">
            <label class="col-sm-3 form-control-label">Volime Satuan</label>
            <div class="col-sm-8 col-xl-6 mg-t-10 mg-sm-t-0">
              <input readonly class="form-control" placeholder="Enter location" type="text" value="{{$data->program_volume_satuan}}">
            </div>
          </div><!-- form-group -->
          <div class="form-group row">
            <label class="col-sm-3 form-control-label">Satuan Kerja</label>
            <div class="col-sm-8 col-xl-6 mg-t-10 mg-sm-t-0">

              <input readonly class="form-control" placeholder="Enter location" type="text" value="{{$data->program_satuan_kerja}}">
            </div>
          </div><!-- form-group -->

          <div class="form-group row">
            <label class="col-sm-3 form-control-label">Jenis Program</label>
            <div class="col-sm-8 col-xl-6 mg-t-10 mg-sm-t-0">
              @php
                $jenis = "";
                if($data->program_jenis=='1'){
                  $jenis = "Prioritas";
                }elseif($data->program_jenis=="2"){
                  $jenis = "Tambahan";
                }
              @endphp
              <input readonly class="form-control" placeholder="Enter location" type="text" value="{{$jenis}}">
            </div>
          </div><!-- form-group -->


      </div><!-- wd-60p -->
    </div><!-- card -->

  </div><!-- col-9 -->
</div><!-- row -->

@endforeach





</div><!-- kt-pagebody -->




@endsection


@section('js')
<!-- <script src="{{ asset('admin/lib/jquery-ui/jquery-ui.js') }}"></script> -->
<script src="{{ asset('public/admin/lib/highlightjs/highlight.pack.js') }}"></script>
<script src="{{ asset('public/admin/lib/highlightjs/highlight.pack.js') }}"></script>
<script src="{{ asset('public/admin/lib/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('public/admin/lib/datatables-responsive/dataTables.responsive.js') }}"></script>


<script src="{{ asset('public/admin/lib/medium-editor/medium-editor.js') }}"></script>
<script src="{{ asset('public/admin/lib/summernote/summernote-bs4.min.js') }}"></script>

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
