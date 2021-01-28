<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Barang</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm" type="button" data-toggle="modal" data-target="#myModal"><i class="fas fa-pen fa-sm text-white-50"></i> Edit</a>
    </div>
    <?php foreach ($barang as $b): ?>

    <!-- Content Row -->
    <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit Data Barang</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?= base_url()?>index.php/admin/edit_barang/<?= $b->id_barang?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                  <div class="form-group">
                      <label for="exampleFormControlInput1">Nama Barang</label>
                      <input type="text" class="form-control bg-light border-1 small" placeholder="Nama Barang" name="nama_barang" aria-label="namaBarang" aria-describedby="basic-addon2" value="<?= $b->nama_barang?>">
                  </div>
                  <div class="form-group">
                          <label for="exampleFormControlInput1">Nama Barang</label>
                          <input type="text" class="form-control bg-light border-1 small" placeholder="Masukan Nama Barang" name="nama_barang" aria-label="namaBArang" aria-describedby="basic-addon2">
                      </div>
                      <div class="form-group">
                          <label for="exampleFormControlInput1">Gambar</label>
                          <input type="file" class="form-control bg-light border-1 small" placeholder="Keterangan" name="gambar" aria-label="Gambar" aria-describedby="basic-addon2">
                      </div>
                      <div class="form-group">
                          <label for="exampleFormControlInput1">Jenis Barang</label>
                          <input type="text" class="form-control bg-light border-1 small" placeholder="Jenis Barang" name="jenis_barang" aria-label="jenisBarang" aria-describedby="basic-addon2">
                      </div>
                      <div class="form-group">
                          <label for="exampleFormControlInput1">Detail Barang</label>
                          <textarea class="form-control bg-light border-1 small" placeholder="Detail Barang" name="detail_barang" rows="3" cols="80" aria-label="detailBarang" aria-describedby="basic-addon2"></textarea>
                          <!-- <input type="text" class="form-control bg-light border-1 small" placeholder="Kemasan" name="kemasan" aria-label="kemasan" aria-describedby="basic-addon2"> -->
                      </div>
                      <div class="form-group">
                          <label for="exampleFormControlInput1">Harga Barang</label>
                          <input type="text" class="form-control bg-light border-1 small" placeholder="Harga Barang" name="harga_barang" aria-label="hargaBarang" aria-describedby="basic-addon2">
                      </div>
                      <div class="form-group">
                          <label for="exampleFormControlInput1">Kategori</label>
                          <select class="form-control custom-select bg-light small" name="kategori">
                            <option selected>Pilih Kategori Barang</option>
                            <?php
                            //foreach ($sumber as $s) {
                                // code...
                            ?>
                            <option value="<?= '1'//$s->id_sumber; ?>"><?= 'data'//$s->nama_sumber ?></option>
                            <?php //} ?>
                          </select>
                      </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
          </div>
        </div>
    </div>

    <!-- \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
    <div class="card shadow mb-4 ">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Barang : <?= $b->kategori;?></h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-8">
                    <h5>Nama Barang</h5>
                    <p class="text-lg font-weight-bold text-primary"><?= $b->nama_barang; ?></p>
                    <div class="row border-bottom">
                        <div class="col-4 border-left">
                            <h5 class="font-weight-bold">Kategori</h5>
                            <p class="text"><?= $b->kategori; ?></p>
                            <h5 class="font-weight-bold">Jenis Barang</h5>
                            <p class="text"><?= $b->jenis_barang; ?></p>
                            <h5 class="font-weight-bold">Harga Barang</h5>
                            <p class="text">Rp. <?= $b->harga_barang; ?></p>
                        </div>
                        <div class="col-4 border-left">
                            <h5 class="font-weight-bold">Stok</h5>
                            <p class="text"><?= $b->stok; ?></p>
                            <h5 class="font-weight-bold">Stok Terjual</h5>
                            <p class="text"><?= $b->stok_terjual; ?></p>
                        </div>
                        <div class="col-4 border-left">
                            <h5 class="font-weight-bold">Detail Barang</h5>
                            <p class="text"><?= $b->detail_barang; ?></ p>
                        </div>
                    </div>
                    <hr>
                    <h5 class="font-weight-bold">Harga</h5>
                    <p class="text">Rp. <?= $b->harga_barang; ?></p>
                </div>
                <div class="col-3">
                    <img class="w-100" src="<?= base_url('assets_admin/'.$b->gambar); ?>" alt="img-fotoBarang">
                    <button class="btn btn-info w-100" type="button" name="button" data-toggle="modal" data-target="#stockModal">+ Stock</button>
                    <div class="modal fade" tabindex="-1" role="dialog" id="stockModal">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                              <form action="<?= base_url()?>index.php/admin/update_stock/<?= $b->id_barang?>" method="post">
                                  <div class="modal-header">
                                      <h5 class="modal-title">Tambah Stok Barang</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body">
                                      <div class="form-group">
                                          <label for="exampleFormControlInput1">Stock Barang</label>
                                          <input type="number" class="form-control bg-light border-1 small" name="stok" value="<?= $b->stok ?>" placeholder="Jumlah...">
                                      </div>
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                      <button type="submit" class="btn btn-primary">Simpan</button>
                                  </div>
                              </form>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
</div>
