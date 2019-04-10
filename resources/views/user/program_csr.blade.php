<?php $hal = 'Program CSR '.$program_jenis ?>
@extends('layouts.user.LayoutUser')
@section('title', 'Program CSR '.$program_jenis2)
@section('content')
<h1 data-animate="fadeInUp" data-delay=".1" style="animation-duration: 0.6s; animation-delay: 0.3s;">Program CSR {{ $program_jenis2 }}</h1>
<p data-animate="fadeInUp" data-delay=".3" style="animation-duration: 0.6s; animation-delay: 0.3s;">Berbagai informasi seputar kegiatan tanggung jawab sosial lingkungan di Kota Kediri</p>
<div class="row">
	<div class="col-md-12">
		<!-- Blog -->
		<section class="blog pb-7">
			<div class="container">
				<!-- Posts -->
				<div class="row">
					@foreach($program as $dt)
					<div class="col-md-3">
						<div class="single-post" data-animate="fadeInUp" data-delay=".1">
							<div class="image-hover-wrap" align="center">
								<img src="{{ asset('public/images/program-'.$dt->program_gambar) }}" alt="" style="height: 150px;">
								<div class="image-hover-content d-flex justify-content-center align-items-center text-center">
									<ul class="list-inline">
										<li><a href="{{url('program-csr',$dt->program_id)}}"><i class="fas fa-link"></i></a></li>
										<li><a href="#"><i class="fas fa-share-alt"></i></a></li>
									</ul>
								</div>
							</div>
							<!-- <span>Posted on <a href="#">Jan 19, 2017</a></span> -->
							<h4>{{ $dt->program_nama }}</h4>
							<a href="{{url('program-csr',$dt->program_id)}}">Continue Reading<i class="fas fa-caret-right"></i></a>
						</div>
					</div>
					@endforeach
				</div>
				{{ $program->links('pagination.custom') }}
				<!-- Pagination -->
<!-- 				<ul class="custom-pagination list-inline text-center text-uppercase mt-4" data-animate="fadeInUp" data-delay=".1">
	<li class="float-left disabled"><a href="#"><i class="fas fa-caret-left"></i> Prev</a></li>
	<li class="active"><a href="#">01</a></li>
	<li><a href="#">02</a></li>
	<li><a href="#">03</a></li>
	<li><a href="#">04</a></li>
	<li><a href="#">05</a></li>
	<li class="float-right"><a href="#">Next <i class="fas fa-caret-right"></i></a></li>
</ul> -->
</div>
</section>
<!-- End of Blog -->
</div>
</div>
@endsection
