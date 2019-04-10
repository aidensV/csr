<?php $hal = 'admin_program' ?>


@extends('layouts.admin.master')

@section('title', 'Admin | Data Program')

@section('content')
    <!-- ##### MAIN PANEL ##### -->

    <div class="kt-pagetitle">
      <h5>Data Program</h5>
    </div><!-- kt-pagetitle -->

    <div class="kt-pagebody">

      <div class="card pd-20 pd-sm-40">
        <a href="{{route('admin_program.create')}}" style="margin-bottom:20px; width:100px;" class="card-body-title"><button class="btn btn-primary">Tambah</button></a>

        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
              <tr>
                  <th class="wd-10p">Nomor</th>
                <th class="wd-25p">Nama Program</th>
                <th class="wd-20p">Kategori Bidang</th>
                <th class="wd-15p">Jenis</th>
                <th class="wd-10p">Action</th>
              </tr>
            </thead>
            <tbody>

              <?php $no = 1 ?>
              @foreach($program as $data)

              @php
                $jenis = "";
                if($data->program_jenis=='1'){
                  $jenis = "Prioritas";
                }elseif($data->program_jenis=="2"){
                  $jenis = "Tambahan";
                }
              @endphp

              <tr>
                <td>{{$no}}</td>
                <td>{{$data->program_nama}}</td>
                <td>{{$data->bidang_nama}}</td>
                <td>{{$jenis}}</td>
                <td>

                  <form action="{{ route('admin_program.destroy', $data->program_id) }}" method="post">
											{{csrf_field()}}
											{{ method_field('DELETE') }}
                      <a href="{{route('admin_program.show',$data->program_id)}}"  class="btn btn-primary" data-toggle="tooltip" data-placement="botttom" title="Lihat Detail"><i class="fa fa-eye"></i></a>
                      <a href="{{route('admin_program.edit',$data->program_id)}}"  class="btn btn-success" data-toggle="tooltip" data-placement="botttom" title="Edit Data"><i class="icon ion-edit"></i></a>
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
