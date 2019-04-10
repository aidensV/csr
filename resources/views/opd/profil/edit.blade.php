<?php $hal = 'admin_users' ?>


@extends('layouts.opd.master')

@section('title', 'Tabel | OPD')

@section('css')
<link href="{{ asset('public/admin/lib/medium-editor/medium-editor.css') }}" rel="stylesheet">
<link href="{{ asset('public/admin/lib/medium-editor/default.css') }}" rel="stylesheet">
<link href="{{ asset('public/admin/lib/summernote/summernote-bs4.css') }}" rel="stylesheet">
<link href="{{ asset('public/admin/lib/select2/css/select2.min.css') }}" rel="stylesheet">
<link href="{{ asset('public/admin/lib/spectrum/spectrum.css') }}" rel="stylesheet">

@endsection

@section('content')
<!-- ##### MAIN PANEL ##### -->

<div class="kt-pagetitle">
  <h5>Edit Akun</h5>
</div><!-- kt-pagetitle -->

<div class="kt-pagebody">

  <div class="card pd-20 pd-sm-40">

    <div class="table-wrapper">
@foreach($pengguna as $data)
      <form class="form-horizontal tasi-form" action="{{ route('admin_users.update',$data->users_id) }}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                {{ method_field('PUT') }}

                @if ($errors->any())
    							<div class="alert alert-danger"><ul>
    							@foreach($errors->all() as $error)
    							<li>{{ $error }}</li>
    							@endforeach
    							</ul></div>
    						@endif


                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Nama Pengguna</label>
                                      <div class="col-sm-10">
                                          <input type="text" value="{{$data->opd_nama}}" class="form-control" name="nama" placeholder="Isikan Nama Pengguna">
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">No. HP</label>
                                      <div class="col-sm-10">
                                          <input type="text" value="{{$data->opd_nohp}}" class="form-control" name="nohp" placeholder="Isikan No. HP Pengguna">
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Alamat</label>
                                      <div class="col-sm-10">
                                          <input type="text" value="{{$data->opd_alamat}}" class="form-control" name="alamat" placeholder="Isikan Alamat Pengguna">
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">Email Baru<span class="tx-danger">*</span></label>
                                      <div class="col-sm-10">
                                          <input type="email" value="{{$data->email}}"  class="form-control" name="email" placeholder="abcde@gmail.com">
                                      </div>
                                  </div>



                                  <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Password Baru<span class="tx-danger">*</span></label>
                                      <div class="col-sm-10">
                                          <input type="password" class="form-control" name="password" placeholder="Isikan Password Baru">
                                      </div>
                                  </div>




                <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label"></label>
                                      <div class="col-sm-10">
                                          <button type="submit" class="btn btn-primary">Update</button>
                                      </div>
                                  </div>

                              </form>
@endforeach
    </div><!-- table-wrapper -->
  </div><!-- card -->






     </div><!-- kt-pagebody -->




@endsection


@section('js')
  <!-- <script src="{{ asset('admin/lib/jquery-ui/jquery-ui.js') }}"></script> -->
  <!-- <script src="{{ asset('public/admin/lib/highlightjs/highlight.pack.js') }}"></script>
  <script src="{{ asset('public/admin/lib/highlightjs/highlight.pack.js') }}"></script>
  <script src="{{ asset('public/admin/lib/datatables/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('public/admin/lib/datatables-responsive/dataTables.responsive.js') }}"></script> -->

<script src="{{ asset('public/admin/lib/highlightjs/highlight.pack.js') }}"></script>
<script src="{{ asset('public/admin/lib/medium-editor/medium-editor.js') }}"></script>
<script src="{{ asset('public/admin/lib/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('public/admin/lib/jquery-ui/jquery-ui.js') }}"></script>
<script src="{{ asset('public/admin/lib/highlightjs/highlight.pack.js') }}"></script>
<script src="{{ asset('public/admin/lib/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('public/admin/lib/spectrum/spectrum.js') }}"></script>


@endsection

@section('script')



<script>
      $(function(){
        'use strict';

        // Inline editor
        var editor = new MediumEditor('.editable');

        // Summernote editor
        $('#summernote').summernote({
          height: 150,
          tooltip: false
        });

        'use strict';

        $('.select2').select2({
          minimumResultsForSearch: Infinity
        });

        // Select2 by showing the search
        $('.select2-show-search').select2({
          minimumResultsForSearch: ''
        });

        // Select2 with tagging support
        $('.select2-tag').select2({
          tags: true,
          tokenSeparators: [',', ' ']
        });


        // Datepicker
        $('.fc-datepicker').datepicker({
          showOtherMonths: true,
          selectOtherMonths: true
        });

      });
    </script>

@endsection
