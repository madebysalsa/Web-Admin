

<!-- Page Heading -->
          

<div class="card o-hidden border-0 shadow-lg my-5 col-lg-12 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row justify-content-center">
          
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Perbarui Data Sales</h1>
                <?= $this->session->flashdata('flash') ?>
                <?= validation_errors()?>
                <div style="overflow-x : scroll;">
                
                
                <div class="container">
                <?= form_open_multipart('admin/data_sales'.$nama['name'])?>
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" value="<?= $nama['nama']?>" class="form-control">
            <?= form_error('nama','<small class="text-danger">','</small>')?>
          </div>
          <div class="form-group">
            <label for="username">Nama Pengguna</label>
            <input type="text" name="username" id="username" value="<?= $gambar['username']?>" class="form-control">
            <?= form_error('username','<small class="text-danger">','</small>')?>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="text" name="password" id="password" value="<?= $gambar['password']?>" class="form-control">
            <?= form_error('password','<small class="text-danger">','</small>')?>
          </div>
          <div class="form-group">
            <label for="c_password">Konfirmasi Password</label>
            <input type="text" name="c_password" id="c_password" value="<?= $gambar['c_password']?>" class="form-control">
            <?= form_error('c_password','<small class="text-danger">','</small>')?>
          </div>
          <div class="form-group">
            <button class="btn btn-success">Edit</button>
          </div>
          
          </div>
              </div></div>
                
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>