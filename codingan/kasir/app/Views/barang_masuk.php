<div class="col-lg-12">
<div class="card custom-card">
  <div class="card-body">
    <a href="<?= base_url('/home/tambah_bm/')?>"><button class="btn btn-success"><i class="fa fa-plus"></i> Tambah</button></a>
  </a>
  <div class="table-responsive custom-table" style="margin-top: 20px;"> 
    <table class="table items-table table table-bordered table-striped verticle-middle table-responsive-sm">
      <thead>
        <tr>
          <th class="text-center">No</th>
          <th class="text-center">Barang</th>
          <th class="text-center">Stok</th>
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
            <td class="text-capitalize text-center"><?php echo $w->barang?></td>
            <td class="text-capitalize text-center"><?php echo $w->stok?></td>
            <td class="text-center">
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?= base_url('/home/hapus_bm/'.$w->id_bm)?>"><i class="bx bx-trash me-1"></i> Hapus</a>
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

