<!DOCTYPE html>
<html>
<head>
	<title>Daftar Pengajuan CSR</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('public/bootstrap/css/bootstrap.min.css') }}">
</head>
<body>
	<img src="{{asset('public/images/kop.png')}}" height="200px" width="1030px" alt=""  style="margin-bottom:10px;">
	<div class="panel panel-default">

		<br>
		<div class="panel-heading">
			<h3 align="center">Daftar Permohonan CSR</h3>
		</div>
		<div class="panel-body">
			<table class="table table-striped table-bordered">
				<thead>
          <tr>
						<th class="wd-5p">No</th>
						<th class="wd-10p">Tg. Permohonan</th>
						<th class="wd-25p">OPd</th>
						<th class="wd-25p">Bidang</th>
						<th class="wd-25p">Program Kegiatan</th>
						<th class="wd-25p">Keterangan</th>
						<th class="wd-15p">Tindak Lanjut</th>
          </tr>
        </thead>
				<tbody>
          <?php
						$no = 1;
						$text = "";
					?>

          @foreach($permohonan as $data)

					<?php

					$stt = $data->permohonan_status;


					if ($stt=="3") {
						$text = "Permohonan";
					}elseif ($stt == "1") {
						$text = "Disetujui";
					}elseif ($stt == "0") {
						$text = "Ditolak";
					}elseif ($stt == "2") {
						$text = "Tindak Lanjut";
					}

					 ?>

          <tr>
            <td>{{$no}}</td>
            <td>{{ tanggal_indonesia($data->permohonan_tanggal,false)}}</td>
            <td>{{$data->opd_nama}}</td>
						<td>{{$data->bidang_nama}}</td>
						<td>{{$data->program_nama}}</td>
						<td>{{$data->permohonan_nama}}</td>
            <td>{{$text}}</td>
          </tr>
          <?php $no++ ?>
          @endforeach



        </tbody>
			</table>
		</div>

	</div>

</body>
</html>
