<?php $hal = 'Pengajuan Usulan' ?>
@extends('layouts.user.LayoutUser')
@section('title', 'Upload File Pengajuan Usulan')
@section('content')
<!-- <img align="center" src="{{ asset('public/images/pelantikan.jpg') }}" data-animate="fadeInUp" data-delay=".1" style="animation-duration: 0.6s; animation-delay: 0.3s;"> -->
<h1 align="center" data-animate="fadeInUp" data-delay=".2" style="animation-duration: 0.6s; animation-delay: 0.3s;">File Pengajuan Usulan Program CSR</h1>
<br>
{{-- @php

	foreach ($jumlah as $value) {
	$button=$value->jumlah;
}
if ($button > '2') {
echo "<div class='alert alert-danger' role='alert'>Maksimal 3 File</div>";

}else {
echo "";
}
@endphp --}}

<form  action="{{url('simpan-file-pengajuan-usulan')}}" enctype="multipart/form-data" method="post">
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

<input type="hidden" name="pengajuan_id" value="{{$idPengajuan}}">

<div class="form-group">
	<div class="col-sm-12">
		<div class="input-group">
			<?php
			foreach ($jumlah as $value) {
				$button=$value->jumlah;
			}
			if ($button >= '1') {
				?>
				<div class="col-sm-10">
					<button type='submit' class='btn btn-primary'>Tambah</button>
				</div>
				<div class="col-sm-2">

					<a href="{{url('home')}}" class="btn btn-success btn-block" data-toggle="tooltip" data-placement="botttom" >Selesai</a>
				</div>
				<?php	
			}else {
				?>
				<div class="col-sm-10">
					<button type='submit' class='btn btn-primary'>Tambah</button>
				</div>
				<?php
			}
			?>
		</div>

	</div>

</div>

</form>

<div class="row">
	@foreach ($file_pengajuan as $data)
	<div class="col-sm-3" style="margin-bottom: 10px">
		<div class="card pd-20 tx-center">
			<div class="d-flex justify-content-center mg-b-30">
				<img style="height:170px;width:150px;" src="{{asset('/public/admin/img/pdf-ico.png')}}" class="wd-100" alt="">
			</div>
			<p align="center">{{$data->file_pengajuan_nama}}</p>
			<form action="{{url('pengajuan_delete_file')}}" method="post">
				{{csrf_field()}}
				{{ method_field('DELETE') }}
				<div class="row row-sm mg-t-0">
					<input type="hidden" class="form-control" name="file_pengajuan_id" value="{{$data->file_pengajuan_id}}">
					<input type="hidden" class="form-control" name="pengajuan_id" value="{{$idPengajuan}}">
					<div class="col-sm-12" align="center">
						<button class="btn btn-danger" onclick="return confirm('Are you sure?');" data-toggle="tooltip" data-placement="botttom" title="Hapus Data">Hapus</button >
					</div>
				</div>
			</form>
		</div>
	</div>
	@endforeach
</div>

@endsection




