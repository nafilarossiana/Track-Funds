<?= $this->section('content'); ?>
<head>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
</head>
<style>
    .content-1 {
       background-color: #fff;
        border-radius: 2px;
        margin: 5px;
        flex-grow: 1;
        padding-left: 50px;
        margin-top: 30px;
        transition: padding 0.3s ease;
        text-align: justify;
        max-width: 100%;
        height: 100%;
        overflow-x: auto;
        order: 1;
    }
    table {
        border-collapse: collapse;
        width: 100%;
        white-space: nowrap;
    }
    th, td {
        padding: 20px;
        text-align: left;
    }

    .center .content-1 .btn-group {
        position: relative;
        display: inline-block;
        color: #68A7DA;
    }

    .center .content-1 h4 {
        font-weight: 700;
    }
    .table-responsive {
        color: black;
    }

    .table-responsive .table-md {
        color: black;
        font-weight: normal;
    }

    .body-account,
         .body-year {
                display: flex;
                align-items: center;
                
            }
            .body-year span{
                
                margin-left : 5px;
                align-self: center;
                
            }

            .body-year label {
                margin-right: 10px; /* Menyesuaikan dengan margin-right pada .body-account label */
                text-align: center;
                height: 100%;
                color: black;
                align-items: center; 
                
            }

            .body-year select {
                width: 200px;
                height: 30px; 
                margin-left: 0;
                
            }
            .body-account label{
                margin-right: 10px;
                text-align: center;
                align-items: center;
                height: 100%;
                color: black; /* Atur margin kanan agar lebih terpisah dari dropdown */
            }

            .body-account select {
                width: 400px;
                height: 30px; /* Sesuaikan lebar dropdown sesuai kebutuhan */
            }
            .center .content-1.section-header{
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.06);
            margin-top: 5px;
            }
      .section-header h4 {
            font-weight: 700;
            margin-top: 25px;
        }
        .button-data .custom-button {
            background-color: #3088CF;
            color: white; /* Sesuaikan dengan kebutuhan Anda */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            }
    .button-data .custom-button:hover {
    background-color: #0F6AB7; /* Warna saat tombol dihover */
    }
    .btn-group .custom-button {
            background-color: #3088CF;
            color: white; /* Sesuaikan dengan kebutuhan Anda */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            }
    .btn-group .custom-button:hover {
    background-color: #0F6AB7; /* Warna saat tombol dihover */
    }
    
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

<div class="center">
    <div class="content-1">
        <div class="section-header">
            <h4 style="margin-bottom: 15px;">Rencana Kerja Anggaran  </h4>
        </div>

      
        <!-- Peringatan Proses Berhasil-->
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">x</button>
                    <b>Success !</b>
                    <?= session()->getFlashdata('success') ?>
                </div>
            </div>
        <?php endif; ?>
        <!-- Peringatan Proses Eror-->
        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger alert-dismissible show fade">
                <div class="body">
                    <button class="close" data-dismiss="alert">x</button>
                    <b>Error !</b>
                    <?= session()->getFlashdata('error') ?>
                </div>
            </div>
        <?php endif; ?>
        <br>
        <form action="/pages/rkacoba" method="post">
   <!-- Dropdown Tahun -->
   
<!-- Dropdown GL Account -->
<div class="body-account">
    <label for="accountSelectMain" class="d-flex align-items-center">
        <i class="fas fa-user mr-2"></i> 
        Select GL-Account :
    </label>
    <select id="accountSelectMain" name="accountSelectMain" class="chosen-select form-control">
        <!-- Opsi default "Semua" jika $gl_account tidak memiliki nilai -->
        <option value="all" <?= (empty($gl_account) || $gl_account == 'all') ? 'selected' : '' ?>>Semua</option>
        
        <?php foreach ($uniqueAccount as $akunValue) : ?>
            <?php if (is_scalar($akunValue)) : ?>
                <!-- Tambahkan opsi untuk setiap GL account -->
                <option value="<?= $akunValue ?>" <?= ($akunValue == $gl_account) ? 'selected' : '' ?>><?= $akunValue ?></option>
            <?php endif; ?>
        <?php endforeach ?>
    </select>

    &nbsp; &nbsp; &nbsp; &nbsp;
<!-- Tombol Cari -->
<div class="button-data">
    <button type="submit" class="btn custom-button">
        <i class="fa fa-search"></i>&nbsp; &nbsp; Cari
    </button>
</div>

