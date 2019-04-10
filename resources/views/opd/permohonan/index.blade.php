<?php $hal = 'opd_permohonan' ?>
<?php $sub = 0 ?>


@extends('layouts.opd.master')

@section('title', 'Tabel | OPD Permohonan')

@section('content')
    <!-- ##### MAIN PANEL ##### -->

    <div class="kt-pagetitle">
      <h5>Data Permohonan</h5>
    </div><!-- kt-pagetitle -->

    <div class="kt-pagebody">

      <div class="card pd-20 pd-sm-40">
        <a href="{{route('opd_permohonan.create')}}" style="margin-bottom:20px; width:100px;" class="card-body-title"><button class="btn btn-primary">Tambah</button></a>

        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
              <tr>
                <th class="wd-15p">Nomor</th>
                <th class="wd-15p">Nama Program</th>
                <th class="wd-20p">Nama OPD</th>
                <th class="wd-25p">Permohonan</th>
                <th class="wd-25p">Status</th>
                <th class="wd-25p">Action</th>
              </tr>
            </thead>
            <tbody>

              <?php $no = 1 ?>
              @foreach($opd_permohonan as $data)
              <tr>
                <td>{{$no}}</td>
                <td>{{$data->program_nama}}</td>
                <td>{{$data->opd_nama}}</td>
                <td>{{$data->permohonan_nama}}</td>
                <td>{{$status}}</td>
                <td>

                  <form action="{{route('opd_permohonan.destroy',$data->permohonan_id)}}" method="post">
											{{csrf_field()}}
											{{ method_field('DELETE') }}
                      <a href="{{route('opd_permohonan.edit',$data->permohonan_id)}}" class="btn btn-warning" data-toggle="tooltip" data-placement="botttom" title="Edit Data"><i class="icon ion-edit"></i></a>
                      <a href="{{route('opd_permohonan.show',$data->permohonan_id)}}" class="btn btn-success" data-toggle="tooltip" data-placement="botttom" title="Lihat Data"><i class="icon ion-eye"></i></a>
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
