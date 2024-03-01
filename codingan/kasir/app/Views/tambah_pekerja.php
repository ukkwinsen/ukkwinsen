<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="card-body">
            <div class="basic-form">
                <form class="form-horizontal form-label-left" novalidate  action="<?= base_url('home/aksi_tambah_pekerja')?>" method="post">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nama<span style="color: red;">*</span></label>
                            <input type="text" id="nama_pekerja" name="nama_pekerja" class="form-control text-capitalize" placeholder="Nama">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Alamat<span style="color: red;">*</span></label>
                            <input type="text" id="alamat" name="alamat" class="form-control text-capitalize" placeholder="Alamat">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Telepon<span style="color: red;">*</span></label>
                            <input type="text" id="telepon" name="telepon" class="form-control text-capitalize" placeholder="Telepon">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Username<span style="color: red;">*</span></label>
                            <input type="text" id="username" name="username" class="form-control text-capitalize" placeholder="Username">
                        </div>
                        <div class="input input-group">
                            <label class="form-label">Level<span style="color: red;">*</span></label>
                            <div class="col-12">
                            <select id="level" class="form-control col-12" data-validate-length-range="6" data-validate-words="2" name="level" required="required">
                                <option>Select Level</option>
                                <option value="1">Administrator</option>
                                <option value="2">Petugas</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="<?= base_url('/home/pekerja')?>" type="submit" class="btn btn-primary">Cancel</a>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
