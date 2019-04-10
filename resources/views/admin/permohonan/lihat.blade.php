<?php $hal = 'admin_permohonan' ?>


@extends('layouts.admin.master')

@section('title', 'Admin | Detail Permohonan')

@section('content')
<!-- ##### MAIN PANEL ##### -->

<div class="kt-pagetitle">
  <h5>Detail Permohonan</h5>
</div><!-- kt-pagetitle -->

<div class="kt-pagebody">



  <div class="row">
    @foreach($permohonan as $data)


    @php

    $stt = $data->permohonan_status;
    $status = "";


    if ($stt=="3") {
      $status = "<span class='square-8 bg-warning mg-r-5 rounded-square'></span> Permohonan";
    }elseif ($stt == "1") {
      $status = "<span class='square-8 bg-success mg-r-5 rounded-square'></span> Disetujui";
    }elseif ($stt == "0") {
      $status = "<span class='square-8 bg-danger mg-r-5 rounded-square'></span> Ditolak";
    }elseif ($stt == "2") {
      $status = "<span class='square-8 bg-primary mg-r-5 rounded-square'></span> Ditindak lanjuti";
    }

    @endphp
    <div class="col-md-4 col-lg-4">
      <label class="content-left-label">Status Permohonan</label>
      <label class="content-left-label">{!!$status!!}</label>

      <br>

      <label class="content-left-label">Dokumen Kelengkapan</label>
      <div class="card pd-20 pd-sm-40">
        <div class="row row-sm mg-t-0">
          @foreach ($file_permohonan as $data2)
          <div class="col-sm-6">

            <a target="_blank" href="{{asset('public/files')}}/{{$data2->file_permohonan_path}}">

              <div class="card pd-20 tx-center">
                <div class="d-flex justify-content-center">
                  <img style="height:70px;width:50px;" src="{{asset('/public/admin/img/pdf-ico.png')}}" class="wd-100" alt="">

                </div>
                <br>
                <p>{{$data2->file_permohonan_nama}}</p>



              </div><!-- card -->

            </a>
          </div><!-- col-6 -->

          @endforeach


        </div>
      </div>

    </div><!-- col-3 -->

    <div class="col-md-8 col-lg-8 mg-t-30 mg-md-t-0">

      <label class="content-left-label">Informasi Permohonan</label>
      <div class="card bg-gray-200 bd-0">
        <div class="edit-profile-form">
          <div class="form-group row">
            <label class="col-sm-3 form-control-label">Nama Permohonan</label>
            <div class="col-sm-8 col-xl-6 mg-t-10 mg-sm-t-0">
              <input readonly class="form-control" placeholder="Enter lastname" type="text" value="{{$data->permohonan_nama}}">
            </div>
          </div><!-- form-group -->
          <div class="form-group row">
            <label class="col-sm-3 form-control-label">Nama OPD</label>
            <div class="col-sm-8 col-xl-6 mg-t-10 mg-sm-t-0">
              <input readonly class="form-control" placeholder="Enter lastname" type="text" value="{{$data->opd_nama}}">
            </div>
          </div><!-- form-group -->
          <div class="form-group row">
            <label class="col-sm-3 form-control-label">Nama Program</label>
            <div class="col-sm-8 col-xl-6 mg-t-10 mg-sm-t-0">
              <input readonly class="form-control" placeholder="Enter lastname" type="text" value="{{$data->program_nama}}">
            </div>
          </div><!-- form-group -->
          <div class="form-group row">
            <label class="col-sm-3 form-control-label">Estimasi Anggaran (Rp.)</label>
            <div class="col-sm-8 col-xl-6 mg-t-10 mg-sm-t-0">
              <?php $permohonan_estimasi_anggaran=number_format($data->permohonan_estimasi_anggaran,0,',','.'); ?>
              <input readonly class="form-control" placeholder="Enter location" type="text" value="{{$permohonan_estimasi_anggaran}}.-">
            </div>
          </div><!-- form-group -->
          <div class="form-group row">
            <label class="col-sm-3 form-control-label">Tanggal Permohonan</label>
            <div class="col-sm-8 col-xl-6 mg-t-10 mg-sm-t-0">
              <input readonly class="form-control" placeholder="Enter lastname" type="text" value="{{tanggal_indonesia($data->permohonan_tanggal)}}">
            </div>
          </div><!-- form-group -->

          <div class="form-group row mg-b-0">
            <div id="accordion" class="accordion col-sm-12" role="tablist" aria-multiselectable="true">

              <div class="card">
                <div class="card-header" role="tab" id="headingOne">
                  <h6 class="mg-b-0">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne" class="tx-gray-800 transition">
                    <b>Deskripsi Permohonan</b>
                  </a>
                </h6>
              </div><!-- card-header -->

              <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                <div class="card-block pd-20">
                  {!! $data->permohonan_deskripsi !!}
                </div>
              </div>
            </div><!-- card -->
            <!-- ADD MORE CARD HERE -->
          </div><!-- accordion -->
        </div><!-- form-group -->

      </div><!-- wd-60p -->
    </div><!-- card -->

  </div><!-- col-9 -->
  @endforeach
</div><!-- row -->

<br>


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
