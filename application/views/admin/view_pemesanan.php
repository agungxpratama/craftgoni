<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Pemesanan</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm" type="button" data-toggle="modal" data-target="#myModal"><i class="fas fa-pen fa-sm text-white-50"></i> Proses</a>
    </div>

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
            <form action="<?= base_url()?>index.php/admin/proses_pesanan" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                  <div class="form-group">
                      <label for="exampleFormControlInput1">Kode Resi</label>
                      <input type="text" class="form-control bg-light border-1 small" placeholder="Masukn Kode Resi Pengiriman" name="kode_resi" aria-label="kode_resi" aria-describedby="basic-addon2" value="">
                    <input type="hidden" name="id_invoice" value="<?= $invoice->id_invoice?>">
                    <input type="hidden" name="id_checkout" value="<?= $invoice->id_checkout?>">
                  </div>
                  <div class="form-group">
                      <label for="exampleFormControlInput1">Kurir</label>
                      <input type="text" class="form-control bg-light border-1 small" placeholder="Masukn Kurir Pengiriman" name="kurir" aria-label="kurir" aria-describedby="basic-addon2" value="">
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
                            <h5 class="font-weight-bold">Notes/Catatan</h5>
                            <p class="text"><?= $invoice->notes; ?></p>
                            <h5 class="font-weight-bold">Harga</h5>
                    <p class="text">Rp. <?= $invoice->total_bayar; ?></p>
                        </div>
                        <div class="col-4 border-left">
                            <h5 class="font-weight-bold">Alamat</h5>
                            <p class="text"><?= $invoice->alamat_jalan; ?></p>
                            <p class="text"><?= $invoice->alamat_kota; ?></p>
                            <p class="text"><?= $invoice->alamat_negara; ?></p>
                        </div>
                        <div class="col-4 border-left">
                            <h5 class="font-weight-bold">Detail Barang</h5>
                            <p class="text"></p>
                            <table class="table">
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Jumlah Barang</th>
                                </tr>
                            <?php
                                foreach ($barang as $b) {
                                    ?>
                                    <tr>
                                    <td><?= $b->nama_barang?></td>
                                    <td><?= $b->jumlah_barang?></td>
                                    </tr>
                                    <?php
                                }
                            ?>
                            </table>
                        </div>
                    </div>
                    <hr>
                    
                    <?php
                             if ($invoice->status == 1): ?>
                                    <div class="badge badge-primary">
                                        Belum dibayar
                                    </div>
                                    -
                                    <div class="badge badge-secondary">
                                        Telah Dibayar
                                    </div>
                                    <div class="badge badge-secondary">
                                        Belum Dikirim
                                    </div>
                                    -
                                    <div class="badge badge-secondary">
                                        Telah Dikirm
                                    </div>
                                    -
                                    <div class="badge badge-secondary">
                                        Selesai
                                    </div>
                                <?php elseif ($invoice->status == 2): ?>
                                    <div class="badge badge-secondary">
                                        Belum dibayar
                                    </div>
                                    -
                                    <div class="badge badge-primary">
                                        Telah Dibayar
                                    </div>
                                    <div class="badge badge-warning">
                                        Belum Dikirim
                                    </div>
                                    -
                                    <div class="badge badge-secondary">
                                        Telah Dikirm
                                    </div>
                                    -
                                    <div class="badge badge-secondary">
                                        Selesai
                                    </div>
                                <?php elseif ($invoice->status == 3): ?>
                                    <div class="badge badge-secondary">
                                        Belum dibayar
                                    </div>
                                    -
                                    <div class="badge badge-secondary">
                                        Telah Dibayar
                                    </div>
                                    <div class="badge badge-secondary">
                                        Belum Dikirim
                                    </div>
                                    -
                                    <div class="badge badge-primary">
                                        Telah Dikirm
                                    </div>
                                    -
                                    <div class="badge badge-secondary">
                                        Selesai
                                    </div>
                                <?php elseif ($invoice->status == 4): ?>
                                    <div class="badge badge-secondary">
                                        Belum dibayar
                                    </div>
                                    -
                                    <div class="badge badge-secondary">
                                        Telah Dibayar
                                    </div>
                                    <div class="badge badge-secondary">
                                        Belum Dikirim
                                    </div>
                                    -
                                    <div class="badge badge-secondary">
                                        Telah Dikirm
                                    </div>
                                    -
                                    <div class="badge badge-success">
                                        Selesai
                                    </div>
                                <?php endif; ?>
                </div>
                <div class="col-3">
                    <img class="w-100" src="<?= base_url('assets_admin/img/bukti_bayar/'.$invoice->bukti_bayar); ?>" alt="img-fotoBarang">
                    
                </div>
            </div>
        </div>
    </div>
</div>
