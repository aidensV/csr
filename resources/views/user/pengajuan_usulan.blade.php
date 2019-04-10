<?php $hal = 'Pengajuan Usulan' ?>
@extends('layouts.user.LayoutUser')
@section('title', 'Pengajuan Usulan')
@section('content')
<!-- <img align="center" src="{{ asset('public/images/pelantikan.jpg') }}" data-animate="fadeInUp" data-delay=".1" style="animation-duration: 0.6s; animation-delay: 0.3s;"> -->
<!-- <h1 align="center" data-animate="fadeInUp" data-delay=".2" style="animation-duration: 0.6s; animation-delay: 0.3s;">Pengajuan Usulan Program CSR</h1> -->
<br>
<div class="col-md-12">
	<div class="contact-form-wrap">
		<div class="text-center">
			<h2 data-animate="fadeInUp" data-delay=".1" class="animated fadeInUp" style="animation-duration: 0.6s; animation-delay: 0.1s;">Form Pengajuan Usulan Program CSR</h2>
			<p data-animate="fadeInUp" data-delay=".2" class="animated fadeInUp" style="animation-duration: 0.6s; animation-delay: 0.2s;">Fill up the form. Your e-mail will not be published. Required fields are marked by <span class="text-danger font-weight-bold">*</span></p>
		</div>
		<form class="contact-form" action="{{ url('/simpan-pengajuan-usulan') }}" method="post" novalidate="">
			{{ csrf_field() }}
			<div class="position-relative animated fadeInUp" data-animate="fadeInUp" data-delay=".3" style="animation-duration: 0.6s; animation-delay: 0.3s;">

				<input type="hidden" name="perusahaan_id" value="{{ Session::get('perusahaan_id') }}" placeholder="ID Perusahaan*" class="form-control" required="">
				<!-- <select class="form-control" name="perusahaan_id" required="">
					@foreach($perusahaan as $dt)
					<option value="{{ $dt->perusahaan_id }}">{{ $dt->perusahaan_nama}}</option>
					@endforeach
				</select> -->
			</div>
			<div class="position-relative animated fadeInUp" data-animate="fadeInUp" data-delay=".4" style="animation-duration: 0.6s; animation-delay: 0.4s;">
				<label>Nama Program CSR</label>
				<select class="form-control" name="program_id" required="">
					@foreach($program as $dt)
					<option value="{{ $dt->program_id }}">{{ $dt->program_nama}}</option>
					@endforeach
				</select>
			</div>
			<div class="position-relative animated fadeInUp" data-animate="fadeInUp" data-delay=".5" style="animation-duration: 0.6s; animation-delay: 0.5s;">
				<label>Keterangan Pengajuan</label>
				<input type="text" name="pengajuan_nama" placeholder="Keterangan Pengajuan*" class="form-control" required="">
			</div>
			<div class="position-relative animated fadeInUp" data-animate="fadeInUp" data-delay=".6" style="animation-duration: 0.6s; animation-delay: 0.6s;">
				<label>Estimasi Pembiayaan</label>
				<input type="number" name="pengajuan_estimasi_pembiayaan" placeholder="Estimasi Pembiayaan*" class="form-control" required="">
			</div>
			<div class="position-relative animated fadeInUp" data-animate="fadeInUp" data-delay=".7" style="animation-duration: 0.6s; animation-delay: 0.7s;">
				<label>Deskripsi Pengajuan</label>
				<textarea name="pengajuan_deskripsi" placeholder="Deskripsi Pengajuan*" required="" class="form-control"></textarea>
			</div>
			<button class="btn btn-success btn-square btn-block animated fadeInUp" data-animate="fadeInUp" data-delay=".8" style="animation-duration: 0.6s; animation-delay: 0.8s;" type="submit">Lanjut</button>
		</form>
	</div>
</div>

@endsection
