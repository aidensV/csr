<div class="modal" id="modal-form" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
   <div class="modal-dialog modal-lg">

     <div class="modal-content bd-0">
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
                       <label for="nama" class="col-md-12 control-label">Nama Bidang</label>
                       <div class="col-md-12">
                          <input id="bidang_nama" type="text" class="form-control" name="bidang_nama" autofocus required>
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
