<style>
    th {
        border: 1px solid #0b0b0b;
        position: center;
        alignment: center;
    }
</style>
        <table >
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
                <th >No</th>
                <th >Tg. Permohonan</th>
                <th >OPd</th>
                <th >Bidang</th>
                <th >Program Kegiatan</th>
                <th >Keterangan</th>
                <th >Tindak Lanjut</th>
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
