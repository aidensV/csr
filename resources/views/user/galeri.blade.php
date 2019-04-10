<?php $hal = 'Galeri' ?>
@extends('layouts.user.LayoutUser')
@section('title', 'Galeri')
@section('content')
<h1 data-animate="fadeInUp" data-delay=".1" style="animation-duration: 0.6s; animation-delay: 0.3s;">Galeri</h1>
<p data-animate="fadeInUp" data-delay=".3" style="animation-duration: 0.6s; animation-delay: 0.3s;">Berbagai informasi seputar kegiatan tanggung jawab sosial lingkungan di Kota Kediri</p>
<div class="row">
	<div class="col-md-12">
		<!-- Blog -->
		<section class="blog pb-7">
			<div class="container">
				<!-- Posts -->
				<div class="row">
					@foreach($gambar_berita as $dt)
					<div class="col-md-3">
						<div class="single-post" data-animate="fadeInUp" data-delay=".1">
							<div class="image-hover-wrap" align="center">
								<img src="{{ asset('public/images/berita-'.$dt->berita_gambar) }}" alt="">
								<div class="image-hover-content d-flex justify-content-center align-items-center text-center">
									<ul class="list-inline">
										<li><a href="{{ url('/news/'.$dt->berita_id) }}"><i class="fas fa-link"></i></a></li>
										<li><a href="#"><i class="fas fa-share-alt"></i></a></li>
									</ul>
								</div>
							</div>
							<!-- <span>Posted on <a href="#">Jan 19, 2017</a></span> -->
							<!-- <h4>Pembangunan Kolam Renang Indoor di Kawasan GOR </h4>
								<a href="{{ url('/program-prioritas/1') }}">Continue Reading<i class="fas fa-caret-right"></i></a> -->
							</div>
						</div>
						@endforeach
					</div>

					{{ $gambar_berita->links('pagination.custom') }}
				</div>
			</section>
			<!-- End of Blog -->
		</div>
	</div>
	@endsection
