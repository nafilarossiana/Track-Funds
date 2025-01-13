<?= $this->section('content'); ?>
<head>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
</head>
    
<style>
    
    
   .center .content-2 {
        background-color: #fff;
        border-radius: 2px;
        margin: 10px;
        flex-grow: 1;
        padding: 20px;
        margin-left: 40px;
        transition: padding 0.3s ease;
        text-align: justify;
        max-width: 100%;
        height: 100%;
        overflow-x: auto;
        order: 1;
    }

          .center .content-2 .section-header h4{
            font-weight: 700;
          }
          .center .tab-content .active .table-responsive .headermain {
            text-align: center;
            }
          .center .tab-content  .active .table-responsive .headermain span {
            font-size: 18px;
            text-align: center;
            color: #3088CF;
            font-weight: 700;
        }
        .center .content-2 .table .table-header{
            font-size: 16px;
            color: #68A7DA;
            font-weight: 600;
          }
          .table-responsive {
            color:black;
          }
          .table-responsive .table-md{
            color : black;
            font-weight: normal;
          }
          .body-account,
         .body-year {
                display: flex;
                align-items: center;
                z-index: 1;
                
            }
            .body-account{
                margin-top : 10px;
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
            .button-add .custom-button, 
            .button-search .custom-button {
            background-color: #3088CF;
            color: white; /* Sesuaikan dengan kebutuhan Anda */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            }
            .button-add .custom-button:hover, 
            .button-search .custom-button:hover {
            background-color: #0F6AB7; /* Warna saat tombol dihover */
            }
            .center .content-2 .header-text .section-header {
                display: flex;
                flex-direction: column;
                align-items: flex-start; /* Menggeser ke kiri secara horizontal */
                justify-content: flex-start; /* Menggeser ke atas secara vertikal */
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.06);
                background-color: #fff;
                border-radius: 3px;
                border: none;
                position: relative;
                margin-bottom: 10px;
                margin-top: 0;
                height: 80px;
                padding: 20px;
        }

       .center .content-2 .header-text .section-header h4 {
            font-weight: 700;
            margin: 0; /* Hapus margin agar tidak ada ruang tambahan */
        
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
<div class="center">
    <div class="content-2">
    <div class="header-text">
    <div class="header-text d-flex justify-content-between align-items-center">
    <h4 style="margin-bottom: 5px; margin-top:15px; font-weight: 700;">Data Unit Mechanical Facilties</h4>
    <div class="button-data">
                <button type="button" class="btn custom-button" onclick="redirectToPage('/pages/mechanical/dashmechanical')">
                    <i class="fas fa-chart-bar"></i> Chart
                </button>
            </div>
    </div>
        <br>
        <!-- Peringatan Proses Berhasil-->
        <?php if(session()->getFlashdata('success')) : ?>
            <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">x</button>
                    <b>Success !</b>
                    <?= session()->getFlashdata('success') ?>
                </div>
            </div>
        <?php endif; ?>
        <!-- Peringatan Proses Eror-->
        <?php if(session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger alert-dismissible show fade">
                <div class="body">
                    <button class="close" data-dismiss="alert">x</button>
                    <b>Error !</b>
                    <?= session()->getFlashdata('error') ?>
                </div>
            </div>
        <?php endif; ?>
        
        <div class="content-table">
            <ul class="nav nav-tabs" id="mechanical-table" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="mechanical-main-tab" data-toggle="tab" href="#mechanical-main" role="tab">
                     Data Main Mechanical 
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="mechanical-month-tab" data-toggle="tab" href="#mechanical-month" role="tab">
                       Data Month Mechanical
                    </a>    
        </li>
       
            </ul>


            <div class="tab-content">
                <!--- Tabel Rekap -->
                <div class="tab-pane fade" id="mechanical-rekap" role="tabpanel">
                <div class="table-responsive">
                    <br>

                    <div class="table-responsive">
                    <table id="tabelrekap" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    </div>
                </div>
                </div>


                <!--- Tabel List Akun --> 
            <div class="tab-pane fade" id="mechanical-akun" role="tabpanel">
                <div class="table-responsive">
                    <br>

                    <div class="table-responsive">
                    <table id="tabelakun" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    </div>
                </div>
                </div>

                <!-- Data Main--> 
                <div class="tab-pane fade show active" id="mechanical-main" role="tabpanel">
                <div class="table-responsive">
                    <br>
                    <!-- Dropdown Tahun-->
                    <br>
                    <form action="/pages/mechanical/mechanical" method="post">
   <!-- Dropdown Tahun -->
<div class="body-year">
    <label for="tahunSelectMain" class="d-flex align-items-center">
        <i class="fas fa-calendar mr-2"></i> <!-- Ikon kalender -->
        Select Year &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :
    </label>
    <select id="tahunSelectMain" name="tahunSelectMain" class="chosen-select form-control">
        <!-- Opsi default "Semua" jika $tahun tidak memiliki nilai -->
        <option value="all" <?= (empty($tahun) || $tahun == 'all') ? 'selected' : '' ?>>Semua</option>
        
        <?php foreach ($uniqueYears as $tahunValue) : ?>
            <?php if (is_scalar($tahunValue)) : ?>
                <!-- Tambahkan opsi untuk setiap tahun -->
                <option value="<?= $tahunValue ?>" <?= ($tahunValue == $tahun) ? 'selected' : '' ?>><?= $tahunValue ?></option>
            <?php endif; ?>
        <?php endforeach ?>
    </select>
</div>

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

    &nbsp; &nbsp; &nbsp
<!-- Tombol Cari -->
<div class="button-search">
    <button type="submit" class="btn custom-button">
        <i class="fa fa-search"></i>&nbsp; &nbsp; Cari
    </button>
</div>
&nbsp; &nbsp;
<div class="btn-group">
            <button type="button" class="btn custom-button dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                <i class="fas fa-file"></i> &nbsp; Export
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item has-icon" href="#"><i
                            class="fas fa-file-excel"></i> &nbsp;&nbsp; Export PDF</a>
                <a class="dropdown-item has-icon" href="<?=site_url('pages/mechanical/excelmechanical')?>">
                    <i class="fas fa-file-import"></i> &nbsp; Export Excel</a>
            </div>
        </div>
        &nbsp; &nbsp;
        <div class="button-add">
            <button type="button" class="btn custom-button" onclick="redirectToPage('/pages/mechanical/addmechanical')">
                <i class="fa fa-plus"></i>&nbsp; &nbsp; Add
            </button>
        </div>
</div>
</form>

                    <br>
                    <br>
                    <div class="table-responsive">
                    <table id="tabelmain" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th >ID</th>
                                <th>Tahun</th>
                                <th>Unit</th>
                                <th>GL Account</th>
                                <th>Jenis</th>
                                <th>Jenis Kontrak</th>
                                <th>Status</th>
                                <th>No</th>
                                <th>Detail Program</th>
                                <th>RKA</th>
                                <th>Geser</th>
                                <th>Nilai Pekerjaan</th>
                                <th>Realisasi</th>
                                <th>Sisa Belum</th>
                                <th>Nilai Program</th>
                                <th>Sisa RKA</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                             
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $counter=1;
                        foreach ($mechanical as $rc) : 
                            $totalRealisasi = $rc['januari'] + $rc['februari'] + $rc['maret'] + $rc['april'] + $rc['mei'] + $rc['juni'] + $rc['juli'] + $rc['agustus'] + $rc['september'] + $rc['oktober'] + $rc['november'] + $rc['desember'];
                        ?>
                         <tr>
                        <td><?= $counter++; ?></td>
                        <td><?= $rc['tahun']; ?></td>
                        <td><?= $rc['unit']; ?></td>
                        <td><?= $rc['gl_account']; ?></td>
                        <td><?= $rc['jenis']; ?></td>
                        <td><?= $rc['jeniskontrak']; ?></td>
                        <td><?= $rc['status']; ?></td>
                        <td><?= $rc['no']; ?></td>
                        <td><?= $rc['detail_program']; ?></td>
                        <td><?= number_format($rc['rka'], 0, ',', '.'); ?></td> 
                        <td><?= number_format($rc['geser'], 0, ',', '.'); ?></td>
                        <td><?= number_format($rc['nilai_pekerjaan'], 0, ',', '.'); ?></td>
                        <td><?= $rc['realisasi'] ?? 0 ?></td>
                        <td><?= $rc['sisa_belum'] ?? 0 ?></td>
                        <td><?= number_format($rc['nilai_program'], 0, ',', '.'); ?></td>
                        <td><?= $rc['sisa_rka'] ?? 0 ?></td>
                        <td><?= $rc['keterangan']; ?></td>
                        <td>
                                <a href="/pages/editmechanical/<?=$rc['id_mechanical']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                <form action="/pages/mechanical/<?= $rc['id_mechanical']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin akan menghapus data ini?');">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                            </td>
                        </tr>
                     <?php endforeach; ?>
                        </tbody>
                    </table>
                    </div>
                </div>
                </div>
            

              

              <!-- Data Month -->
    <div class="tab-pane fade" id="mechanical-month" role="tabpanel">
    <div class="table-responsive">
        <br>
        <br>
      
        <div class="button-add">
            <button type="button" class="btn custom-button" onclick="redirectToPage('/pages/mechanical/addmechanical')">
                <i class="fa fa-plus"></i>&nbsp; &nbsp; Add
            </button>
        </div>
        <br>
                    <div class="table-responsive">
                    <table id="tabelmonth" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tahun</th>
                                    <th>Unit</th>
                                    <th>GL Account</th>
                                    <th>Jenis</th>
                                    <th>Jenis Kontrak</th>
                                    <th>Status</th>
                                    <th>No</th>
                                    <th>Detail Program</th>
                                    <th>RKA</th>
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
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $counter=1;
                            foreach ($mechanical as $rc) : 
                            ?>
                            <tr>
                            <td><?= $counter++; ?></td>
                            <td><?= $rc['tahun']; ?></td>
                            <td><?= $rc['unit']; ?></td>
                            <td><?= $rc['gl_account']; ?></td>
                            <td><?= $rc['jenis']; ?></td>
                            <td><?= $rc['jeniskontrak']; ?></td>
                            <td><?= $rc['status']; ?></td>
                            <td><?= $rc['no']; ?></td>
                            <td><?= $rc['detail_program']; ?></td>
                            <td><?= number_format($rc['rka'], 0, ',', '.'); ?></td>
                            <td><?= number_format($rc['januari'], 0, ',', '.'); ?></td>
                            <td><?= number_format($rc['februari'], 0, ',', '.'); ?></td>
                            <td><?= number_format($rc['maret'], 0, ',', '.'); ?></td>
                            <td><?= number_format($rc['april'], 0, ',', '.'); ?></td>
                            <td><?= number_format($rc['mei'], 0, ',', '.'); ?></td>
                            <td><?= number_format($rc['juni'], 0, ',', '.'); ?></td>
                            <td><?= number_format($rc['juli'], 0, ',', '.'); ?></td>
                            <td><?= number_format($rc['agustus'], 0, ',', '.'); ?></td>
                            <td><?= number_format($rc['september'], 0, ',', '.'); ?></td>
                            <td><?= number_format($rc['oktober'], 0, ',', '.'); ?></td>
                            <td><?= number_format($rc['november'], 0, ',', '.'); ?></td>
                            <td><?= number_format($rc['desember'], 0, ',', '.'); ?></td>
                                                <td><?= $rc['keterangan']; ?></td>
                            <td>
                                <a href="/pages/editmechanical/<?=$rc['id_mechanical']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                <form action="/pages/mechanical/<?= $rc['id_mechanical']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin akan menghapus data ini?');">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                            </td>
                            </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>


<script>
    $(document).ready(function() {
   
        new DataTable("#tabelmain");
        new DataTable("#tabelmonth");
        new DataTable("#tabelakun");
        new DataTable("#tabelrekap");
});
</script>
<script>
  function updateFileName() {
    var input = document.getElementById('rka_excel');
    var label = document.querySelector('.custom-file-label');
    var fileName = input.files[0].name;
    label.textContent = fileName;
  }
</script>
<script>
    function redirectToPage(page) {
        window.location.href = page;
    }
</script>
<script>
       $(".chosen-select").chosen({no_results_text: "Oops, nothing found!"});
</script>








<?= $this->endSection(); ?>

