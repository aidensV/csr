<?php $hal = 'admin_berita' ?>


@extends('layouts.admin.master')

@section('title', 'Tabel | Admin')

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
        <h5>Form Tambah Berita</h5>
    </div><!-- kt-pagetitle -->

    <div class="kt-pagebody">

        <div class="card pd-20 pd-sm-40">

            <div class="table-wrapper">
                <form class="form-horizontal tasi-form" action="{{ route('admin_berita.update',$berita->berita_id) }}" method="post"
                      enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('PUT')}}

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Judul<span class="tx-danger">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="berita_judul"
                                   value="{{$berita->berita_judul}}" placeholder="Isikan Judul Berita">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Isi Berita<span
                                    class="tx-danger">*</span></label>
                        <div class="col-sm-10">
                            <textarea name="berita_isi" id="summernote">{{$berita->berita_isi}}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Gambar Berita<span
                                    class="tx-danger">*</span></label>
                        <div class="col-sm-10" id="change-div">
                            <img style="height:50%;width:50%;"
                                 src="{{asset('/public/images/tumb/tumb-'.$berita->berita_gambar)}}" class="wd-100"
                                 alt="">
                        </div>
                        <button type="button" style="position: center;margin-left: 150px;margin-top : 5px"
                                class="btn btn-danger remove-button" id="btn-delete-div">Hapus Gambar
                        </button>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label"></label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary"> <i class="fa fa-floppy-o"></i> Ubah</button>
                        </div>
                    </div>

                </form>
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
        $("#btn-delete-div").click(function () {
            $("#change-div").html(" <div class=\"col-sm-10\">\n" +
                "                                <input type=\"file\" class=\"form-control\" name=\"berita_gambar\">\n" +
                "                            </div>");
            $('.remove-button').remove();
        });
        $('#summernote').summernote({
            height: 150
        }),
            $(function () {
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
