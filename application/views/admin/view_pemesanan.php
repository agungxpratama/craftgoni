<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Pemesanan</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm" type="button" data-toggle="modal" data-target="#myModal"><i class="fas fa-pen fa-sm text-white-50"></i> Edit</a>
    </div>

    <!-- \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
    <div class="card shadow mb-4 ">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">ID Pemesanan : <?= $invoice->id_invoice;?></h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-8">
                    <h5>Nama Pemesan</h5>
                    <p class="text-lg font-weight-bold text-primary"><?= $invoice->nama_depan; ?> <?= $invoice->nama_belakang; ?> </p>
                    <div class="row border-bottom">
                        <div class="col-4 border-left">
                            <h5 class="font-weight-bold">Total Bayar</h5>
                            <p class="text"><?= $invoice->total_bayar; ?></p>
                            <h5 class="font-weight-bold">Jenis Barang</h5>
                            <p class="text"><?= $b->jenis_barang; ?></p>
                            <h5 class="font-weight-bold">Harga Barang</h5>
                            <p class="text">Rp. <?= $b->harga_barang; ?></p>
                        </div>
                        <div class="col-4 border-left">
                            <h5 class="font-weight-bold">Kategori</h5>
                            <p class="text"><?= $b->kategori; ?></p>
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
                              <form action="<?= base_url()?>index.php/admin/updateStock/<?= $b->id_barang?>" method="post">
                                  <div class="modal-header">
                                      <h5 class="modal-title">Tambah Stok Barang</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body">
                                      <div class="form-group">
                                          <label for="exampleFormControlInput1">Stock Barang</label>
                                          <input type="number" class="form-control bg-light border-1 small" name="stock" value="<?= $b->stock ?>" placeholder="Jumlah...">
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
</div>
