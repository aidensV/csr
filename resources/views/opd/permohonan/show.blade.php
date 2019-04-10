{{--	<title>Daftar Pengajuan CSR</title>--}}
{{--	<link rel="stylesheet" type="text/css" href="{{ asset('public/bootstrap/css/bootstrap.min.css') }}">--}}

{{--<img src="http://localhost/csr/public/images/kop.png" height="200px" width="1030px" alt=""  style="margin-bottom:10px;">--}}
{{--<img src="/public/images/kop.png" height="200px" width="1030px" alt=""  style="margin-bottom:10px;">--}}

<style>
    th {
        border: 1px solid #0b0b0b;
        position: center;
        alignment: center;
    }
</style>
<table>


    <thead>
    <tr>
        <td height="20" style="text-align: start" colspan="7">
            <h2 style="text-decoration: underline; text-align: center">BAPPEDA KOTA KEDIRI</h2><br>
            {{--						<img style="alignment: center" src="public/images/kop.png" align="center" height="100px" width="100px">--}}
        </td>

    </tr>
    <tr>
        <td height="20" style="text-align: start" colspan="7">
            <h3 style=" text-align: center">Laporan Pengajuan CSR</h3>
        </td>
    </tr>

    <tr>
        <th>No</th>
        <th>Tg. Pengajuan</th>
        <th>Perusahaan</th>
        <th>Bidang</th>
        <th>Program Kegiatan</th>
        <th>Keterangan</th>
        <th>Tindak Lanjut</th>
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

        if ($stt == "4") {
            $text = "Pengajuan";
        } elseif ($stt == "1") {
            $text = "Disetujui";
            $display2 = "style='display:none;'";
        } elseif ($stt == "0") {
            $text = "Ditolak";
        } elseif ($stt == "2") {
            $text = "Diselenggarakan";
        } elseif ($stt == "3") {
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

