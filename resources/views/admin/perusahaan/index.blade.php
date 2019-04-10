<?php $hal = 'admin_perusahaan' ?>
<?php $sub = 0 ?>




@extends('layouts.admin.master')

@section('title', 'Admin | Perusahaan Partisipasi')

@section('content')
    <!-- ##### MAIN PANEL ##### -->

    <div class="kt-pagetitle">
      <h5>Daftar Perusahaan</h5>
    </div><!-- kt-pagetitle -->


    <div class="kt-pagebody">

      <div class="card pd-20 pd-sm-40">
        <!-- <a onclick="addForm()"  style="margin-bottom:20px;width:100px;" class="card-body-title"><button class="btn btn-primary">Tambah</button></a> -->


        <div class="table-wrapper">
          <table id="datatable1"  class="table display responsive nowrap">
            <thead>
              <tr>
                <th class="wd-10p">No</th>
                <th class="wd-25p">Nama Perusahaan</th>
                <th class="wd-25p">Alamat</th>
                <th class="wd-25p">Status</th>
                <th class="wd-25p">Aktifasi</th>
                <th class="wd-15p">Action</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div><!-- table-wrapper -->
      </div><!-- card -->

@include('admin.perusahaan.form')

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
				"url" : "{{ route('data_admin_perusahaan') }}",
				"type" : "GET"
			}
		});

		$('#modal-form form').validator().on('submit', function(e){
      if(!e.isDefaultPrevented()){
         var id = $('#id').val();
         if(save_method == "add") url = "{{ route('admin_perusahaan.store') }}";
         else url = "admin_perusahaan/"+id;

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
			url : "admin_perusahaan/"+id+"/edit",
			type : "GET",
			dataType : "JSON",
			success : function(data){
				$('#modal-form').modal('show');
				$('.modal-title').text('Apakah anda yakin ?');

				$('#id').val(data.perusahaan_id);
			},
			error : function(){
				alert("Tidak dapat menampilkan data !!!");
			}
		});
	}


  function deleteData(id){
   if(confirm("Apakah yakin data akan dihapus?")){
     $.ajax({
       url : "admin_perusahaan/"+id,
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
