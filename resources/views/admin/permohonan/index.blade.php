<?php $hal = 'admin_permohonan' ?>

@extends('layouts.admin.master')

@section('title', 'Admin | Permohonan CSR')

@section('content')
    <!-- ##### MAIN PANEL ##### -->

    <div class="kt-pagetitle">
      <h5>Daftar Permohonan CSR oleh OPD</h5>
    </div><!-- kt-pagetitle -->


    <div class="kt-pagebody">

      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Keterangan Status Permohonan CSR</h6>
        <p><span class='square-8 bg-warning mg-r-5 rounded-square'></span> Permohonan | <span class='square-8 bg-success mg-r-5 rounded-square'></span> Disetujui
          | <span class='square-8 bg-danger mg-r-5 rounded-square'></span> Ditolak | <span class='square-8 bg-primary mg-r-5 rounded-square'></span> Tindak lanjut
      </div>
      <br>

      <div class="card pd-20 pd-sm-40">

        <table border="0" style="margin-bottom:10px;">
          <tr>
            <td>
              <a  target="_blank" href="{{url('admin_permohonan_pdf')}}" class="btn btn-danger"><i class="fa fa-print"></i> Cetak PDF</a>
            </td>
            <td>
              <a  target="_blank" href="{{url('admin_permohonan_excel')}}" class="btn btn-success"><i class="fa fa-print"></i> Cetak Excel</a>
            </td>
          </tr>
        </table>

        <!-- <a onclick="addForm()"  style="margin-bottom:20px;width:100px;" class="card-body-title"><button class="btn btn-primary">Tambah</button></a> -->


        <div class="table-wrapper">
          <table id="datatable1"  class="table display responsive nowrap">
            <thead>
              <tr>
                <th class="wd-5p">No</th>
                <th class="wd-10p">Tg. Permohonan</th>
                <th class="wd-25p">OPd</th>
                <th class="wd-25p">Bidang</th>
                <th class="wd-25p">Program Kegiatan</th>
                <!-- <th class="wd-25p">Keterangan</th> -->
                <th class="wd-15p">Tindak Lanjut</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div><!-- table-wrapper -->
      </div><!-- card -->

@include('admin.permohonan.form')

@endsection


@section('js')
  <!-- <script src="{{ asset('admin/lib/jquery-ui/jquery-ui.js') }}"></script> -->
  <script src="{{ asset('public/admin/lib/highlightjs/highlight.pack.js') }}"></script>
  <script src="{{ asset('public/admin/lib/highlightjs/highlight.pack.js') }}"></script>
  <script src="{{ asset('public/admin/lib/datatables/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('public/admin/lib/datatables-responsive/dataTables.responsive.js') }}"></script>

@endsection

@section('script')

<script type="text/javascript">
	var table, save_method;
	$(function(){
		table = $('.table').DataTable({
			"processing" : true,
			"ajax" : {
				"url" : "{{ route('data_admin_permohonan') }}",
				"type" : "GET"
			}
		});

		$('#modal-form form').validator().on('submit', function(e){
      if(!e.isDefaultPrevented()){
         var id = $('#id').val();
         if(save_method == "add") url = "{{ route('admin_permohonan.store') }}";
         else url = "admin_permohonan/"+id;

         $.ajax({
           url : url,
           type : "POST",
           data : $('#modal-form form').serialize(),
           success : function(data){
             $('#modal-form').modal('hide');
             table.ajax.reload();
           },
           error : function(){
             alert("Tidak dapat menyimpan data!");
           }
         });
         return false;
     }
   });


	});

	function addForm(){
		save_method = "add";
		$('input[name=_method]').val('POST');
		$('#modal-form').modal('show');
		$('#modal-form form')[0].reset();
		$('.modal-title').text('Tambah Daftar Perusahaan');
	}

	function editForm(id){
		save_method = "edit";
		$('input[name=_method]').val('PATCH');
		$('#modal-form form')[0].reset();
		$.ajax({
			url : "admin_permohonan/"+id+"/edit",
			type : "GET",
			dataType : "JSON",
			success : function(data){
				$('#modal-form').modal('show');
				$('.modal-title').text('Apakah anda yakin ?');

				$('#id').val(data.permohonan_id);
			},
			error : function(){
				alert("Tidak dapat menampilkan data !!!");
			}
		});
	}


  function deleteData(id){
   if(confirm("Apakah yakin permohonan ditolak?")){
     $.ajax({
       url : "admin_permohonan/"+id,
       type : "POST",
       data : {'_method' : 'DELETE', '_token' : $('meta[name=csrf-token]').attr('content')},
       success : function(data){
         table.ajax.reload();
       },
       error : function(){
         alert("Tidak dapat menghapus data!");
       }
     });
   }
}

</script>

<script>
 //   $(function(){
 //     'use strict';
 //
 //     $('#datatable1').DataTable({
 //       responsive: true,
 //       language: {
 //         searchPlaceholder: 'Search...',
 //         sSearch: '',
 //         lengthMenu: '_MENU_ items/page',
 //       }
 //     });
 //
 //     $('#datatable2').DataTable({
 //       bLengthChange: false,
 //       searching: false,
 //       responsive: true
 //     });
 //
 //     Select2
 //     $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });
 //
 //   });
 // </script>

@endsection
