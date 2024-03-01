<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="card-body">
            <div class="basic-form">
                <form class="form-horizontal form-label-left" novalidate  action="<?= base_url('home/aksi_tambah_bk')?>" method="post">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Barang<span style="color: black;"> :</span></label>
                            <select name="id_barang" class="form-control text-capitalize" id="id_barang" required autocomplete="on" onchange="updateTotalHarga()">
                                <option disabled selected>Pilih Barang</option>
                                <?php foreach ($brg as $bm) {?>
                                    <option class="text-capitalize" value="<?php echo $bm->id_barang ?>"><?php echo $bm->barang ?>- Rp <?php echo $bm->barang ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Stok<span style="color: red;">*</span></label>
                            <input type="text" id="stok" name="stok" class="form-control text-capitalize" placeholder="Stok">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nama Pembeli<span style="color: red;">*</span></label>
                            <input type="text" id="nama_pembeli" name="nama_pembeli" class="form-control text-capitalize" placeholder="Nama Pembeli">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Total Harga<span style="color: red;">*</span></label>
                            <input type="text" id="total_harga" name="total_harga" class="form-control text-capitalize" placeholder="Total Harga">
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="<?= base_url('/home/barang_keluar')?>" type="submit" class="btn btn-primary">Cancel</a>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
