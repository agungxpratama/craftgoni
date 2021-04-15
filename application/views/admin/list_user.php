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
        <h1 class="h3 mb-0 text-gray-800">User</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" type="button" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah</a> -->
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Tambah Barang</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="<?= base_url()?>index.php/admin/tambah_barang" method="post" enctype="multipart/form-data">
                <div class="modal-body">
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
            <h6 class="m-0 font-weight-bold text-primary">Tabel Data User</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Lengkap</th>
                        <th>Username</th>
                        <th>Gambar</th>
                        <th>Email</th>
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
                    foreach ($user as $u):
                        $no++;
                    ?>
                        <tr>
                            <th><?= $no;?></th>
                            <th><?= $u->nama_user;?></th>
                            <th><?= $u->username;?></th>
                            <th><img src="<?= base_url('assets_admin/'.$u->foto); ?>" width="100" height="100"></th>
                            <th><?= $u->email;?></th>
                            <td>
                                <a href="<?= base_url('index.php/admin/view_profile/');?><?= $u->id_user;?>" class="btn btn-warning" data-toggle="modal" data-target="#modal_user<?= $u->id_user ?>"><i class="fas fa-fw fa-search"></i> Cek</a>
                                <div class="modal fade" tabindex="-1" role="dialog" id="modal_user<?= $u->id_user ?>">
                                    <form class="" action="<?= base_url()?>index.php/admin/update_password" method="post">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title">Data User</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                              <div class="form-group">
                                                  <label for="FormControl">Nama</label>
                                                  <p id="FormControl"><?= $u->nama_user;?></p>
                                                  <!-- <input type="text" class="form-control bg-light border-1 small" placeholder="Masukan Nomor Resi Pengiriman" name="resi" aria-label="noREsi" aria-describedby="basic-addon2"> -->
                                              </div>
                                              <div class="form-group">
                                                  <label for="FormControl">Passowrd</label>
                                                  <input type="text" class="form-control bg-light border-1 small" name="password" value="" placeholder="Type new Passowrd"><br>
                                                  <input type="text" class="form-control bg-light border-1 small" name="password" value="" placeholder="Retype new Passowrd">
                                                  <p id="FormControl"><?= $u->alamat;?></p>
                                                  <!-- <input type="text" class="form-control bg-light border-1 small" placeholder="Masukan Nomor Resi Pengiriman" name="resi" aria-label="noREsi" aria-describedby="basic-addon2"> -->
                                              </div>
                                              <div class="form-group">
                                                  <label for="FormControl">E-Mail</label>
                                                  <p id="FormControl"><?= $u->email;?></p>
                                                  <!-- <input type="text" class="form-control bg-light border-1 small" placeholder="Masukan Nomor Resi Pengiriman" name="resi" aria-label="noREsi" aria-describedby="basic-addon2"> -->
                                              </div>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                              <!-- <button type="submit" class="btn btn-primary">Save changes</button> -->
                                            </div>
                                          </div>
                                        </div>
                                    </form>

                                </div>
                                <!-- <a href="<?= base_url('index.php/admin/hapus_barang/');?><?= $u->id_user;?>" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i> Hapus</a> -->
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
