<?php $hal = 'admin_berita' ?>
<?php $sub = 0 ?>


@extends('layouts.admin.master')

@section('title', 'Tabel | Admin Berita')

@section('content')
<!-- ##### MAIN PANEL ##### -->

<div class="kt-pagetitle">
  <h5>Data Berita</h5>
</div><!-- kt-pagetitle -->

<div class="kt-pagebody">

  <div class="card pd-20 pd-sm-40">

    <table border="0" style="margin-bottom:10px;">
      <tr>
        <td>
          <a href="{{route('admin_berita.create')}}" style=" width:100px;" class="card-body-title"><button class="btn btn-primary">Tambah</button></a>
        </td>
      </tr>
    </table>


    <div class="table-wrapper">
      <table id="datatable1" class="table display responsive nowrap">
        <thead>
          <tr>
            <th class="wd-10p">No.</th>
            <th class="wd-15p">Tanggal Berita</th>
            <th class="wd-15p">Judul Berita</th>
            <th class="wd-25p">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($berita as $data)
          <tr>
            <td>{{$no++}}</td>
            <td>{{$data->berita_tanggal}}</td>
            <td>{{$data->berita_judul}}</td>

            <td>
              <form action="{{ route('admin_berita.destroy', $data->berita_id) }}" method="post">
                {{csrf_field()}}
                {{ method_field('DELETE') }}
                <a class="btn btn-success" href="{{route('admin_berita.show',$data->berita_id)}}"><i class="icon ion-eye"></i></a>
                <a class="btn btn-primary" href="{{route('admin_berita.edit',$data->berita_id)}}"><i class="icon ion-edit"></i></a>

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
