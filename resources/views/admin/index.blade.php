<?php $hal = 'index' ?>

@extends('layouts.admin.master')


@section('title', 'Index | Admin')

@section('content')
<div class="kt-pagetitle">
  <h5>Dashboard Owner </h5>
</div><!-- kt-pagetitle -->

<div class="kt-pagebody">

  <div class="row row-sm">
    <div class="col-lg-12">
      <div class="row row-sm">
        <div class="col-lg-4">
          <div class="card">
            <div class="card-body pd-b-0">
              <h6 class="card-body-title tx-12 tx-spacing-2 mg-b-20 tx-success">Total Data Perusahaan Partisipasi</h6>
              <h2 class="tx-lato tx-inverse">{{$total_perusahaan}}</h2>
            </div><!-- card-body -->
            <div  class="ht-50 ht-sm-70 mg-r--1"></div>
          </div><!-- card -->
        </div><!-- col-6 -->
        <div class="col-lg-4">
          <div class="card">
            <div class="card-body pd-b-0">
              <h6 class="card-body-title tx-12 tx-spacing-2 mg-b-20 tx-danger">Total Data Pengajuan CSR</h6>
              <h2 class="tx-lato tx-inverse">{{$total_pengajuan}}</h2>
            </div><!-- card-body -->
            <div  class="ht-50 ht-sm-70 mg-r--1"></div>
          </div><!-- card -->
        </div><!-- col-6 -->
        <div class="col-lg-4">
          <div class="card">
            <div class="card-body pd-b-0">
              <h6 class="card-body-title tx-12 tx-spacing-2 mg-b-20 tx-danger">Total Data Permohonan CSR</h6>
              <h2 class="tx-lato tx-inverse">{{$total_permohonan}}</h2>
            </div><!-- card-body -->
            <div  class="ht-50 ht-sm-70 mg-r--1"></div>
          </div><!-- card -->
        </div><!-- col-6 -->
      </div><!-- row -->
    </div><!-- col-8 -->
  </div><!-- row -->
</div><!-- kt-pagebody -->

@endsection


@section('js')
<script src="{{ asset('public/admin/lib/d3/d3.js') }}"></script>
<script src="{{ asset('public/admin/lib/rickshaw/rickshaw.min.js') }}"></script>
<script src="http://maps.google.com/maps/api/js?key=AIzaSyAEt_DBLTknLexNbTVwbXyq2HSf2UbRBU8"></script>
<script src="{{ asset('public/admin/lib/gmaps/gmaps.js') }}"></script>
<script src="{{ asset('public/admin/lib/chart.js/Chart.js') }}"></script>

<script src="{{ asset('public/admin/js/ResizeSensor.js') }}"></script>
<script src="{{ asset('public/admin/js/dashboard.js') }}"></script>
@endsection

@section('script')


  <script type="text/javascript">

  </script>
@endsection
