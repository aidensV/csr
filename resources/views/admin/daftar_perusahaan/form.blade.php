<div class="modal" id="modal-form" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-lg">

    <div style="width:150%;" class="modal-content bd-0">
      <div class="modal-header pd-y-20 pd-x-25">
        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold modal-title"></h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form class="form-horizontal" data-toggle="validator" method="post">
        {{ csrf_field() }} {{ method_field('POST') }}

        <div class="modal-body pd-25">



          <input type="hidden" id="id" name="id">
          <div class="form-group">
            <label for="nama" class="col-md-12 control-label">Nama Perusahaan</label>
            <div class="col-md-12">
              <input id="daftar_perusahaan_nama" placeholder="Contoh: Gudang Garam" type="text" class="form-control" name="daftar_perusahaan_nama" autofocus required>
              <span class="help-block with-errors"></span>
            </div>
          </div>

          <div class="form-group">
            <label for="nama" class="col-md-12 control-label">Alamat Perusahaan</label>
            <div class="col-md-12">
              <input id="daftar_perusahaan_alamat" placeholder="Contoh: Jl. Sudirman - Kediri" type="text" class="form-control" name="daftar_perusahaan_alamat" autofocus required>
              <span class="help-block with-errors"></span>
            </div>
          </div>

          <div class="form-group">
            <label for="nama" class="col-md-12 control-label">Kecamatan</label>
            <div class="col-md-12">
              <select id="daftar_perusahaan_kecamatan" class="form-control" name="daftar_perusahaan_kecamatan">
                <option value="">-- Pilih --</option>

                <option value="Kecamatan Kota"> Kecamatan Kota </option>
                <option value="Mojoroto"> Mojoroto</option>
                <option value="Pesantren"> Pesantren </option>

              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="nama" class="col-md-12 control-label">Nama Kelurahan</label>
            <div class="col-md-12">
              <input id="daftar_perusahaan_kelurahan" placeholder="Contoh: Semampir" type="text" class="form-control" name="daftar_perusahaan_kelurahan" autofocus required>
              <span class="help-block with-errors"></span>
            </div>
          </div>

          <div class="form-group">
            <label for="nama" class="col-md-12 control-label">Tanggal Gabung Perusahaan</label>
            <div class="col-md-12">
              <input value="{{$tgl}}" id="daftar_perusahaan_tahun" placeholder="Contoh: Semampir" type="date" class="form-control" name="daftar_perusahaan_tahun" autofocus required>
              <span class="help-block with-errors"></span>
            </div>
          </div>


        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-save"><i class="fa fa-floppy-o"></i> Simpan </button>
          <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Batal</button>
        </div>

      </form>

    </div>


  </div>
</div>
