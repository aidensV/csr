<?php $hal = 'admin_pengajuan' ?>


@extends('layouts.admin.master')

@section('title', 'Admin | Detail Pengajuan')

@section('content')
<!-- ##### MAIN PANEL ##### -->

<div class="kt-pagetitle">
  <h5>Detail Pengajuan</h5>
</div><!-- kt-pagetitle -->

<div class="kt-pagebody">



  <div class="row">
    @foreach($pengajuan as $data)


    @php

    $stt = $data->pengajuan_status;
    $status = "";


    if ($stt=="4") {
      $status = "<span class='square-8 bg-warning mg-r-5 rounded-square'></span> Pengajuan";
    }elseif ($stt == "1") {
      $status = "<span class='square-8 bg-success mg-r-5 rounded-square'></span> Diterima";
    }elseif ($stt == "0") {
      $status = "<span class='square-8 bg-danger mg-r-5 rounded-square'></span> Ditolak";
    }elseif ($stt == "2") {
      $status = "<span class='square-8 bg-primary mg-r-5 rounded-square'></span> Diselenggarakan";
    }elseif ($stt == "3") {
      $status = "<span class='square-8 bg-dark mg-r-5 rounded-square'></span> Direalisasikan";
    }


    @endphp
    <div class="col-md-4 col-lg-4">
      <label class="content-left-label">Status Pengajuan</label>
      <label class="content-left-label">{!!$status!!}</label>

      <br>

      <label class="content-left-label">Dokumen Kelengkapan</label>
      <div class="card pd-20 pd-sm-40">
        <div class="row row-sm mg-t-0">
          @foreach ($file_pengajuan as $data2)
          <div class="col-sm-6">

            <a target="_blank" href="{{asset('public/files')}}/{{$data2->file_pengajuan_path}}">

              <div class="card pd-20 tx-center">
                <div class="d-flex justify-content-center">
                  <img style="height:70px;width:50px;" src="{{asset('/public/admin/img/pdf-ico.png')}}" class="wd-100" alt="">

                </div>
                <br>
                <p>{{$data2->file_pengajuan_nama}}</p>



              </div><!-- card -->

            </a>
          </div><!-- col-6 -->

          @endforeach


        </div>
      </div>

    </div><!-- col-3 -->

    <div class="col-md-8 col-lg-8 mg-t-30 mg-md-t-0">

      <label class="content-left-label">Informasi Pengajuan</label>
      <div class="card bg-gray-200 bd-0">
        <div class="edit-profile-form">
          <div class="form-group row">
            <label class="col-sm-3 form-control-label">Nama Pengajuan</label>
            <div class="col-sm-8 col-xl-6 mg-t-10 mg-sm-t-0">
              <input readonly class="form-control" placeholder="Enter lastname" type="text" value="{{$data->pengajuan_nama}}">
            </div>
          </div><!-- form-group -->
          <div class="form-group row">
            <label class="col-sm-3 form-control-label">Nama Perusahaan</label>
            <div class="col-sm-8 col-xl-6 mg-t-10 mg-sm-t-0">
              <input readonly class="form-control" placeholder="Enter lastname" type="text" value="{{$data->perusahaan_nama}}">
            </div>
          </div><!-- form-group -->
          <div class="form-group row">
            <label class="col-sm-3 form-control-label">Nama Program</label>
            <div class="col-sm-8 col-xl-6 mg-t-10 mg-sm-t-0">
              <input readonly class="form-control" placeholder="Enter lastname" type="text" value="{{$data->program_nama}}">
            </div>
          </div><!-- form-group -->
          <div class="form-group row">
            <label class="col-sm-3 form-control-label">Estimasi Pembiayaan (Rp.)</label>
            <div class="col-sm-8 col-xl-6 mg-t-10 mg-sm-t-0">
              <?php $estimasi_pembiayaan=number_format($data->pengajuan_estimasi_pembiayaan,0,',','.'); ?>
              <input readonly class="form-control" placeholder="Enter location" type="text" value="{{$estimasi_pembiayaan}}.-">
            </div>
          </div><!-- form-group -->
          <div class="form-group row">
            <label class="col-sm-3 form-control-label">Tanggal Pengajuan</label>
            <div class="col-sm-8 col-xl-6 mg-t-10 mg-sm-t-0">
              <input readonly class="form-control" placeholder="Enter lastname" type="text" value="{{tanggal_indonesia($data->pengajuan_tanggal)}}">
            </div>
          </div><!-- form-group -->

          <div class="form-group row mg-b-0">
            <div id="accordion" class="accordion col-sm-12" role="tablist" aria-multiselectable="true">

              <div class="card">
                <div class="card-header" role="tab" id="headingOne">
                  <h6 class="mg-b-0">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne" class="tx-gray-800 transition">
                    <b>Deskripsi Pengajuan</b>
                  </a>
                </h6>
              </div><!-- card-header -->

              <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                <div class="card-block pd-20">
                  {!! $data->pengajuan_deskripsi !!}
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
