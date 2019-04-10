<?php $hal = 'admin_kategori_award' ?>


@extends('layouts.admin.master')

@section('title', 'Admin | Kriteria - kriteria')

@section('content')
    <!-- ##### MAIN PANEL ##### -->

    <div class="kt-pagetitle">
      <h5>Kriteria Kategori {{$nama_kategori->kategori_award_nama}}</h5>
    </div><!-- kt-pagetitle -->

    <div class="kt-pagebody">

      <div class="card pd-20 pd-sm-40">

        <table border="0" style="margin-bottom:10px;">
          <tr>
            <td>
              <a href="{{url('admin_kategori_award')}}" style=" width:100px;" class="card-body-title"><button class="btn btn-warning"><i class="fa fa-arrow-circle-left"></i> Kembali</button></a>
            </td>
          </tr>
        </table>

        <div class="table-wrapper">
          <table id="datatable1" class="table table-hover table-bordered mg-b-0">
            <thead class="bg-info">
              <tr>
                <th class="wd-10p">No.</th>
                <th >Nama Kriteria</th>
              </tr>
            </thead>
            <tbody>

              <?php  $no = 1;  ?>
              @foreach($kriteria_award as $data)


              <tr>
                <td>{{$no}}</td>
                <td>{{$data->kriteria_award_nama}}</td>

              </tr>
                <?php $no++ ?>
              @endforeach


            </tbody>
          </table>
        </div><!-- table-wrapper -->
      </div><!-- card -->



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
