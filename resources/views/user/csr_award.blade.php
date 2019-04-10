<?php $hal = 'Csr Award' ?>
@extends('layouts.user.LayoutUser')
@section('title', 'CSR Award')
@section('content')
<!-- <img align="center" src="{{ asset('public/images/pelantikan.jpg') }}" data-animate="fadeInUp" data-delay=".1" style="animation-duration: 0.6s; animation-delay: 0.3s;"> -->
<div class="contact-form-wrap" style="margin:10px">
	<h1 align="center" data-animate="fadeInUp" data-delay=".2" style="animation-duration: 0.6s; animation-delay: 0.3s;">CSR Award</h1>
	<p align="justify" style="font-size: 14pt; text-indent: 0.5in;" data-animate="fadeInUp" data-delay=".3" style="animation-duration: 0.6s; animation-delay: 0.3s;">
		Forum Tanggung Jawab Sosial dan Lingkungan (TJSL) Perusahaan Kota Kediri dibentuk berdasarkan amanat Peraturan Daerah Kota Kediri Nomor 13 Tahun 2012 tentang Pelaksanaan Kewajiban Program Tanggung Jawab Sosial dan Lingkungan (TJSL) Perusahaan Pasal 15 ayat (3) bahwa untuk membantu Wali Kota mengkoordinasikan perencanaan dan pelaksanaan Program TJSL di Daerah, dibentuk Forum Tanggung Jawab Sosial dan Lingkungan yang ditetapkan dengan Keputusan Wali Kota. <br><br>
	</p>
	@foreach($csr_award as $dt)
	<h3>{{ $dt->kategori_award_nama }}</h3>
	<h4>{{ $dt->kriteria_award_nama }}</h4>
	@endforeach
</div>
@endsection
