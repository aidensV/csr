<?php $hal = 'Galeri Pelaksanaan' ?>
@extends('layouts.user.LayoutUser')
@section('title', 'Galeri Pelaksanaan')
@section('content')
<h1 data-animate="fadeInUp" data-delay=".1" style="animation-duration: 0.6s; animation-delay: 0.3s;">Galeri Pelaksanaan</h1>
<p data-animate="fadeInUp" data-delay=".3" style="animation-duration: 0.6s; animation-delay: 0.3s;">Berbagai informasi seputar kegiatan tanggung jawab sosial lingkungan di Kota Kediri</p>
<div class="row">
	<div class="col-md-12">
		<!-- Blog -->
		<section class="blog pb-7">
			@foreach($galeri_pelaksanaan as $dt)
			<div class="container">
				<h3>{{ $dt->pengajuan_nama}}</h3>
				<!-- Posts -->
				<div class="row">
					<div class="col-md-4">
						<div class="single-post" data-animate="fadeInUp" data-delay=".1">
							<div class="image-hover-wrap" align="center">
								<img src="{{ asset('public/images/galeri-'.$dt->galeri_pelaksanaan_gb1) }}" alt="" style="height: 150px;">
								<div class="image-hover-content d-flex justify-content-center align-items-center text-center">
									<ul class="list-inline">
										<li><a href="{{ url('/program-prioritas/1') }}"><i class="fas fa-link"></i></a></li>
										<li><a href="#"><i class="fas fa-share-alt"></i></a></li>
									</ul>
								</div>
							</div>
							<span>Pengerjaan <a>0%</a></span>
							<!-- <span>Permulaan <a>1 Januari 2019</a></span> -->
						</div>
					</div>
					@if ($dt->galeri_pelaksanaan_gb2 == !null)
					<div class="col-md-4">
						<div class="single-post" data-animate="fadeInUp" data-delay=".2">
							<div class="image-hover-wrap" align="center">
								<img src="{{ asset('public/images/galeri-'.$dt->galeri_pelaksanaan_gb2) }}" alt="" style="height: 150px;">
								<div class="image-hover-content d-flex justify-content-center align-items-center text-center">
									<ul class="list-inline">
										<li><a href="#"><i class="fas fa-link"></i></a></li>
										<li><a href="#"><i class="fas fa-share-alt"></i></a></li>
									</ul>
								</div>
							</div>
							<span>Pengerjaan <a>50%</a></span>
							<!-- <span>Pertengahan <a>15 Januari 2019</a></span> -->
						</div>
					</div>
					@else
					@endif
					@if ($dt->galeri_pelaksanaan_gb3 == !null)
					<div class="col-md-4">
						<div class="single-post" data-animate="fadeInUp" data-delay=".1">
							<div class="image-hover-wrap" align="center">
								<img src="{{ asset('public/images/galeri-'.$dt->galeri_pelaksanaan_gb3) }}" alt="" style="height: 150px;">
								<div class="image-hover-content d-flex justify-content-center align-items-center text-center">
									<ul class="list-inline">
										<li><a href="#"><i class="fas fa-link"></i></a></li>
										<li><a href="#"><i class="fas fa-share-alt"></i></a></li>
									</ul>
								</div>
							</div>
							<span>Pengerjaan <a>100%</a></span>
							<!-- <span>Selesai <a>10 Februari 2019</a></span> -->
						</div>
					</div>
					@else
					@endif
				</div>
			</div>
			@endforeach
			{{ $galeri_pelaksanaan->links('pagination.custom') }}
		</section>
		<!-- End of Blog -->
	</div>
</div>
@endsection
