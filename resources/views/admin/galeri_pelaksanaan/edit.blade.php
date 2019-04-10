<?php $hal = 'admin_galeri' ?>
@extends('layouts.admin.master')

@section('title', 'Unggah Galeri | Admin')

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
        <h5>Unggah Gambar Galeri</h5>
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





        <div class="card pd-20 pd-sm-40">
            <form action="{{route('admin_galeri.update',$galeri2->galeri_pelaksanaan_id)}}" enctype="multipart/form-data" method="post">
                {{ csrf_field() }} {{ method_field('PUT') }}

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Pengajuan</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <select class="form-control" name="pengajuan_id">
                                @if ($galeri->pengajuan_id == !null)
                                    <option value="{{$galeri->pengajuan_id}}" selected>{{$galeri->pengajuan_nama}}</option>

                                @foreach ($pengajuan as $data)
                                    <option value="{{$data->pengajuan_id}}">{{$data->pengajuan_nama}}</option>
                                @endforeach
                                @endif

                            </select>
                        </div>
                    </div>

                </div>
                <h6>Unggah Gambar</h6>
            <div class="row row-sm mg-t-0">
                    <div class="col-sm-4">
                        <div class="card pd-20 tx-center">
                            <div class="input-group">
                                <input id="reset1"    type="file" class="form-control" onchange="readURL(this);" name="galeri1">
                            </div>
                            <div class="d-flex justify-content-center mg-b-30">
                                @if ($galeri2->galeri_pelaksanaan_gb1 == !null)
                                    <input type="hidden" name="vlimage1" id="vlimage1" value="0"/>
                                    <img style="height:250px;width:200px;" id="gbr1" src="{{asset('/public/images/tumb/tumb-'.$galeri2->galeri_pelaksanaan_gb1)}}" class="wd-100" alt="">

                                @else
                                    <img style="height:250px;width:200px;" id="gbr1" src="{{asset('/public/images/tumb/tumb-')}}" class="wd-100" alt="">

                                @endif
                            </div>
                            {{-- <p>{{$data->file_permohonan_nama}}</p> --}}
                            <button class="btn btn-danger" type="button" id="btn-delete1">Hapus</button>
                        </div><!-- card -->
                    </div><!-- col-6 -->
                <div class="col-sm-4">
                        <div class="card pd-20 tx-center">
                            <div class="input-group">
                                <input id="reset2" type="file" class="form-control" onchange="readURL2(this);" name="galeri2">
                            </div>
                            <div class="d-flex justify-content-center mg-b-30">
                                @if ($galeri2->galeri_pelaksanaan_gb2 == !null)
                                <img style="height:250px;width:200px;" id="gbr2" src="{{asset('/public/images/tumb/tumb-'.$galeri2->galeri_pelaksanaan_gb2)}}" class="wd-100" alt="">
                                    <input type="hidden" name="vlimage2" id="vlimage2" value="0"/>

                                @else
                                    <img style="height:250px;width:200px;" id="gbr2" src="{{asset('/public/images/tumb/tumb-')}}" class="wd-100" alt="">
                                @endif

                            </div>
                            {{-- <p>{{$data->file_permohonan_nama}}</p> --}}
                            <button class="btn btn-danger" type="button" id="btn-delete2">Hapus</button>
                        </div><!-- card -->
                    </div><!-- col-6 -->

                <div class="col-sm-4" >
                        <div class="card pd-20 tx-center">
                            <div class="input-group">
                                <input id="reset3" type="file" class="form-control" onchange="readURL3(this);" name="galeri3">
                            </div>
                            <div class="d-flex justify-content-center mg-b-30">
                                @if ($galeri2->galeri_pelaksanaan_gb3 == !null)
                                    <input type="hidden" name="vlimage3" id="vlimage3" value="0"/>
                                    <img style="height:250px;width:200px;" id="gbr3" src="{{asset('/public/images/tumb/tumb-'.$galeri2->galeri_pelaksanaan_gb3)}}" class="wd-100" alt="">
                                @else
                                    <img style="height:250px;width:200px;" id="gbr3" src="{{asset('/public/images/tumb/tumb-')}}" class="wd-100" alt="">
                                @endif
                            </div>
                            {{-- <p>{{$data->file_permohonan_nama}}</p> --}}
                           <button class="btn btn-danger" type="button" id="btn-delete3">Hapus</button>
                        </div><!-- card -->
                    </div><!-- col-6 -->


            </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <button type="submit" class="btn btn-primary">SIMPAN</button>
                        </div>
                    </div>

                </div>

        </form>
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
        $(document).ready(function() {
            $('#btn-delete3').on('click', function(e) {
                var $el = $('#reset3');
                $el.wrap('<form>').closest('form').get(0).reset();
                $el.unwrap();
                var $el2 = $('#gbr3');
                $el2.attr("src","");
                var $el3 = $('#vlimage3');
                $el3.attr("value","1");

            });
            $('#btn-delete2').on('click', function(e) {
                var $el = $('#reset2');
                $el.wrap('<form>').closest('form').get(0).reset();
                $el.unwrap();
                var $el2 = $('#gbr2');
                $el2.attr("src","");
                var $el3 = $('#vlimage2');
                $el3.attr("value","1");

            });
            $('#btn-delete1').on('click', function(e) {
                var $el = $('#reset1');
                $el.wrap('<form>').closest('form').get(0).reset();
                $el.unwrap();
                var $el2 = $('#gbr1');
                $el2.attr("src","");
                var $el3 = $('#vlimage1');
                $el3.attr("value","1");

            });
        });

       function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#gbr1')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        };
       function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#gbr2')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        };
       function readURL3(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#gbr3')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        };

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
