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
          <h1 class="h3 mb-0 text-gray-800">Data User</h1>
          <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" type="button" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah</a> -->
        </div>
        <!-- Content Row -->
          <!-- Page Heading -->
          <!-- <h1 class="h3 mb-2 text-gray-800">Data Obat</h1>
          <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tabel Data Pengguna</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Pengguna</th>
                        <th>No Telepon</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Foto</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    // print_r($transaksi);
                    $no = 1;
                    foreach ($user as $u): ?>
                        <tr>
                            <td><?= $no++;?></td>
                            <!-- <td><?= $t->id_transaksi;?></td> -->
                            <td><?= $u->nama_user;?></td>
                            <td><?= $u->username;?></td>
                            <td><?= $u->email;?></td>
                            <td><?= $u->alamat;?></td>
                            <td><img src="<?= base_url('assets_admin/'.$u->foto); ?>" width="100" height="100"></td>
                            <td>
                                <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#modal_user<?= $u->id_user ?>"><i class="fas fa-fw fa-search"></i> Cek</a>
                                <div class="modal fade" tabindex="-1" role="dialog" id="modal_user<?= $u->id_user ?>">
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
                                              <label for="FormControl">Alamat</label>
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
                                </div>
                                <!-- <a href="<?= base_url('index.php/admin/detailTransaksi/');?><?= $u->id_user;?>" class="btn btn-warning"><i class="fas fa-fw fa-search"></i> Cek</a> -->
                                <!-- <a href="<?= base_url('index.php/admin/hapusObat/');?><?= $u->id_user;?>" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i> Hapus</a> -->
                            </td>
                        </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