&nbsp; &nbsp;
<div class="btn-group">
            <button type="button" class="btn custom-button dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                <i class="fas fa-file"></i> &nbsp; Import Excel
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item has-icon" href="<?= base_url('Template RKA.xlsx') ?>"><i
                            class="fas fa-file-excel"></i> &nbsp;&nbsp; Download Template</a>
                <a class="dropdown-item has-icon" href="" data-toggle="modal" data-target="#modal-uploadfile">
                    <i class="fas fa-file-import"></i> &nbsp; Upload File</a>
            </div>
        </div></div>

</form>
        <br>
        <br>
        <div class="table-responsive">
            <table id="tabelrka" class="table table-striped" style="width:100%">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Tahun</th>
                    <th>Unit</th>
                    <th>Kode</th>
                    <th>MA</th>
                    <th>GL Account</th>
                    <th>Keterangan</th>
                    <th>Detail Program</th>
                    <th>Qty</th>
                    <th>Uom</th>
                    <th>Satuan</th>
                    <th>Angka</th>
                    <th>Jumlah</th>
                    <th>Januari</th>
                    <th>Februari</th>
                    <th>Maret</th>
                    <th>April</th>
                    <th>Mei</th>
                    <th>Juni</th>
                    <th>Juli</th>
                    <th>Agustus</th>
                    <th>September</th>
                    <th>Oktober</th>
                    <th>November</th>
                    <th>Desember</th>
                </tr>
                </thead>
                <tbody>
                <?php 
$counter = 1;
foreach ($rkacoba as $rc) : ?>
    <tr>
        <td><?= $counter++; ?></td>
        <td><?= $rc['tahun']; ?></td>
        <td><?= $rc['unit']; ?></td>
        <td><?= $rc['kode']; ?></td>
        <td><?= $rc['ma']; ?></td>
        <td><?= $rc['gl_account']; ?></td>
        <td><?= $rc['keterangan']; ?></td>
        <td><?= $rc['detail_program']; ?></td>
        <td><?= $rc['qty']; ?></td>
        <td><?= $rc['uom']; ?></td>
        <td><?= number_format(floatval($rc['nilaisatuan']), 0, ',', '.'); ?></td>
<td><?= number_format(floatval($rc['angka']), 0, ',', '.'); ?></td>
<td><?= number_format(floatval($rc['jumlah']), 0, ',', '.'); ?></td>
<td><?= number_format(floatval($rc['januari']), 0, ',', '.'); ?></td>
<td><?= number_format(floatval($rc['februari']), 0, ',', '.'); ?></td>
<td><?= number_format(floatval($rc['maret']), 0, ',', '.'); ?></td>
<td><?= number_format(floatval($rc['april']), 0, ',', '.'); ?></td>
<td><?= number_format(floatval($rc['mei']), 0, ',', '.'); ?></td>

        <td><?= number_format($rc['juni'], 0, ',', '.'); ?></td>
        <td><?= number_format($rc['juli'], 0, ',', '.'); ?></td>
        <td><?= number_format($rc['agustus'], 0, ',', '.'); ?></td>
        <td><?= number_format($rc['september'], 0, ',', '.'); ?></td>
        <td><?= number_format($rc['oktober'], 0, ',', '.'); ?></td>
        <td><?= number_format($rc['november'], 0, ',', '.'); ?></td>
        <td><?= number_format($rc['desember'], 0, ',', '.'); ?></td>
    </tr>
<?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script>
    new DataTable('#tabelrka');
</script>

<div class="modal fade" id="modal-uploadfile" tabindex="-1" role="dialog" aria-labelledby="modal-uploadfileTitle"
     aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-uploadfileTitle">Import Excel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/pages/importexcel" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <label>File Excel</label>
          <div class="custom-file">
            <?= csrf_field() ?>
            <input type="file" name="rka_excel" class="custom-file-input" id="rka_excel" required onchange="updateFileName()">
            <label for="rka_excel" class="custom-file-label">Choose File</label>
          </div>
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Upload</button>
        </div>
      </form>
    </div>
  </div>
    <!-- ... Rest of the modal content ... -->
</div>

<!-- Untuk menampilkan judul file-->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>

<script>
    function updateFileName() {
        var input = document.getElementById('rka_excel');
        var label = document.querySelector('.custom-file-label');
        var fileName = input.files[0].name;
        label.textContent = fileName;
    }
</script>
<script>
       $(".chosen-select").chosen({no_results_text: "Oops, nothing found!"});
</script>


<?= $this->endSection(); ?>
