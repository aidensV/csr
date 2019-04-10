<?php $hal = 'Berita' ?>
@extends('layouts.user.LayoutUser')
@section('title', 'Berita')
@section('content')
<h1 data-animate="fadeInUp" data-delay=".1" style="animation-duration: 0.6s; animation-delay: 0.3s;">Berita</h1>
<p data-animate="fadeInUp" data-delay=".3" style="animation-duration: 0.6s; animation-delay: 0.3s;">Berbagai informasi seputar kegiatan tanggung jawab sosial lingkungan di Kota Kediri</p>
<div class="row">
	<div class="col-md-8">
		<!-- Blog -->
		<section class="blog pb-7">
			<div class="container">
				<!-- Posts -->
				<div class="row">
					@foreach($berita as $dt)
					<div class="col-md-6">
						<div class="single-post" data-animate="fadeInUp" data-delay=".1">
							<div class="image-hover-wrap" align="center">
								<img src="{{ asset('public/images/berita-'.$dt->berita_gambar) }}" alt="" style="height: 150px;">
								<div class="image-hover-content d-flex justify-content-center align-items-center text-center">
									<ul class="list-inline">
										<li><a href="{{ url('/news/'.$dt->berita_id) }}"><i class="fas fa-link"></i></a></li>
										<li><a href="#"><i class="fas fa-share-alt"></i></a></li>
									</ul>
								</div>
							</div>
							<span>Posted on <a href="#">{{ substr($dt->berita_tanggal, 8, 2) }}-{{ substr($dt->berita_tanggal, 5, 2) }}-{{ substr($dt->berita_tanggal, 0, 4) }}</a></span>
							<h4>{{ $dt->berita_judul }}</h4>
							<a href="{{ url('/news/'.$dt->berita_id) }}">Continue Reading<i class="fas fa-caret-right"></i></a>
						</div>
					</div>
					@endforeach
				</div>
				{{ $berita->links('pagination.custom') }}
			</div>
		</section>
		<!-- End of Blog -->
	</div>
	<div class="col-md-4">
		<h4 align="center" data-animate="fadeInUp" data-delay=".1" style="animation-duration: 0.6s; animation-delay: 0.3s;">Berita Terpopuler</h4>
		<div class="">
			<h3 class="text-white" data-animate="fadeInUp" data-delay=".5">Latest News/Blogs</h3>

			@foreach($terpopuler as $dt)
			<div class="single-footer-post clearfix" data-animate="fadeInUp" data-delay=".55">
				<a href="#" class="float-left">
					<img src="{{ asset('public/images/tumb/tumb-'.$dt->berita_gambar) }}" alt="" style="height: auto; width: 85px">
				</a>
				<span>Posted on {{ substr($dt->berita_tanggal, 8, 2) }}-{{ substr($dt->berita_tanggal, 5, 2) }}-{{ substr($dt->berita_tanggal, 0, 4) }}</span>
				<h4 class="cabin font-weight-normal"><a href="{{ url('/news/'.$dt->berita_id) }}">{{ $dt->berita_judul }}</a></h4>
			</div>
			@endforeach
		</div>
	</div>
</div>
@endsection
