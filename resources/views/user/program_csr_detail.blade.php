<?php $hal = 'Program CSR' ?>
@extends('layouts.user.LayoutUser')
@section('title', 'Program CSR')
@section('content')
<h3 data-animate="fadeInUp" data-delay=".1">PROGRAM PRIORITAS CSR</h3>
@foreach($program as $dt)
<div class="row">
	<div class="col-md-8">
		<!-- Blog -->
		<section class="blog pb-7">
			<div class="container">
				<div class="row">
					<div class="post-details" data-animate="fadeInUp" data-delay=".1">
						<div class="post-content">
							<img src="{{ asset('public/images/program-'.$dt->program_gambar) }}" alt="" data-animate="fadeInUp" data-delay=".2"  style="height: 100%; width: 100%;">
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End of Blog -->
	</div>
	<div class="col-md-4">
		<div class="footer-posts">
			<!-- <h3 data-animate="fadeInUp" data-delay=".1">Deskripsi PROGRAM CSR</h3> -->
			<div class="single-footer-post clearfix" data-animate="fadeInUp" data-delay=".2">
				<span>KEGIATAN</span>
				<h4 class="cabin font-weight-normal">{{ $dt->program_nama }}</h4>
			</div>
			<div class="single-footer-post clearfix" data-animate="fadeInUp" data-delay=".4">
				<span>BIDANG</span>
				<h4 class="cabin font-weight-normal">{{ $dt->bidang_nama }}</h4>
			</div>
			<div class="single-footer-post clearfix" data-animate="fadeInUp" data-delay=".55">
				<span>ESTIMASI BIAYA</span>
				<h4 class="cabin font-weight-normal">Rp. {{ number_format($dt->program_estimasi_biaya,0) }},-</h4>
			</div>
			<div class="single-footer-post clearfix" data-animate="fadeInUp" data-delay=".6">
				<span>VOLUME SATUAN</span>
				<h4 class="cabin font-weight-normal">{{ $dt->program_volume_satuan }}</h4>
			</div>
			<div class="single-footer-post clearfix" data-animate="fadeInUp" data-delay=".8">
				<span>SATUAN KERJA</span>
				<h4 class="cabin font-weight-normal">{{ $dt->program_satuan_kerja }}</h4>
			</div>
			<!-- <a href="blog.html" class="roboto text-uppercase" data-animate="fadeInUp" data-delay=".65">View All Blog Posts <i class="fas fa-caret-right"></i></a> -->
		</div>
	</div>
</div>
@endforeach
@endsection
