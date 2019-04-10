<?php $hal = 'admin_slideshow' ?>
@extends('layouts.admin.master')

@section('title', 'Unggah Slideshow | Admin')

@section('css')
    <style type="text/css">
        .pagination {
            display: inline-block;
            padding-left: 0;
            margin: 20px 0;
            border-radius: 4px
        }

        .pager li,
        .pagination > li {
            display: inline
        }

        .pagination > li > a,
        .pagination > li > span {
            position: relative;
            float: left;
            padding: 6px 12px;
            margin-left: -1px;
            line-height: 1.42857143;
            color: #337ab7;
            text-decoration: none;
            background-color: #fff;
            border: 1px solid #ddd
        }

        .pagination > li:first-child > a,
        .pagination > li:first-child > span {
            margin-left: 0;
            border-top-left-radius: 4px;
            border-bottom-left-radius: 4px
        }

        .pagination > li:last-child > a,
        .pagination > li:last-child > span {
            border-top-right-radius: 4px;
            border-bottom-right-radius: 4px
        }

        .pagination > li > a:focus,
        .pagination > li > a:hover,
        .pagination > li > span:focus,
        .pagination > li > span:hover {
            z-index: 2;
            color: #23527c;
            background-color: #eee;
            border-color: #ddd
        }

        .pagination > .active > a,
        .pagination > .active > a:focus,
        .pagination > .active > a:hover,
        .pagination > .active > span,
        .pagination > .active > span:focus,
        .pagination > .active > span:hover {
            z-index: 3;
            color: #fff;
            cursor: default;
            background-color: #337ab7;
            border-color: #337ab7
        }

        .pagination > .disabled > a,
        .pagination > .disabled > a:focus,
        .pagination > .disabled > a:hover,
        .pagination > .disabled > span,
        .pagination > .disabled > span:focus,
        .pagination > .disabled > span:hover {
            color: #777;
            cursor: not-allowed;
            background-color: #fff;
            border-color: #ddd
        }

        .pagination-lg > li > a,
        .pagination-lg > li > span {
            padding: 10px 16px;
            font-size: 18px;
            line-height: 1.3333333
        }

        .pagination-lg > li:first-child > a,
        .pagination-lg > li:first-child > span {
            border-top-left-radius: 6px;
            border-bottom-left-radius: 6px
        }

        .pagination-lg > li:last-child > a,
        .pagination-lg > li:last-child > span {
            border-top-right-radius: 6px;
            border-bottom-right-radius: 6px
        }

        .pagination-sm > li > a,
        .pagination-sm > li > span {
            padding: 5px 10px;
            font-size: 12px;
            line-height: 1.5
        }

        .pagination-sm > li:first-child > a,
        .pagination-sm > li:first-child > span {
            border-top-left-radius: 3px;
            border-bottom-left-radius: 3px
        }

        .pagination-sm > li:last-child > a,
        .pagination-sm > li:last-child > span {
            border-top-right-radius: 3px;
            border-bottom-right-radius: 3px
        }

        .pager {
            padding-left: 0;
            margin: 20px 0;
            text-align: center;
            list-style: none
        }

        .pager li > a,
        .pager li > span {
            display: inline-block;
            padding: 5px 14px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 15px
        }

        .pager li > a:focus,
        .pager li > a:hover {
            text-decoration: none;
            background-color: #eee
        }

        .pager .next > a,
        .pager .next > span {
            float: right
        }

        .pager .previous > a,
        .pager .previous > span {
            float: left
        }

        .pager .disabled > a,
        .pager .disabled > a:focus,
        .pager .disabled > a:hover,
        .pager .disabled > span {
            color: #777;
            cursor: not-allowed;
            background-color: #fff
        }
    </style>
@endsection

@section('content')
    <!-- ##### MAIN PANEL ##### -->

    <div class="kt-pagetitle">
        <h5>Unggah Gambar Slideshow</h5>
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

        <form action="{{route('admin_slideshow.store')}}" enctype="multipart/form-data" method="post">
            {{ csrf_field() }} {{ method_field('POST') }}

            <div class="form-group">
                {{-- @php

              foreach ($jumlah as $value) {
              $button=$value->jumlah;
            }
            if ($button > '2') {

          }else {
            @endphp --}}
                <label class="col-sm-2 col-sm-2 control-label">Tambah Slideshow</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <input type="file" class="form-control" name="file_slideshow">
                    </div>
                </div>

            </div>

            {{-- <input type="hidden" name="permohonan_id" value="{{$idPermohonan}}"> --}}

            <div class="form-group">
                <div class="col-sm-12">
                    <div class="input-group">
                        @if ($jumlah >= "4")
                            <div class="col-sm-10">
                                <div class='alert alert-danger' role='alert'>Maksimal 4 Gambar</div>
                                ;
                            </div>
                        @else
                            <div class="col-sm-10">
                                <button type='submit' class='btn btn-primary'>Tambah</button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </form>

        <div class="card pd-20 pd-sm-40">


            <div class="row row-sm mg-t-0">
                @foreach ($slideshow as $data)
                    <div class="col-sm-3">
                        <div class="card pd-20 tx-center">
                            <div class="d-flex justify-content-center mg-b-30">
                                <img style="height:200px;width:150px;"
                                     src="{{asset('/public/images/tumb/tumb-'.$data->slideshow_gambar)}}" class="wd-100"
                                     alt="">

                            </div>
                            {{-- <p>{{$data->file_permohonan_nama}}</p> --}}
                            <form action="{{route('admin_slideshow.destroy',$data->slideshow_id)}}" method="post">
                                {{csrf_field()}}
                                {{ method_field('DELETE') }}
                                <div class="row row-sm mg-t-0">
                                    {{-- <input type="hidden" name="file_id" value="{{$data->file_permohonan_id}}"> --}}
                                    {{-- <input type="hidden" name="permohonan_id" value="{{$idPermohonan}}"> --}}
                                    <div class="col-sm-12">
                                        <button class="btn btn-danger btn-block"
                                                onclick="return confirm('Are you sure?');" data-toggle="tooltip"
                                                data-placement="botttom" title="Hapus Data">Hapus
                                        </button>
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
        $(function () {
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
