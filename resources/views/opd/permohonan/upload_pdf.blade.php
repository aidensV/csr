<?php $hal = 'opd_permohonan' ?>
@extends('layouts.opd.master')

@section('title', 'Unggah Dokumen | OPD')

@section('css')
<style type="text/css">
.pagination{display:inline-block;padding-left:0;margin:20px 0;border-radius:4px}.pager li,.pagination>li{display:inline}.pagination>li>a,.pagination>li>span{position:relative;float:left;padding:6px 12px;margin-left:-1px;line-height:1.42857143;color:#337ab7;text-decoration:none;background-color:#fff;border:1px solid #ddd}.pagination>li:first-child>a,.pagination>li:first-child>span{margin-left:0;border-top-left-radius:4px;border-bottom-left-radius:4px}.pagination>li:last-child>a,.pagination>li:last-child>span{border-top-right-radius:4px;border-bottom-right-radius:4px}.pagination>li>a:focus,.pagination>li>a:hover,.pagination>li>span:focus,.pagination>li>span:hover{z-index:2;color:#23527c;background-color:#eee;border-color:#ddd}.pagination>.active>a,.pagination>.active>a:focus,.pagination>.active>a:hover,.pagination>.active>span,.pagination>.active>span:focus,.pagination>.active>span:hover{z-index:3;color:#fff;cursor:default;background-color:#337ab7;border-color:#337ab7}.pagination>.disabled>a,.pagination>.disabled>a:focus,.pagination>.disabled>a:hover,.pagination>.disabled>span,.pagination>.disabled>span:focus,.pagination>.disabled>span:hover{color:#777;cursor:not-allowed;background-color:#fff;border-color:#ddd}.pagination-lg>li>a,.pagination-lg>li>span{padding:10px 16px;font-size:18px;line-height:1.3333333}.pagination-lg>li:first-child>a,.pagination-lg>li:first-child>span{border-top-left-radius:6px;border-bottom-left-radius:6px}.pagination-lg>li:last-child>a,.pagination-lg>li:last-child>span{border-top-right-radius:6px;border-bottom-right-radius:6px}.pagination-sm>li>a,.pagination-sm>li>span{padding:5px 10px;font-size:12px;line-height:1.5}.pagination-sm>li:first-child>a,.pagination-sm>li:first-child>span{border-top-left-radius:3px;border-bottom-left-radius:3px}.pagination-sm>li:last-child>a,.pagination-sm>li:last-child>span{border-top-right-radius:3px;border-bottom-right-radius:3px}.pager{padding-left:0;margin:20px 0;text-align:center;list-style:none}.pager li>a,.pager li>span{display:inline-block;padding:5px 14px;background-color:#fff;border:1px solid #ddd;border-radius:15px}.pager li>a:focus,.pager li>a:hover{text-decoration:none;background-color:#eee}.pager .next>a,.pager .next>span{float:right}.pager .previous>a,.pager .previous>span{float:left}.pager .disabled>a,.pager .disabled>a:focus,.pager .disabled>a:hover,.pager .disabled>span{color:#777;cursor:not-allowed;background-color:#fff}
</style>
@endsection

@section('content')
<!-- ##### MAIN PANEL ##### -->

<div class="kt-pagetitle">
  <h5>Unggah Dokumen Kelengkapan</h5>
</div><!-- kt-pagetitle -->

<div class="kt-pagebody">
  {{-- @php

  foreach ($jumlah as $value) {
  $button=$value->jumlah;
}
if ($button > '2') {
echo "<div class='alert alert-danger' role='alert'>Maksimal 3 Gambar</div>";

}else {
echo "";
}
@endphp --}}

<form  action="{{route('permohonan_store_file')}}" enctype="multipart/form-data" method="post">
  {{ csrf_field() }} {{ method_field('POST') }}

  <div class="form-group">
    {{-- @php

    foreach ($jumlah as $value) {
    $button=$value->jumlah;
  }
  if ($button > '2') {

}else {
  @endphp --}}
  <label class="col-sm-2 col-sm-2 control-label">Tambah File</label>
  <div class="col-sm-10">
    <div class="input-group">
      <input type="file" class="form-control" name="file_dokumen" >
    </div>
  </div>

</div>

<input type="hidden" name="permohonan_id" value="{{$idPermohonan}}">

<div class="form-group">
  <div class="col-sm-12">
    <div class="input-group">
      @php
      foreach ($jumlah as $value) {
      $button=$value->jumlah;
    }
    if ($button >= '1') {
    @endphp
    <div class="col-sm-10">
     <button type='submit' class='btn btn-primary'>Tambah</button>
   </div>
    <div class="col-sm-2">

     <a href="{{url('opd_permohonan')}}" class="btn btn-success btn-block" data-toggle="tooltip" data-placement="botttom" >Selesai</a>
   </div>

   @php
 }else {
 @endphp
 <div class="col-sm-10">
  <button type='submit' class='btn btn-primary'>Tambah</button>
</div>


@php
}
@endphp


</div>

</div>

</div>

<div class="card pd-20 pd-sm-40">
</form>

<div class="row row-sm mg-t-0">
  @foreach ($file_permohonan as $data)
  <div class="col-sm-3">
    <div class="card pd-20 tx-center">
      <div class="d-flex justify-content-center mg-b-30">
        <img style="height:170px;width:150px;" src="{{asset('/public/admin/img/pdf-ico.png')}}" class="wd-100" alt="">

      </div>
      <p>{{$data->file_permohonan_nama}}</p>
      <form action="{{route('permohonan_delete_file')}}" method="post">
        {{csrf_field()}}
        {{ method_field('DELETE') }}
        <div class="row row-sm mg-t-0">
          <input type="hidden" name="file_id" value="{{$data->file_permohonan_id}}">
          <input type="hidden" name="permohonan_id" value="{{$idPermohonan}}">
          <div class="col-sm-12">
            <button class="btn btn-danger btn-block" onclick="return confirm('Are you sure?');" data-toggle="tooltip" data-placement="botttom" title="Hapus Data">Hapus</button >
          </div>
        </div>
      </form>



    </div><!-- card -->
  </div><!-- col-6 -->

  @endforeach


</div>

<br>



          <!-- <nav aria-label="Page navigation">
              <ul class="pagination pagination-basic mg-b-0">
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <i class="fa fa-angle-right"></i>
                  </a>
                </li>
              </ul>
            </nav> -->



            <div class="container">

            </div>



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
