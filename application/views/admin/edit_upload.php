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
                <h1 class="h4 text-gray-900 mb-4">Table Kegiatan Sales</h1>
                <div style="overflow-x : scroll;">
                <table id="myTable" class="table">
                    <thead>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Jenis Kelamin</th>
                        <th>Jenis Event</th>
                        <th>Tanggal</th>
                        <th>Hapus</th>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach($edit_upload as $p) :?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $p['nama_sales'] ?></td>
                            <td><?= $p['jabatan'] ?></td>
                            <td><?= $p['jenis_kel'] ?></td>
                            <td><?= $p['jenis_kegiatan'] ?></td>
                            <td><?= $p['tanggal'] ?></td>
                            <td>      
                            <a href="<?= base_url() ?>admin/delete_sales/<?= $p['id'] ?>" class="btn btn-danger"><i class="fas fa-ban"></i> </a>
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

 