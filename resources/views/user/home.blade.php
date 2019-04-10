<?php $hal = 'Beranda' ?>
@extends('layouts.user.LayoutUser')
@section('title', 'Beranda')

@section('content')
<!-- Banner -->
<section class="position-relative bg-light" data-animate="fadeInUp" data-delay=".1" style="animation-duration: 0.6s; animation-delay: 0.3s;">
	<div id="demo" class="carousel slide" data-ride="carousel">

		<!-- Indicators -->
<!-- 		<ul class="carousel-indicators">
	<li data-target="#demo" data-slide-to="0" class="active"></li>
	<li data-target="#demo" data-slide-to="1"></li>
	<li data-target="#demo" data-slide-to="2"></li>
</ul> -->

<!-- The slideshow -->
<div class="carousel-inner"  style="margin-top: 10px">
	<div class="carousel-item active">
		<img src="{{ asset('public/images/slide-1.jpg') }}" alt="Slide Utama" width="1100" height="500">
	</div>
	@foreach($slideshow as $dt)
	<div class="carousel-item">
		<img src="{{ asset('public/images/slideshow-'.$dt->slideshow_gambar) }}" alt="Slideshow" style="width:100% !important;height:500px !important;">
	</div>
	@endforeach
</div>

<!-- Left and right controls -->
<a class="carousel-control-prev" href="#demo" data-slide="prev">
	<span class="carousel-control-prev-icon"></span>
</a>
<a class="carousel-control-next" href="#demo" data-slide="next">
	<span class="carousel-control-next-icon"></span>
</a>
</div>
</section>
<!-- <div class="row">
	<div class="col-md-12">

		/#main-slider
	</div>
