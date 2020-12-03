

<!-- Page Heading -->
          

<div class="card o-hidden border-0 shadow-lg my-5 col-lg-12 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Data Login Sales</h1>
                <button data-toggle="modal" data-target="#upload_gambar" class="btn btn-primary">Tambah Data <i class="fas fa-plus"></i></button>
                <?= $this->session->flashdata('flash') ?>
                <?= validation_errors()?>
                <div style="overflow-x : scroll;">
                
                <table id="myTable" class="table">
                <thead>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Nama Pengguna (Username)</th>
                        <th>Password</th>
                        
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach($data_sales as $p) :?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $p['name'] ?></td>
                            <td><?= $p['jabatan'] ?></td>
                            <td><?= $p['username'] ?></td>
                            <td><?= $p['password'] ?></td>
                            
                            <td>
                            <!--  <a href="<?= base_url() ?>admin/edit_sales/<?= $p['id'] ?>" class="btn btn-success"><i class="fas fa-pen"></i> </a> -->   
                            <a href="<?= base_url() ?>admin/delete_sales_login/<?= $p['id'] ?>" class="btn btn-danger"><i class="fas fa-ban"></i> </a>
                        </td>
                        </tr>
                        <?php endforeach?>
                    </tbody>
                </table>
              </div></div>
                
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Tambah Modal-->
  <div class="modal fade" id="upload_gambar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Apartemen Tamansari Urban Sky</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container">
          <?= form_open_multipart('admin/data_sales')?>
          <div class="form-group">
            <label for="kategori">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control">
            <?= form_error('nama','<small class="text-danger">','</small>')?>
          </div>
          <div class="form-group">
            <label for="keterangan">Jabatan</label>
            <input type="text" name="jabatan" id="jabatan" class="form-control">
            <?= form_error('jabatan','<small class="text-danger">','</small>')?>
          </div>
          <div class="form-group">
            <label for="keterangan">Nama Pengguna</label>
            <input type="text" name="username" id="username" class="form-control">
            <?= form_error('username','<small class="text-danger">','</small>')?>
          </div>
          <div class="form-group">
            <label for="keterangan">Password</label>
            <input type="text" name="password" id="password" class="form-control">
            <?= form_error('password','<small class="text-danger">','</small>')?>
          </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="submit" >Tambah</button>
        </div>
      </div>
    </div>
  </div>

  </form>