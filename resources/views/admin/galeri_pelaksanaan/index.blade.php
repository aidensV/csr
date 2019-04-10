<?php $hal = 'admin_galeri' ?>
<?php $sub = 0 ?>


@extends('layouts.admin.master')

@section('title', 'Tabel | Galeri Pengajuan')

@section('content')
<!-- ##### MAIN PANEL ##### -->

<div class="kt-pagetitle">
  <h5>Galeri Pengajuan</h5>
</div><!-- kt-pagetitle -->

<div class="kt-pagebody">

  <div class="card pd-20 pd-sm-40">

    <table border="0" style="margin-bottom:10px;">
      <tr>
        <td>
          <a href="{{route('admin_galeri.create')}}" style=" width:100px;" class="card-body-title"><button class="btn btn-primary">Tambah</button></a>
        </td>
      </tr>
    </table>


    <div class="table-wrapper">
      <table id="datatable1" class="table display responsive nowrap">
        <thead>
          <tr>
            <th class="wd-10p">No.</th>
            <th class="wd-15p">Pengajuan</th>
            <th class="wd-15p">Program</th>
            <th class="wd-25p">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($galeri as $data)
          <tr>
            <td>{{$no++}}</td>
            <td>{{$data->pengajuan_nama}}</td>
            <td>{{$data->program_nama}}</td>

            <td>
              <form action="{{ route('admin_galeri.destroy', $data->galeri_pelaksanaan_id) }}" method="post">
                {{csrf_field()}}
                {{ method_field('DELETE') }}
                <a class="btn btn-warning" href="{{route('admin_galeri.edit',$data->galeri_pelaksanaan_id)}}"><i class="icon ion-edit"></i></a>
                <a class="btn btn-success" href="{{route('admin_galeri.show',$data->galeri_pelaksanaan_id)}}"><i class="icon ion-eye"></i></a>

                <button class="btn btn-danger" onclick="return confirm('Are you sure?');" data-toggle="tooltip" data-placement="botttom" title="Hapus Data"><i class="icon ion-trash-b"></i></button>

              </form>
            </td>
          </tr>

          @endforeach


        </tbody>
      </table>
    </div><!-- table-wrapper -->
  </div><!-- card -->
</div>



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
    $(function() {
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
      $('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity
      });

    });
  </script>

  @endsection
