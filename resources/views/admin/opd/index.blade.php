<?php $hal = 'admin_opd' ?>
<?php $sub = 0 ?>


@extends('layouts.admin.master')

@section('title', 'Tabel | OPD')

@section('content')
    <!-- ##### MAIN PANEL ##### -->

    <div class="kt-pagetitle">
      <h5>Data OPD</h5>
    </div><!-- kt-pagetitle -->

    <div class="kt-pagebody">

      <div class="card pd-20 pd-sm-40">

        <table border="0" style="margin-bottom:10px;">
          <tr>
            <td>
              <a href="{{route('admin_opd.create')}}" style=" width:100px;" class="card-body-title"><button class="btn btn-primary">Tambah</button></a>
            </td>
          </tr>
        </table>


        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
              <tr>
                <th class="wd-10p">No.</th>
                <th class="wd-15p">Nama</th>
                <th class="wd-15p">No. HP</th>
                <th class="wd-25p">Alamat</th>
                <th class="wd-25p">Email</th>
                <th class="wd-25p">Action</th>
              </tr>
            </thead>
            <tbody>

              <?php  $no = 1;  ?>
              @foreach($opd as $data)

              <?php

              // $status = "";
              // $stt = $data->marketing_status;
              // $display = "";
              //
              // if ($stt=="1") {
              //   $status = "<span class='square-8 bg-success mg-r-5 rounded-circle'></span> Aktif";
              // }elseif ($stt == "0") {
              //   $status = "<span class='square-8 bg-danger mg-r-5 rounded-circle'></span> Keluar";
              //   $display = "display:none;";
              // }
               ?>

              <tr>
                <td>{{$no}}</td>
                <td>{{$data->opd_nama}}</td>
                <td>{{$data->opd_nohp}}</td>
                <td>{{$data->opd_alamat}}</td>
                <td>{{$data->email}}</td>


                <td>

                  <form action="{{ route('admin_opd.destroy', $data->id) }}" method="post">
											{{csrf_field()}}
											{{ method_field('DELETE') }}
                      <button class="btn btn-danger" onclick="return confirm('Are you sure?');" data-toggle="tooltip" data-placement="botttom" title="Hapus Data"><i class="icon ion-trash-b"></i></button >

                </form>
                </td>
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
