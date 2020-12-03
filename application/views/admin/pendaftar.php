<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Apartemen Tamansari Urban Sky</h1>
            <div class="row">
              
              </div>
            </div>
          </div>
    <div class="container">

      <div class="card o-hidden border-0 shadow-lg my-5 col-lg-12 mx-auto">
        <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Tabel Data Prospek</h1>
                <button data-toggle="modal" data-target="#cetak_kegiatan" class="btn btn-success">Unduh Data ke Excel <i class="fas fa-print"></i></button>
                <?= $this->session->flashdata('flash') ?>
                <?= validation_errors()?>
                <div style="overflow-x : scroll;">
                <div class = "text-right">
                

                <br>
                <br>
                <br>

                <table id="myTable" class="table">
                    <thead>
                        <th>No</th>
                        <th>Nama Sales</th>
                        <th>Jenis Event</th>
                        <th>Nama</th>
                        <th>No Telepon</th>
                        <th>Alamat</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                        <th>Hapus</th>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach($pendaftar as $p) :?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $p['nama_sales'] ?></td>
                            <td><?= $p['jenis_event'] ?></td>
                            <td><?= $p['name'] ?></td>
                            <td><?= $p['no_tlp'] ?></td>
                            <td><?= $p['alamat'] ?></td>
                            <td><?= $p['tanggal'] ?></td>
                            <td><?= $p['keterangan'] ?></td>
                            <td><?= $p['status'] ?></td>
                            <td>      
                            <a href="<?= base_url() ?>admin/delete_konsumen/<?= $p['id'] ?>" class="btn btn-danger"><i class="fas fa-ban"></i> </a>       
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
<div class="modal fade" id="cetak_kegiatan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <?= form_open_multipart('admin/export_excel_prospek')?>
          <form action="<?= base_url()?>admin/export_excel_prospek" method="post" >
          <table>
            <tr>
              <td>
                <div class="form-group">Dari Tanggal</div>
              </td>
              <td align="center" width="5%">
                <div class="form-group">:</div>
              </td>
              <td>
                <div class="form-group">
                  <input type="date" class="form-control" name="tgl_awal" id="tgl_awal" required>
                  </div>
                </td>
                </tr><td>
                <div class="form-group">Sampai Tanggal</div>
          </td>
          <td align="center" width="5%">
                <div class="form-group">:</div>
          </td>
          <td>
                <div class="form-group">
                          <input type="date" class="form-control" name="tgl_akhir" id="tgl_akhir" required>
                  </div>
                </td>
                </div>
                </table>
</div>
</div>

      
        <div class="modal-footer">
        <button type="submit" class="btn btn-success">Unduh Data Ke Excel</button>
          
          </div>
          </div>
          </div>
  </div>
</form>
 
 