</div> -->
<!-- End of Banner -->
<!-- Features -->
<section class="pt-7 pb-5-5">
	<div class="container">
		<h1 align="center" data-animate="fadeInUp" data-delay=".1" style="animation-duration: 0.6s; animation-delay: 0.3s;">Program Unggulan</h1>
		<p align="center" data-animate="fadeInUp" data-delay=".2" style="animation-duration: 0.6s; animation-delay: 0.3s;">Beberapa Program Unggulan kami yang telah berhasil memberikan manfaat<br>bagi masyarakat</p>
		<div class="row">
			<div class="col-md-4">
				<div class="single-feature text-center" data-animate="fadeInUp" data-delay=".3" style="animation-duration: 0.6s; animation-delay: 0.3s;">
					<img src="{{ asset('public/images/pendidikan.png') }}" width="25%" alt="" alt="" data-no-retina class="svg') }}">
					<h3>PENDIDIKAN</h3>
					<!-- <p>Bidang Pendidikan merupakan salah satu program unggulan di TJSL Kota Kediri seperti terwujudnya Kediri Cerdas yang diharapkan agar wajib belajar sampai ke tingkat SLTA.<br><br>
					1361 Program telah terlaksanakan.</p> -->
				</div>
			</div>
			<div class="col-md-4">
				<div class="single-feature text-center" data-animate="fadeInUp" data-delay=".3" style="animation-duration: 0.6s; animation-delay: 0.3s;">
					<img src="{{ asset('public/images/kesehatan.png') }}" width="25%" alt="" alt="" data-no-retina class="svg">
					<h3>KESEHATAN</h3>
					<!-- <p>Bidang Kesehatan merupakan salah satu program unggulan di TJSL Kota Kediri seperti diiharapkan terwujudnya masyarakat Kediri sehat.<br><br>
					987 Program telah terlaksanakan.</p> -->
				</div>
			</div>
			<div class="col-md-4">
				<div class="single-feature text-center" data-animate="fadeInUp" data-delay=".4" style="animation-duration: 0.6s; animation-delay: 0.3s;">
					<img src="{{ asset('public/images/fasilitas-umum.png') }}" width="25%" alt="" alt="" data-no-retina class="svg">
					<h3>SARANA UMUM</h3>
					<!-- <p>Bidang lingkungan hidup merupakan salah satu program unggulan di TJSL Kota Kediri seperti Gerakan Penghijauan, Hemat dan Menabung Air, Gerakan Cikapundung Bersih dll.<br><br>
					1029 Program telah terlaksanakan.</p> -->
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4">
				<div class="single-feature text-center" data-animate="fadeInUp" data-delay=".4" style="animation-duration: 0.6s; animation-delay: 0.3s;">
					<img src="{{ asset('public/images/sarana-ibadah.png') }}" width="25%" alt="" alt="" data-no-retina class="svg">
					<h3>SARANA IBADAH / KEAGAMAAN</h3>
					<!-- <p>Bidang Ekonomi Masyarakat merupakan salah satu program unggulan di TJSL Kota Kediri untuk menunjang perkembangan ekonomi masyarakat Kota Kediri.<br><br>
					1129 Program telah terlaksanakan.</p> -->
				</div>
			</div>
			<div class="col-md-4">
				<div class="single-feature text-center" data-animate="fadeInUp" data-delay=".5" style="animation-duration: 0.6s; animation-delay: 0.3s;">
					<img src="{{ asset('public/images/lingkungan.png') }}" width="25%" alt="" alt="" data-no-retina class="svg">
					<h3>LINGKUNGAN HIDUP / PELESTARIAN ALAM</h3>
					<!-- <p>Bidang lingkungan hidup merupakan salah satu program unggulan di TJSL Kota Kediri seperti Gerakan Penghijauan, Hemat dan Menabung Air, Gerakan Cikapundung Bersih dll.<br><br>
					1029 Program telah terlaksanakan.</p> -->
				</div>
			</div>
			<div class="col-md-4">
				<div class="single-feature text-center" data-animate="fadeInUp" data-delay=".5" style="animation-duration: 0.6s; animation-delay: 0.3s;">
					<img src="{{ asset('public/images/kesejahteraan.png') }}" width="25%" alt="" alt="" data-no-retina class="svg">
					<h3>BANTUAN SOSIAL</h3>
					<!-- <p>Bidang Ekonomi Masyarakat merupakan salah satu program unggulan di TJSL Kota Kediri untuk menunjang perkembangan ekonomi masyarakat Kota Kediri.<br><br>
					1129 Program telah terlaksanakan.</p> -->
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4">
				<div class="single-feature text-center" data-animate="fadeInUp" data-delay=".6" style="animation-duration: 0.6s; animation-delay: 0.3s;">
					<img src="{{ asset('public/images/umkm.png') }}" width="25%" alt="" alt="" data-no-retina class="svg">
					<h3>PROGRAM KEMITRAAN / UMKM</h3>
					<!-- <p>Bidang lingkungan hidup merupakan salah satu program unggulan di TJSL Kota Kediri seperti Gerakan Penghijauan, Hemat dan Menabung Air, Gerakan Cikapundung Bersih dll.<br><br>
					1029 Program telah terlaksanakan.</p> -->
				</div>
			</div>
			<div class="col-md-4">
				<div class="single-feature text-center" data-animate="fadeInUp" data-delay=".6" style="animation-duration: 0.6s; animation-delay: 0.3s;">
					<img src="{{ asset('public/images/bencana-alam.png') }}" width="25%" alt="" alt="" data-no-retina class="svg">
					<h3>BENCANA ALAM</h3>
					<!-- <p>Bidang Ekonomi Masyarakat merupakan salah satu program unggulan di TJSL Kota Kediri untuk menunjang perkembangan ekonomi masyarakat Kota Kediri.<br><br>
					1129 Program telah terlaksanakan.</p> -->
				</div>
			</div>
			<div class="col-md-4">
				<div class="single-feature text-center" data-animate="fadeInUp" data-delay=".6" style="animation-duration: 0.6s; animation-delay: 0.3s;">
					<img src="{{ asset('public/images/bencana-alam.png') }}" width="25%" alt="" alt="" data-no-retina class="svg">
					<h3>DAN LAIN-LAIN</h3>
					<!-- <p>Bidang Ekonomi Masyarakat merupakan salah satu program unggulan di TJSL Kota Kediri untuk menunjang perkembangan ekonomi masyarakat Kota Kediri.<br><br>
					1129 Program telah terlaksanakan.</p> -->
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End of Features -->
<!-- Our services -->
<section>
	<div class="contact-form-wrap">
		<!-- All services -->
		<h1 align="center" data-animate="fadeInUp" data-delay=".11" style="animation-duration: 0.6s; animation-delay: 0.3s;">Alur Partisipasi<br>Program Pembangunan</h1>
		<img src="{{ asset('public/images/Alur Partisipasi Program CSR.png') }}" width="100%" height="100%" alt="" data-animate="fadeInUp" data-delay=".3" style="animation-duration: 0.6s; animation-delay: 0.3s;">
	</div>
	<div class="contact-form-wrap" style="margin-top: 10px">
		<!-- All services -->
		<h1 align="center" data-animate="fadeInUp" data-delay=".11" style="animation-duration: 0.6s; animation-delay: 0.3s;">Alur Pengajuan<br>Program CSR</h1>
		<img src="{{ asset('public/images/Alur Pengajuan Program CSR.png') }}" width="100%" height="100%" alt="" data-animate="fadeInUp" data-delay=".3" style="animation-duration: 0.6s; animation-delay: 0.3s;">
	</div>
</section>
<!-- End of Our services -->

