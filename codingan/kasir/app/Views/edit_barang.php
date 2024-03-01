<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="card-body">
            <div class="basic-form">
                <form class="form-horizontal form-label-left" novalidate  action="<?= base_url('home/aksi_edit_barang')?>" method="post">
                  <input type="hidden" name="id" value="<?= $winsen->id_barang ?>">

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Barang<span style="color: red;">*</span></label>
                            <input type="text" id="barang" name="barang" class="form-control text-capitalize" placeholder="Barang" value="<?= $winsen->barang?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Harga<span style="color: red;">*</span></label>
                            <input type="text" id="harga" name="harga" class="form-control text-capitalize" placeholder="Harga" value="<?= $winsen->harga?>">
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="<?= base_url('/home/barang')?>" type="submit" class="btn btn-primary">Cancel</a>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
