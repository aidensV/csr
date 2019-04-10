<?php $hal = 'Perusahaan' ?>
@extends('layouts.user.LayoutUser')
@section('title', 'Perusahaan')
@section('content')
<h1 data-animate="fadeInUp" data-delay=".1" style="animation-duration: 0.6s; animation-delay: 0.3s;">Data Perusahaan</h1>
<div class="row">
	<div class="col-md-9">
		<form action="{{ url('companies-search') }}" class="form-inline" method="post" style="margin-bottom:10px;">
			{{csrf_field()}}
			<h3 style="padding-top: 7px">Tahun </h3>
			<select name="tahun" class="form-control animated fadeInUp" required="" data-animate="fadeInUp" data-delay=".2" style="animation-duration: 0.6s; animation-delay: 0.3s;">
				<?php
				$mulai= date('Y') - 5;
				for($i = $mulai;$i<$mulai + 11;$i++){
					$sel = $i == date('Y') ? ' selected="selected"' : '';
					echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
				}
				?>
			</select>
			<h3 style="margin-left: 10px; padding-top: 7px">Kecamatan </h3>
			<select name="kecamatan" class="form-control animated fadeInUp" required="" data-animate="fadeInUp" data-delay=".2" style="animation-duration: 0.6s; animation-delay: 0.3s;">
				<option>Kecamatan Kota</option>
				<option>Mojoroto</option>
				<option>Pesantren</option>
			</select>
			<button type="submit" class="btn-primary" style="margin-left: 10px"><i class="fa fa-search"></i></button>
			<!-- <input type="text" name="search" placeholder="Search" class="form-control animated fadeInUp" required="" data-animate="fadeInUp" data-delay=".3" style="animation-duration: 0.6s; animation-delay: 0.3s;"> -->
		</form>

		<div class="table-wrapper">
			<table id="example" class="table table-striped table-bordered" style="width:100%">
				<thead>
					<tr>
						<th class="wd-15p">Nomor</th>
						<th class="wd-15p">Nama Perusahaan</th>
						<th class="wd-15p">Alamat</th>
						<th class="wd-20p">Kelurahan</th>
						<th class="wd-25p">Kecamatan</th>
						<th class="wd-25p">Tahun</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1 ?>
					@foreach($companies as $data)
					<tr>
						<td>{{$no}}</td>
						<td>{{$data->daftar_perusahaan_nama}}</td>
						<td>{{$data->daftar_perusahaan_alamat}}</td>
						<td>{{$data->daftar_perusahaan_kelurahan}}</td>
						<td>{{$data->daftar_perusahaan_kecamatan}}</td>
						<td>{{ substr($data->daftar_perusahaan_tahun, 0, 4) }}</td>
					</tr>
					<?php $no++ ?>
					@endforeach
				</tbody>
			</table>
		</div><!-- table-wrapper -->
	</div>
	<div class="col-md-3" data-animate="fadeInUp" data-delay=".5" style="animation-duration: 0.6s; animation-delay: 0.3s;">
		<h3>Tentang Perusahaan</h3>
		<p align="justify">
			Daftar Perusahaan merupakan list data perusahaan di Kota Kediri yang wajib melaksanakan program - program Tanggung Jawab Sosial Lingkungan di Kota Kediri
		</p>
	</div>
</div>
@endsection
@section('js')
<script src="{{ asset('public/assets/datatable/jquery.dataTables.js') }}"></script>
<script src="{{ asset('public/assets/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script>
	$(document).ready(function() {
		// $('#example').DataTable();

		$('#example').dataTable({
			"bPaginate": true,
			"bLengthChange": false,//show entries
			"bFilter": false,//search
			"bInfo": false,
			"bAutoWidth": false });
	} );

</script>
@endsection
