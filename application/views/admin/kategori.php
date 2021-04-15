<!-- Begin Page Content -->
<div class="container-fluid">
        <?php if ($this->session->flashdata('success')): ?>
    		<div class="alert alert-success" role="alert">
    			<?php echo $this->session->flashdata('success'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
    		</div>
    	<?php endif; ?>
        <?php if ($this->session->flashdata('error')): ?>
    		<div class="alert alert-danger" role="alert">
    			<?php echo $this->session->flashdata('error'); ?>
    		</div>
    	<?php endif; ?>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kategori</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" type="button" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah</a>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Tambah Kategori</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="<?= base_url()?>index.php/admin/tambah_kategori" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                      <div class="form-group">
                          <label for="exampleFormControlInput1">Nama Kategori</label>
                          <input type="text" class="form-control bg-light border-1 small" placeholder="Masukan Nama Kategori" name="nama_kategori" aria-label="namaKategori" aria-describedby="basic-addon2">
                      </div>
                      <div class="form-group">
                          <label for="exampleFormControlInput1">Keterangan Kategori</label>
                          <input type="text" class="form-control bg-light border-1 small" placeholder="Keterangan" name="keterangan" aria-label="keterangan" aria-describedby="basic-addon2">
                      </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </form>
              </div>
            </div>
            </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Kategori</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Kategori</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <!-- <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Nama Barang</th>
                        <th>Gambar</th>
                        <th>Detail Barang</th>
                        <th>Kategori</th>
                        <th>Jenis Barang</th>
                        <th>Harga Barang</th>
                        <th>Action</th>
                    </tr>
                    </tfoot> -->
                    <tbody>
                    <?php
                    $no = 0;
                    foreach ($kategori as $k):
                        $no++;
                    ?>
                        <tr>
                            <th><?= $no;?></th>
                            <th><?= $k->nama_kategori;?></th>
                            <th><?= $k->keterangan;?></th>
                            <!-- <th><img src="<?= base_url('assets_admin/'); ?>" width="100" height="100"></th> -->
                            <td>
                                <a href="<?= base_url('index.php/admin/view_kategori/');?><?= $k->id_kategori;?>" class="btn btn-warning"><i class="fas fa-fw fa-search"></i> Cek</a>
                                <a href="<?= base_url('index.php/admin/hapus_kategori/');?><?= $k->id_kategori;?>" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
