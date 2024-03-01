<div class="col-lg-12">
<div class="card custom-card">
  <div class="card-body">
    <a href="<?= base_url('/home/tambah_pekerja/')?>"><button class="btn btn-success"><i class="fa fa-plus"></i> Tambah</button></a>
  </a>
  <div class="table-responsive custom-table" style="margin-top: 20px;"> 
    <table class="table items-table table table-bordered table-striped verticle-middle table-responsive-sm">
      <thead>
        <tr>
          <th class="text-center">No</th>
          <th class="text-center">Username</th>
          <th class="text-center">Nama</th>
          <th class="text-center">Alamat</th>
          <th class="text-center">Telepon</th>
          <th class="text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no=1;
        foreach ($winsen as $w){
          ?>
          <tr>
            <th class="text-center"><?php echo $no++ ?></th>
            <td class="text-capitalize text-center"><?php echo $w->username?></td>
            <td class="text-capitalize text-center"><?php echo $w->nama_pekerja?></td>
            <td class="text-capitalize text-center"><?php echo $w->alamat?></td>
            <td class="text-capitalize text-center"><?php echo $w->telepon?></td>
            <td class="text-center">
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                <a class="dropdown-item" href="<?= base_url('/home/reset/'.$w->id_userr)?>"><i class="bx bx-edit-alt me-1"></i> Reset Password</a>
                    <a class="dropdown-item" href="<?= base_url('/home/edit_pekerja/'.$w->id_userr)?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                    <a class="dropdown-item" href="<?= base_url('/home/hapus_pekerja/'.$w->id_userr)?>"><i class="bx bx-trash me-1"></i> Hapus</a>
                    </div>
                  </div>
                </td>
              </tr>
            <?php }?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