<!-- <section class="clients-wrap pt-4 pb-4" data-animate="fadeInUp" data-delay=".1" style="animation-duration: 0.6s; animation-delay: 0.3s;">
	<video width="100%" src="{{ asset('public/videos/tahun-baru.mp4') }}"></video>
	<?php
	function youtube($url){
		$link=str_replace('http://www.youtube.com/watch?v=', '', $url);
		$link=str_replace('https://www.youtube.com/watch?v=', '', $link);
		$data='<object width="100%" height="700px" data="http://www.youtube.com/v/'.$link.'" type="application/x-shockwave-flash">
		<param name="src" value="http://www.youtube.com/v/'.$link.'" />
		</object>';
		return $data;
	}
	echo youtube("https://www.youtube.com/watch?v=T39YaDwENy0");
	?>
</section> -->

<section class="clients-wrap pt-4 pb-4">
	<div class="row">
		@foreach($berita as $dt)
		<div class="col-sm-6">
			<h4 data-animate="fadeInUp" data-delay=".1" style="animation-duration: 0.6s; animation-delay: 0.3s;">BERITA TERBARU</h4>
			<h1 data-animate="fadeInUp" data-delay=".3" style="animation-duration: 0.6s; animation-delay: 0.3s;">{{ $dt->berita_judul }}</h1>
			<p style="font-size: 16pt; text-align: justify;" data-animate="fadeInUp" data-delay=".5" style="animation-duration: 0.6s; animation-delay: 0.3s;">{!! substr($dt->berita_isi, 0, 1000) !!}...
			</p>
			<p data-animate="fadeInUp" data-delay=".6" style="animation-duration: 0.6s; animation-delay: 0.3s;">Posted on {{ substr($dt->berita_tanggal, 8, 2) }}-{{ substr($dt->berita_tanggal, 5, 2) }}-{{ substr($dt->berita_tanggal, 0, 4) }}</p>
			<a href="{{ url('/news/'.$dt->berita_id) }}" data-animate="fadeInUp"><h4 data-animate="fadeInUp" data-delay=".7" style="animation-duration: 0.6s; animation-delay: 0.3s;">Selengkapnya</h4></a>
		</div>
		<div class="col-sm-6">
			<img src="{{ asset('public/images/pelantikan.jpg') }}" alt="" data-animate="fadeInUp" data-delay=".9" style="animation-duration: 0.6s; animation-delay: 0.3s;">
		</div>
	</div>
	@endforeach
</section>
<!-- Our clients -->
<!-- <section class="clients-wrap pt-4 pb-4">
	<h1 align="center" data-animate="fadeInUp" data-delay=".1" style="animation-duration: 0.6s; animation-delay: 0.3s;">Mitra Kami</h1>
	<p align="center" data-animate="fadeInUp" data-delay=".3" style="animation-duration: 0.6s; animation-delay: 0.3s;">Perusahaan dan Badan mitra kami yang merealisasikan program TJSL</p>
	<div class="container">
		<ul class="our-clients list-unstyled d-md-flex align-items-md-center justify-content-md-between m-0">
			<li data-animate="fadeInUp" data-delay=".1">
				<a href="#" target="_blank"><img src="{{ asset('public/front/img/brands/brand8.png') }}" alt=""></a></li>
				<li data-animate="fadeInUp" data-delay=".2">
					<a href="#" target="_blank"><img src="{{ asset('public/front/img/brands/brand8.png') }}" alt=""></a></li>
					<li data-animate="fadeInUp" data-delay=".3">
						<a href="#" target="_blank"><img src="{{ asset('public/front/img/brands/brand8.png') }}" alt=""></a></li>
						<li data-animate="fadeInUp" data-delay=".4">
							<a href="#" target="_blank"><img src="{{ asset('public/front/img/brands/brand8.png') }}" alt=""></a></li>
							<li data-animate="fadeInUp" data-delay=".5">
								<a href="#" target="_blank"><img src="{{ asset('public/front/img/brands/brand8.png') }}" alt=""></a></li>
								<li data-animate="fadeInUp" data-delay=".6">
									<a href="#" target="_blank"><img src="{{ asset('public/front/img/brands/brand8.png') }}" alt=""></a></li>
									<li data-animate="fadeInUp" data-delay=".7">
										<a href="#" target="_blank"><img src="{{ asset('public/front/img/brands/brand8.png') }}" alt=""></a></li>
										<li data-animate="fadeInUp" data-delay=".8">
											<a href="#" target="_blank"><img src="{{ asset('public/front/img/brands/brand8.png') }}" alt=""></a></li>
											<li data-animate="fadeInUp" data-delay=".9">
												<a href="#" target="_blank"><img src="{{ asset('public/front/img/brands/brand8.png') }}" alt=""></a></li>
											</ul>
										</div>
									</section> -->
									<!-- End of Our clients -->
									@endsection
