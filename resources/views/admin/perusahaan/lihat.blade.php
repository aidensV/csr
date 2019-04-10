<?php $hal = 'admin_perusahaan' ?>


@extends('layouts.admin.master')

@section('title', 'Admin | Detail Perusahaan')

@section('content')
<!-- ##### MAIN PANEL ##### -->

<div class="kt-pagetitle">
  <h5>Detail Perusahaan Partisipasi</h5>
</div><!-- kt-pagetitle -->

<div class="kt-pagebody">



  <div class="row">
    @foreach($perusahaan as $data)


    @php

    $stt = $data->perusahaan_status;
    $status = "";

    if ($stt=="1") {
      $status = "<span class='square-8 bg-success mg-r-5 rounded-circle'></span> Aktif";
    }elseif ($stt == "2") {
      $status = "<span class='square-8 bg-danger mg-r-5 rounded-circle'></span> Non-Aktif";
    }


    @endphp
    <div class="col-md-4 col-lg-3">
      <label class="content-left-label">Status :</label>
      <label class="content-left-label">{!!$status!!}</label>

    </div><!-- col-3 -->

    <div class="col-md-8 col-lg-9 mg-t-30 mg-md-t-0">

      <label class="content-left-label">Informasi Perusahaan</label>
      <div class="card bg-gray-200 bd-0">
        <div class="edit-profile-form">

          <div class="form-group row">
            <label class="col-sm-3 form-control-label">Nama Perusahaan</label>
            <div class="col-sm-8 col-xl-6 mg-t-10 mg-sm-t-0">
              <input readonly class="form-control" placeholder="Enter lastname" type="text" value="{{$data->perusahaan_nama}}">
            </div>
          </div><!-- form-group -->
          <div class="form-group row">
            <label class="col-sm-3 form-control-label">Kategori</label>
            <div class="col-sm-8 col-xl-6 mg-t-10 mg-sm-t-0">
              <input readonly class="form-control" placeholder="Enter lastname" type="text" value="{{$data->bidang_nama}}">
            </div>
          </div><!-- form-group -->
          <div class="form-group row">
            <label class="col-sm-3 form-control-label">Alamat</label>
            <div class="col-sm-8 col-xl-6 mg-t-10 mg-sm-t-0">
              <input readonly class="form-control" placeholder="Enter lastname" type="text" value="{{$data->perusahaan_alamat}}">
            </div>
          </div><!-- form-group -->
          <div class="form-group row">
            <label class="col-sm-3 form-control-label">Kecamatan</label>
            <div class="col-sm-8 col-xl-6 mg-t-10 mg-sm-t-0">
              <input readonly class="form-control" placeholder="Enter lastname" type="text" value="{{$data->perusahaan_kecamatan}}">
            </div>
          </div><!-- form-group -->
          <div class="form-group row">
            <label class="col-sm-3 form-control-label">Kelurahan</label>
            <div class="col-sm-8 col-xl-6 mg-t-10 mg-sm-t-0">
              <input readonly class="form-control" placeholder="Enter lastname" type="text" value="{{$data->perusahaan_kelurahan}}">
            </div>
          </div><!-- form-group -->
          <div class="form-group row">
            <label class="col-sm-3 form-control-label">E-Mail</label>
            <div class="col-sm-8 col-xl-6 mg-t-10 mg-sm-t-0">
              <input readonly class="form-control" placeholder="Enter lastname" type="text" value="{{$data->perusahaan_email}}">
            </div>
          </div><!-- form-group -->
          <div class="form-group row">
            <label class="col-sm-3 form-control-label">Contact Person</label>
            <div class="col-sm-8 col-xl-6 mg-t-10 mg-sm-t-0">
              <input readonly class="form-control" placeholder="Enter lastname" type="text" value="{{$data->perusahaan_contact_person}}">
            </div>
          </div><!-- form-group -->

        </div><!-- wd-60p -->
      </div><!-- card -->

    </div><!-- col-9 -->
    @endforeach
  </div><!-- row -->

</div><!-- kt-pagebody -->

@endsection


@section('js')
<!-- <script src="{{ asset('admin/lib/jquery-ui/jquery-ui.js') }}"></script> -->
<script src="{{ asset('public/admin/lib/highlightjs/highlight.pack.js') }}"></script>
<script src="{{ asset('public/admin/lib/highlightjs/highlight.pack.js') }}"></script>
<script src="{{ asset('public/admin/lib/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('public/admin/lib/datatables-responsive/dataTables.responsive.js') }}"></script>

@endsection

@section('script')



<script>
$(function(){
  'use strict';

  $('#datatable1').DataTable({
    responsive: true,
    language: {
      searchPlaceholder: 'Search...',
      sSearch: '',
      lengthMenu: '_MENU_ items/page',
    }
  });

  $('#datatable2').DataTable({
    bLengthChange: false,
    searching: false,
    responsive: true
  });

  // Select2
  $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

});
</script>

@endsection
