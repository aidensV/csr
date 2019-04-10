<?php $hal = 'History Pengajuan Usulan' ?>
@extends('layouts.user.LayoutUser')
@section('title', 'History Pengajuan Usulan')
@section('content')
<!-- <img align="center" src="{{ asset('public/images/pelantikan.jpg') }}" data-animate="fadeInUp" data-delay=".1" style="animation-duration: 0.6s; animation-delay: 0.3s;"> -->
<!-- <h1 align="center" data-animate="fadeInUp" data-delay=".2" style="animation-duration: 0.6s; animation-delay: 0.3s;">Pengajuan Usulan Program CSR</h1> -->
<br>
<div class="col-md-12">
	<div class="contact-form-wrap">
		<div class="text-center">
			<h2 data-animate="fadeInUp" data-delay=".1" class="animated fadeInUp" style="animation-duration: 0.6s; animation-delay: 0.1s;">History Pengajuan Usulan Program CSR</h2>
		</div>
		<div class="table-wrapper" data-animate="fadeInUp" data-delay=".2" class="animated fadeInUp" style="animation-duration: 0.6s; animation-delay: 0.2s;">
			<table id="example" class="table table-striped table-bordered" style="width:100%">
				<thead>
					<tr align="center">
						<th class="wd-15p">No</th>
						<th class="wd-15p">Program</th>
						<th class="wd-15p">Nama Pengajuan</th>
						<th class="wd-15p">Estimasi Pembiayaan</th>
						<th class="wd-20p">Deskripsi</th>
						<th class="wd-25p">Status Pengajuan</th>
						<th class="wd-25p">Tanggal Pengajuan</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1 ?>
					@foreach($pengajuan as $data)
					<tr>
						<td align="center">{{$no}}</td>
						<td><a href="{{url('program-csr',$data->program_id)}}">{{$data->program_nama}}</td></a>
						<td>{{$data->pengajuan_nama}}</td>
						<td align="right">Rp.{{number_format($data->pengajuan_estimasi_pembiayaan,0)}},-</td>
						<td>{{$data->pengajuan_deskripsi}}</td>
						<td align="center">
							<?php
							if ($data->pengajuan_status==0) {
								$status = "Usulan Ditolak";
							}elseif ($data->pengajuan_status==1) {
								$status = "Usulan Disetujui";
							}elseif ($data->pengajuan_status==2) {
								$status = "Usulan Diselenggarakan";
							}elseif ($data->pengajuan_status==3) {
								$status = "Usulan Direalisasikan";
							}elseif ($data->pengajuan_status==4) {
								$status = "Proses Pengajuan";
							}
							?>
							{{$status}}</td>
						<td align="center">{{ substr($data->pengajuan_tanggal, 8, 2) }}-{{ substr($data->pengajuan_tanggal, 5, 2) }}-{{ substr($data->pengajuan_tanggal, 0, 4) }}</td>
					</tr>
					<?php $no++ ?>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection




