<div class="col-lg-12">
<div class="card custom-card">
  <div class="card-body">
  <div class="table-responsive custom-table" style="margin-top: 20px;"> 
    <table class="table items-table table table-bordered table-striped verticle-middle table-responsive-sm">
      <thead>
        <tr>
          <th class="text-center">No</th>
          <th class="text-center">Username</th>
          <th class="text-center">Nama</th>
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
            <td class="text-capitalize text-center"><?php echo $w->nama_pelanggan?></td>
            <td class="text-capitalize text-center"><?php echo $w->telepon?></td>
            <td class="text-center">
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                <a class="dropdown-item" href="<?= base_url('/home/resett/'.$w->id_userr)?>"><i class="bx bx-edit-alt me-1"></i> Reset Password</a>
                    <a class="dropdown-item" href="<?= base_url('/home/hapus_pelanggan/'.$w->id_userr)?>"><i class="bx bx-trash me-1"></i> Hapus</a>
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

