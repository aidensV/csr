<?php $hal = 'Berita' ?>
@extends('layouts.user.LayoutUser')
@section('title', 'Detail Berita')
@section('content')
<br>
<div class="row" style="margin: 10px">
	<div class="col-md-8">
		<!-- Blog -->
		<section class="blog pb-7">
			<div class="container">
				<div class="row">
					@foreach($berita as $dt)
					<div class="post-details" data-animate="fadeInUp" data-delay=".1">
						<div class="post-content">
							<div align="center">
								<img src="{{ asset('public/images/berita-'.$dt->berita_gambar) }}" alt="" data-animate="fadeInUp" data-delay=".2" >
							</div>
							<span data-animate="fadeInUp" data-delay=".3">Posted on <a href="#">{{ substr($dt->berita_tanggal, 8, 2) }}-{{ substr($dt->berita_tanggal, 5, 2) }}-{{ substr($dt->berita_tanggal, 0, 4) }}</a></span>
							<h2 data-animate="fadeInUp" data-delay=".4">{{ $dt->berita_judul }}</h2>
							<p data-animate="fadeInUp" data-delay=".1">{!! $dt->berita_isi !!}</p>
						</div>

						<div class="row align-items-center half-gutters mb-5 tag-and-share">
							<div class="col-xl-7 col-lg-6">
								<h3>Share on social media</h3>
								
							</div>
							<div class="col-xl-5 col-lg-6">
								<ul class="social-share list-inline mb-0 text-lg-right">
									<!-- Load Facebook SDK for JavaScript -->
									<div id="fb-root"></div>
									<script>(function(d, s, id) {
										var js, fjs = d.getElementsByTagName(s)[0];
										if (d.getElementById(id)) return;
										js = d.createElement(s); js.id = id;
										js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
										fjs.parentNode.insertBefore(js, fjs);
									}(document, 'script', 'facebook-jssdk'));</script>
									<!-- Your share button code -->
									<div class="fb-share-button" 
									data-href="<?php echo $_SERVER['HTTP_REFERER']; ?>" 
									data-layout="button_count"></div>
									<!-- End Load Facebook SDK for JavaScript -->
									<li data-animate="fadeInUp" data-delay=".4"><a class="pinterest" href="#"><i class="fab fa-pinterest-p"></i></a></li>
									<li data-animate="fadeInUp" data-delay=".45"><a class="rss" href="#"><i class="fas fa-rss"></i></a></li>
									<li data-animate="fadeInUp" data-delay=".5"><a class="linkedin" href="#"><i class="fab fa-linkedin-in"></i></a></li>
									<li data-animate="fadeInUp" data-delay=".55"><a class="google" href="#"><i class="fab fa-google-plus-g"></i></a></li>
									<li data-animate="fadeInUp" data-delay=".6"><a class="twitter" href="#"><i class="fab fa-twitter"></i></a></li>
									<!-- <li data-animate="fadeInUp" data-delay=".65"><a class="facebook" href="#"><i class="fab fa-facebook-f"></i></a></li> -->
								</ul>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</section>
		<!-- End of Blog -->
	</div>
	<div class="col-md-4">
		<h4>Latest Posts</h4>
		<div class="">
			<h3 class="text-white" data-animate="fadeInUp" data-delay=".5">Latest News/Blogs</h3>
			@foreach($latestPost as $dt)
			<div class="single-footer-post clearfix" data-animate="fadeInUp" data-delay=".55">
				<a href="#" class="float-left">
					<img src="{{ asset('public/images/tumb/tumb-'.$dt->berita_gambar) }}" alt="" style="width: 55px; height: auto;">
				</a>
				<span>Posted on {{ $dt->berita_tanggal }}</span>
				<h4 class="cabin font-weight-normal"><a href="{{ url('/news/'.$dt->berita_id) }}">{{ $dt->berita_judul }}</a></h4>
				<!-- <p>Expand its civil service aviations web hosting powerhouse go daddy.</p> -->
			</div>
			@endforeach
			<!-- <a href="blog.html" class="roboto text-uppercase" data-animate="fadeInUp" data-delay=".65">View All Blog Posts <i class="fas fa-caret-right"></i></a> -->
		</div>
	</div>
</div>
@endsection
