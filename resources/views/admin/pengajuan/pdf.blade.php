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
			<h3 align="center">Daftar Pengajuan CSR</h3>
		</div>
		<div class="panel-body">
			<table class="table table-striped table-bordered">
				<thead>
          <tr>
						<th class="wd-5p">No</th>
						<th class="wd-10p">Tg. Pengajuan</th>
						<th class="wd-25p">Perusahaan</th>
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

          @foreach($pengajuan as $data)

					<?php

					$stt = $data->pengajuan_status;


					if ($stt=="4") {
						$text = "Pengajuan";
					}elseif ($stt == "1") {
						$text = "Disetujui";
						$display2 = "style='display:none;'";
					}elseif ($stt == "0") {
						$text = "Ditolak";
					}elseif ($stt == "2") {
						$text = "Diselenggarakan";
					}elseif ($stt == "3") {
						$text = "Direalisasikan";
					}

					 ?>

          <tr>
            <td>{{$no}}</td>
            <td>{{ tanggal_indonesia($data->pengajuan_tanggal,false)}}</td>
            <td>{{$data->perusahaan_nama}}</td>
						<td>{{$data->bidang_nama}}</td>
						<td>{{$data->program_nama}}</td>
						<td>{{$data->pengajuan_nama}}</td>
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
