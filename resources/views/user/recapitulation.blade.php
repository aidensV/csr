<?php $hal = 'Rekapitulasi' ?>
@extends('layouts.user.LayoutUser')
@section('title', 'Rekapitulasi')
@section('head')
<script src="{{ asset('public/js/chart/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/js/chart/highcharts.js') }}" type="text/javascript"></script>
<script type="text/javascript">
	var chart1; // globally available
	$(document).ready(function() {
		chart1 = new Highcharts.Chart({
			chart: {
				renderTo: 'containerChart',
				type: 'column'
			},
			title: {
				text: 'Grafik Program'
			},
			xAxis: {
				categories: ['Bidang']
			},
			yAxis: {
				title: {
					text: 'Jumlah Pihak Swasta'
				}
			},
			series:
			[
			@foreach($recapitulation as $dt)
			name: '{{ $dt->bidang_nama }}',
			data: [{{ $dt->jml_perusahaan }}]
			@endforeach
			]
		});
	});
</script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script type="text/javascript">
	window.onload = function () {
		var chart = new CanvasJS.Chart("chartContainer",
		{
			title:{
				text: "Grafik Bidang Program CSR"
			},
			data: [
			{
				dataPoints: [
				@foreach($recapitulation as $dt)
				{ x: {{ $dt->bidang_id }}, y: {{ $dt->jml_perusahaan }}, label: "{{ $dt->bidang_nama }}"},
				@endforeach
				]
			}
			]
		});
		chart.render();
	}
</script>
@endsection
@section('content')
<!-- <div id='containerChart'></div> -->
<div id="chartContainer" style="height: 300px; width: 100%;"></div>
<h1 data-animate="fadeInUp" data-delay=".1" style="animation-duration: 0.6s; animation-delay: 0.3s;">Daftar Rekapitulasi CSR Kota Kediri {{ $tahun }}</h1>
<form action="{{ url('recapitulation-search') }}" class="form-inline" method="post" data-animate="fadeInUp" data-delay=".2" style="animation-duration: 0.6s; animation-delay: 0.3s;">
	{{csrf_field()}}
	<select name="tahun" class="form-control animated fadeInUp" required="" data-animate="fadeInUp" data-delay=".2" style="animation-duration: 0.6s; animation-delay: 0.3s;">
		<?php
		$mulai= date('Y') - 5;
		for($i = $mulai;$i<$mulai + 11;$i++){
			$sel = $i == date('Y') ? ' selected="selected"' : '';
			echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
		}
		?>
	</select>
	<button type="submit" class="btn-primary btn-square" style="margin-left: 10px"><i class="fa fa-search"></i></button>
</form>

@foreach($recapitulation as $dt)
<div class="row" style="background: #F5F7F9;padding: 35px 20px;margin: 0 0 50px 0;" data-animate="fadeInUp" data-delay=".4" style="animation-duration: 0.6s; animation-delay: 0.3s;">
	<div class="col-md-2" align="center">
		<img src="{{ asset('public/images/000.png') }}" width="80%">
	</div>
	<div class="col-md-5">
		<h3>Bidang</h3>
		<h6>Bidang {{ $dt->bidang_nama }}</h6>
		<br>
		<h3>Jumlah Anggaran</h3>
		<h6>Rp. {{ $dt->jumlah_anggaran }}</h6>
	</div>
	<div class="col-md-5">
		<h3>Jumlah Pihak Swasta</h3>
		<h6>{{ $dt->jml_perusahaan }}</h6>
		<br>
		<!-- <h3>Persentase</h3> -->
		<!-- <h6>1,44 %</h6> -->
	</div>
</div>
@endforeach

@endsection
