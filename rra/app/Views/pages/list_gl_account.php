<?= $this->section('content'); ?>
<style>
    .content-1 {
      background-color: #fff;
        border-radius: 2px;
        margin: 10px;
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

    .center .content-1 .section-header {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.06);
        background-color: #fff;
        border-radius: 3px;
        border: none;
        position: relative;
        margin-bottom: 10px;
        margin-top: 10px;
        padding: 20px;
        display: flex;
        align-items: center;
  
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
            .center .content-1 .header-text .section-header {
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

        .header-text .section-header h4 {
            font-weight: 700;
            margin: 0; /* Hapus margin agar tidak ada ruang tambahan */
        }

        
        .button-add .custom-button {
            background-color: #3088CF;
            color: white; /* Sesuaikan dengan kebutuhan Anda */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100px;
            margin-top: 0;
            }
        .modal-header{
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
        .modal-header .tulisan,
        .modal-header .tulisan h5{
            text-align: left;
            margin-right : auto;
            font-weight:bold;
            margin-bottom: -10px;
        }
        .modal-header .modal-desc{
            margin: 0;
            font-size: 15px;
        }
        .button-add .custom-button {
            background-color: #3088CF;
    color: white;
    border: none;
    width : 100px;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 0px;
    margin-bottom: 10px;
    padding: 6px 12px;
            }
            .button-add .custom-button:hover {
    background-color: #0F6AB7 !important; /* Tambahkan !important untuk memprioritaskan aturan ini */
}

            .button-add .btn-group .custom-button {
    background-color: #3088CF;
    color: white;
    border: none;
    width : 120px;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 0px;
    margin-bottom: 10px;
    padding: 6px 12px; /* Atur padding sesuai kebutuhan */
}

.button-add .btn-group .custom-button:hover {
    background-color: #0F6AB7 !important; /* Warna saat tombol dihover */
    }
    .header-color {
    background: linear-gradient(93deg, #3088CF 0%, #92C044 100%, #B9B9B9 100%);
    color: white; /* Menyesuaikan warna teks dengan latar belakang */
}




</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

<div class="center">
    <div class="content-1">
        <div class="header-text">
            <div class="section-header">
                <h4 style="margin-bottom: 1px;">Data Gl Account </h4>
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
            
            <div class="button-add">
                <button type="button" class="btn custom-button" data-toggle="modal" data-target="#modalAdd">
                    <i class="fa fa-plus"></i>&nbsp; &nbsp; Add
                </button>

                <!-- Tombol Export -->
                <div class="btn-group">
                    <button type="button" class="btn custom-button dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-file"></i> &nbsp; Export
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item has-icon" href="#"><i class="fas fa-file-excel"></i> &nbsp;&nbsp; Export PDF</a>
                        <a class="dropdown-item has-icon" href="<?= site_url('pages/exportExcelGLAccount') ?>"><i class="fas fa-file-import"></i> &nbsp; Export Excel</a>
                    </div>
                </div>
            </div>
            <br>

            <!-- Dropdown Import Upload--> 
            <div class="table-responsive">
                <table id="tabelglaccount" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Kode</th>
                            <th>Account</th>
                            <th>GLAccount</th>
                            <th>Beban</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $counter=1;
                        foreach ($akununit as $au) :?>
                            <tr>
                                <td><?= $counter++; ?></td>
                                <td><?= $au['kode']; ?></td>
                                <td><?= $au['nama']; ?></td>
                                <td><?= $au['gl_account']; ?></td>
                                <td><?= $au['nama_beban']; ?></td>
                                <td>
                                    <button type="button" data-toggle="modal" data-target="#modalUpdate<?= $au['id_akun']; ?>" class="btn btn-sm btn-warning">
                                        <i class="fa fa-edit"></i>    
                                    </button>
                                    <form action="/pages/deleteakun/<?= $au['id_akun']; ?>" method="post" class="d-inline">
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

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script>
    new DataTable('#tabelglaccount');
</script>

<!-- Modal Add -->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modal-uploadfileTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header header-color">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="tulisan">
                    <h5 class="modal-title" style="text-align: left;">Tambahkan Data Akun</h5>
                </div>
                <br>
                <h6 class="modal-desc">Hindari memasukkan Kode dan Nama Akun yang sudah ada sebelumnya</h6>
            </div>
            <div class="modal-body">
                <form action="/pages/saveakun" method="post" onsubmit="return validateForm()">
                    <?= csrf_field(); ?>
                    <div class="group-body">
                        <label for="kode" style="font-weight: bold;">Kode <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="kode" id="kode" placeholder="Masukkan Kode Akun" required>
                        <div class="invalid-feedback">
                            <?= $validation->getError('kode'); ?>
                        </div>
                    </div>
                    <br>
                    <div class="group-body">
                        <label for="namaakun" style="font-weight: bold;">Nama Akun <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="namaakun" id="namaakun" placeholder="Masukkan Nama Akun" required>
                        <div class="invalid-feedback">
                            <?= $validation->getError('namaakun'); ?>
                        </div>
                    </div>
                    <br>
                    <div class="group-body">
                        <label for="beban" style="font-weight: bold;">Beban <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="beban" id="beban" placeholder="Masukkan Nama Beban" required>
                        <div class="invalid-feedback">
                            <?= $validation->getError('beban'); ?>
                        </div>
                    </div>
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save"></i>&nbsp; &nbsp; Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Update -->
<?php foreach ($akununit as $au) : ?>
    <div class="modal fade" id="modalUpdate<?= $au['id_akun']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-update" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header header-color">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="tulisan">
                    <h5 class="modal-title" style="text-align: left;">Ubah Data Akun</h5>
                </div>
                <br>
                <h6 class="modal-desc">Hindari memasukkan Kode dan Nama Akun yang sudah ada sebelumnya</h6>
            </div>
                
                <form action="/pages/updateAccount/<?= $au['id_akun']; ?>" method="post" onsubmit="return validateForm()">
     <br>
                <div class="modal-body">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="id" value="<?= $au['id_akun']; ?>">
                        <div class="group-body">
                        <label for="kode" style="font-weight: bold;">Kode <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" name="kode" placeholder="Masukkan Kode Akun" value="<?= $au['kode'] ?>" id="kode<?= $au['id_akun']; ?>">
                        </div>
                        <br>
                        <div class="group-body">
                        <label for="namaakun" style="font-weight: bold;">Nama Akun <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" name="namaakun" placeholder="Masukkan Nama Akun" value="<?= $au['nama'] ?>" id="namaakun<?= $au['id_akun']; ?>">
                        </div>
                        <br>
                        <div class="group-body">
                        <label for="beban" style="font-weight: bold;">Beban <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" name="beban" placeholder="Masukkan Nama Beban" value="<?= $au['nama_beban'] ?>" id="beban<?= $au['id_akun']; ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save"></i>&nbsp; &nbsp; Ubah
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>






<script>
    function submitFormUpdate(form) {
        form.submit();
    }
</script>

<?= $this->endSection(); ?>
