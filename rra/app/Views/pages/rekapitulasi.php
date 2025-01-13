<?= $this->section('content'); ?>
<style>
    .center .content-1 {
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

    table {
        border-collapse: collapse;
        width: 100%;
        white-space: nowrap;
    }
    th, td {
    padding: 15px 15px !important; 
    margin-left: 15px !important;
    text-align: left !important;
    }
    .table-responsive {
        color: black;
    }
    .trRekap1 {
        text-align: left;
    }
    .trRekap {
        padding: 20px;
        text-align: center;
    }
    .btn-group .custom-button {
            background-color: #3088CF;
            color: white; /* Sesuaikan dengan kebutuhan Anda */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            margin-bottom: 10px;
            
            }
    .btn-group .custom-button:hover {
    background-color: #0F6AB7; /* Warna saat tombol dihover */
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

<div class="center">
    <div class="content-1">
        <div class="header-text d-flex justify-content-between align-items-center"> <!-- Tambahkan d-flex, justify-content-between, dan align-items-center -->
            <h4 style="margin-bottom: 5px; font-weight: 700;" >Rekapitulasi</h4>

            <div class="btn-group">
                <button type="button" class="btn custom-button dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                    <i class="fas fa-file"></i> &nbsp; Export
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item has-icon" href="#"><i
                                class="fas fa-file-excel"></i> &nbsp;&nbsp; Export PDF</a>
                    <a class="dropdown-item has-icon" href="<?=site_url('pages/exportExcelRekapitulasi')?>">
                        <i class="fas fa-file-import"></i> &nbsp; Export Excel</a>
                </div>
            </div>
        </div>
            
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

            <br>
            <div class="content-table">
                <ul class="nav nav-tabs" id="rekap-table" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="rekap-main-tab" data-toggle="tab" href="#rekap-main" role="tab">
                            Rekap Main
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="rekap-month-tab" data-toggle="tab" href="#rekap-month" role="tab">
                            Rekap Month
                        </a>
                    </li>
                </ul>
                <br>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="rekap-main" role="tabpanel">
                        <div class="table-responsive">
                            <br>
                            <table id="tabelrekap-main" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="trRekap">ID</th>
                                        <th class="trRekap">Beban</th>
                                        <th class="trRekap">Section</th>
                                        <th class="trRekap">GL Account</th>
                                        <th class="trRekap">RKA</th>
                                        <th class="trRekap">Geser Anggaran</th>
                                        <th class="trRekap">Nilai Pekerjaan</th>
                                        <th class="trRekap">Realisasi</th>
                                        <th class="trRekap">Sisa Belum</th>
                                        <th class="trRekap">Rencana Program</th>
                                        <th class="trRekap">Sisa RKA</th>
                                        <th class="trRekap">Estimasi Sisa</th> 
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $counter=1; 
                                    foreach ($rekapitulasi as $row): ?>
                                    <tr>
                                        <td><?= $counter++; ?></td>
                                        <td class="trRekap1"><?= $row['beban']; ?></td>
                                        <td class="trRekap1"><?php $unitKey = key($unit[$row['id_unit']]);
                                            echo $unit[$row['id_unit']][$unitKey]['nama_unit'];
                                            ?>
                                        </td>
                                        <td><?php $glAccountKey = key($gl_account[$row['id_akun']]);
                                            echo $gl_account[$row['id_akun']][$glAccountKey]['gl_account'];
                                            ?>
                                        </td>
                                        <td class="trRekap"><?= number_format($row['rka'], 0, ',', '.'); ?></td>
                                        <td class="trRekap"><?= number_format($row['geser_anggaran'], 0, ',', '.'); ?></td>
                                        <td class="trRekap"><?= number_format($row['nilai_pekerjaan'], 0, ',', '.'); ?></td>
                                        <td class="trRekap"><?= number_format($row['bulan'], 0, ',', '.'); ?></td>
                                        <td class="trRekap"><?= number_format($row['sisa_belum'], 0, ',', '.'); ?></td>
                                        <td class="trRekap"><?= number_format($row['rencana_program'], 0, ',', '.'); ?></td>
                                        <td class="trRekap"><?= number_format($row['sisa_rka'], 0, ',', '.'); ?></td>
                                        <td class="trRekap"><?= number_format($row['estimasi_sisa'], 0, ',', '.'); ?></td>
    
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="rekap-month" role="tabpanel">
                        <div class="table-responsive">
                            <br>
                            <table id="tabelrekap-month" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Beban</th>
                                        <th>Section</th>
                                        <th>GL_Account</th>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $counter=1; 
                                    foreach ($rekapitulasi as $row): ?>
                                    <tr>
                                        <td><?= $counter++; ?></td>
                                        <td><?= $row['beban']; ?></td>
                                        <td class="trRekap1"><?php $unitKey = key($unit[$row['id_unit']]);
                                            echo $unit[$row['id_unit']][$unitKey]['nama_unit'];
                                            ?>
                                        </td>
                                        <td><?php $glAccountKey = key($gl_account[$row['id_akun']]);
                                            echo $gl_account[$row['id_akun']][$glAccountKey]['gl_account'];
                                            ?>
                                        </td>
                                        <td class="trRekap"><?= number_format($row['rka'], 0, ',', '.'); ?></td>
                                        <td class="trRekap"><?= number_format($row['januari'], 0, ',', '.'); ?></td>
                                        <td class="trRekap"><?= number_format($row['februari'], 0, ',', '.'); ?></td>
                                        <td class="trRekap"><?= number_format($row['maret'], 0, ',', '.'); ?></td>
                                        <td class="trRekap"><?= number_format($row['april'], 0, ',', '.'); ?></td>
                                        <td class="trRekap"><?= number_format($row['mei'], 0, ',', '.'); ?></td>
                                        <td class="trRekap"><?= number_format($row['juni'], 0, ',', '.'); ?></td>
                                        <td class="trRekap"><?= number_format($row['juli'], 0, ',', '.'); ?></td>
                                        <td class="trRekap"><?= number_format($row['agustus'], 0, ',', '.'); ?></td>
                                        <td class="trRekap"><?= number_format($row['september'], 0, ',', '.'); ?></td>
                                        <td class="trRekap"><?= number_format($row['oktober'], 0, ',', '.'); ?></td>
                                        <td class="trRekap"><?= number_format($row['november'], 0, ',', '.'); ?></td>
                                        <td class="trRekap"><?= number_format($row['desember'], 0, ',', '.'); ?></td>
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
<script>
    $(document).ready(function() {
        $('#tabelrekap-main').DataTable();
        $('#tabelrekap-month').DataTable();
    });
</script>

<?= $this->endSection(); ?>
