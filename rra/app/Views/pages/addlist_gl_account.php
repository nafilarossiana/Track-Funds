<?= $this->section('content'); ?>
<style>
    
    .content-1 {
        background-color: #fff;
        border-radius: 2px;
        margin: 10px;
        flex-grow: 1;
        padding: 20px;
        transition: padding 0.3s ease;
        text-align: justify;
        max-width: 100%;
        height: 100%;
        overflow-x: auto;
        order: 1;
    }
    .header-form .custom-button {
      background-color: #3088CF;
      color: white; /* Sesuaikan dengan kebutuhan Anda */
      border: none;
      border-radius: 5px;
      cursor: pointer;
      margin-top : 30px;
      margin-bottom: 30px;
    }
    .header-form .custom-button:hover {
      background-color: #0F6AB7; /* Warna saat tombol dihover */
    }
    .header-text{
      margin-left : 50px;
      font-family: 'Inter', sans-serif;
    }
    .header-text h4{
      font-weight: 700;
    }
    .header-text  h3{
      font-size:16px;
    }
    .row {
      display: flex;
    }
    .header-subform h4{
      color :#3088CF;
      font-size: 18px;
      margin:0;
    }
    .header-form .footer{
      text-align : right;
    }
    .header-form .footer-button {
      background-color: #3088CF;
      color: white; /* Sesuaikan dengan kebutuhan Anda */
      border: none;
      border-radius: 5px;
      cursor: pointer;
      margin-top : 30px;
      margin-: 30px;
      margin-bottom: 30px;
    }
    .header-form .footer-button:hover {
      background-color: #0F6AB7; /* Warna saat tombol dihover */
    }
    .form-group{
      font-size: 16px;
    }
    .section-header{
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.06);
      background-color: #fff;
      border-radius: 3px;
      border: none;
      position: relative;
      margin-bottom: 10px;
      margin-top : 0;
      height: 80px;
      display: flex;
      flex-direction: column; /* Perubahan disini */
    }
    .section-header p {
        margin-top: 5px;
        margin-bottom: 10px; /* Penambahan margin-bottom */
    }
    .form-group p{
      font-size: 14px;
      color:red;
    }
    
</style>
<div class="center">
    <div class="content-1">
      <div class="header-text">
      <div class="section-header">
    <h4 style="margin-bottom: 5px;">Add Data Airside Facilities  </h4>
    <p style="margin-top: 5px;">Masukkan Data Detail Program dan Anggaran dengan benar </p>
    </div>
      <div class="header-form">
     <button type="button" class="btn custom-button" onclick="redirectToAirsidePage()">
     <i class="fa fa-arrow-left"></i>&nbsp; &nbsp; Kembali
     </button>
      <br>
      <form action="/pages/save" method="post">
      <?= csrf_field(); ?>
        <div class="card-body">
          <div class="row">
            <!--kolom 1-->
            <div class="col-md-6">
              <div class="form-group">
                <div class="header-subform">
                  <h4>Detail Program</h4>
                  <br>
                 </div>
                 <div class="form-group">
                  <label for="tahun">Tahun</label>
                    <select id="tahun" class="form-control" name="tahun">
                    <option value="" hidden>-Pilih Tahun-</option>
                    <?php foreach ($tahun as $key => $value) :?>
                      <option value="<?= $value['tahun']?>"><?= $value['tahun'] ?></option>
                    <?php endforeach ?>
                    </select>
                    </div>
                 <div class="form-group">
                  <label for="glaccount">GL-Account</label>
                    <select id="nama_gl" class="form-control" name="nama_gl">
                    <option value="" hidden>-Pilih Gl-Account</option>
                    <?php foreach ($akunairside as $key => $value) :?>
                      <option value="<?= $value['nama_akun']?>"><?= $value['nama_akun'] ?></option>
                    <?php endforeach ?>
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="jenis">Jenis</label>
                    <select id="jenis" class="form-control" name="jenis">
                    <option value="" hidden>-Pilih Jenis-</option>
                    <?php foreach ($jenis as $key => $value) :?>
                      <option value="<?= $value['namajenis']?>"><?= $value['namajenis'] ?></option>
                    <?php endforeach ?>
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="jenis_kontrak">Jenis Kontrak</label>
                    <select id="jenis_kontrak" class="form-control" name="jenis_kontrak">
                    <option value="" hidden>-Pilih Jenis Kontrak-</option>
                    <?php foreach ($jeniskontrak as $key => $value) :?>
                      <option value="<?= $value['jenis_kontrak']?>"><?= $value['jenis_kontrak'] ?></option>
                    <?php endforeach ?>
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" class="form-control" name="status">
                    <option value="" hidden>-Pilih Status-</option>
                    <?php foreach ($status as $key => $value) :?>
                      <option value="<?= $value['namastatus']?>"><?= $value['namastatus'] ?></option>
                    <?php endforeach ?>
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="nama_program">Nama Program</label>
                    <input type="text" class="form-control" name="nama_program" placeholder="Masukkan Nama Program">
                    </div>
                    <br>
                </div>
              </div>
            <!--kolom 2-->
            <div class="col-md-6">
              <div class="form-group">
                <div class="header-subform">
                  <h4>Anggaran</h4>
                </div>
                <br>
                <div class="form-group">
                    <label for="nilai_program">Nilai Program</label>
                    <input type="number" class="form-control" name="nilai_program" placeholder="Masukkan Nilai Program">
                    </div>
                    <div class="form-group">
                    <label for="geser">Nilai Geseran</label>
                    <input type="number" class="form-control" name="geser" placeholder="Masukkan Nilai Geseran">
                    </div>
                
                    <div class="form-group">
                      <label for="bulan"><span>Bulan</span><p>Pilih bulan untuk memasukkan data nominal</p></label>
                      <select id="bulan" class="form-control" name="bulan" onchange="showInput()">
                          <option value="" hidden><h4>-Pilih Bulan-</h4></option>
                          <option value="januari">Januari</option>
                          <option value="februari">Februari</option>
                          <option value="maret">Maret</option>
                          <option value="april">April</option>
                          <option value="mei">Mei</option>
                          <option value="juni">Juni</option>
                          <option value="juli">Juli</option>
                          <option value="agustus">Agustus</option>
                          <option value="september">September</option>
                          <option value="oktober">Oktober</option>
                          <option value="november">November</option>
                          <option value="desember">Desember</option>
                        </select>
                  </div>
                  <div id="januariInput" class="form-group" style="display: none;">
                  <label for="januariText">Nominal Januari</label>
                  <input type="number" id="januariText" class="form-control" name="januariText" placeholder="Masukkan Nominal Januari">
                  </div>
                  <div id="februariInput" class="form-group" style="display: none;">
                  <label for="februariText">Nominal Februari</label>
                  <input type="number" id="februariText" class="form-control" name="februariText" placeholder="Masukkan Nominal Februari">
                  </div>
                  <div id="maretInput" class="form-group" style="display: none;">
                  <label for="maretText">Nominal Maret</label>
                  <input type="number" id="maretText" class="form-control" name="maretText" placeholder="Masukkan Nominal Maret">
                  </div>
                  <div id="aprilInput" class="form-group" style="display: none;">
                  <label for="aprilText">Nominal April</label>
                  <input type="number" id="aprilText" class="form-control" name="aprilText" placeholder="Masukkan Nominal April">
                  </div>
                  <div id="meiInput" class="form-group" style="display: none;">
                  <label for="meiText">Nominal Mei</label>
                  <input type="number" id="meiText" class="form-control" name="meiText" placeholder="Masukkan Nominal Mei">
                  </div>
                  <div id="juniInput" class="form-group" style="display: none;">
                  <label for="juniText">Nominal Juni</label>
                  <input type="number" id="juniText" class="form-control" name="juniText" placeholder="Masukkan Nominal Juni">
                  </div>
                  <div id="juliInput" class="form-group" style="display: none;">
                  <label for="juliText">Nominal Juli</label>
                  <input type="number" id="juliText" class="form-control" name="juliText" placeholder="Masukkan Nominal Juli">
                  </div>
                  <div id="agustusInput" class="form-group" style="display: none;">
                  <label for="agustusText">Nominal Agustus</label>
                  <input type="number" id="agustusText" class="form-control" name="agustusText" placeholder="Masukkan Nominal Agustus">
                  </div>
                  <div id="septemberInput" class="form-group" style="display: none;">
                  <label for="septemberText">Nominal September</label>
                  <input type="number" id="septemberText" class="form-control" name="septemberText" placeholder="Masukkan Nominal September">
                  </div>
                  <div id="oktoberInput" class="form-group" style="display: none;">
                  <label for="oktoberText">Nominal Oktober</label>
                  <input type="number" id="oktoberText" class="form-control" name="oktoberText" placeholder="Masukkan Nominal Oktober">
                  </div>
                  <div id="novemberInput" class="form-group" style="display: none;">
                  <label for="novemberText">Nominal November</label>
                  <input type="number" id="novemberText" class="form-control" name="novemberText" placeholder="Masukkan Nominal November">
                  </div>
                  <div id="desemberInput" class="form-group" style="display: none;">
                  <label for="desemberText">Nominal Desember</label>
                  <input type="number" id="desemberText" class="form-control" name="desemberText" placeholder="Masukkan Nominal Desember">
                  </div>
              </div>
              <div class="footer">
              <button type="submit" class="btn footer-button"><i class="fa fa-save"></i>&nbsp; &nbsp; Simpan</button>
                </div>
            </div>
          </div>
        </div>
      </form> 
    </div>
    </div> 
  </div>
</div>
<script>
    function redirectToAirsidePage() {
        window.location.href = '/pages/airside#airside-month';
    }
</script>
<script>
    document.getElementById('bulan').addEventListener('change', function() {
        var selectedBulan = this.value;
        document.getElementsByName('nominal')[0].setAttribute('data-bulan', selectedBulan);
    });
</script>
<script>
    function showInput() {
        var selectedMonth = document.getElementById("bulan").value;
        var januariInput = document.getElementById("januariInput");
        var februariInput = document.getElementById("februariInput");
        var maretInput = document.getElementById("maretInput");
        var aprilInput = document.getElementById("aprilInput");
        var meiInput = document.getElementById("meiInput");
        var juniInput = document.getElementById("juniInput");
        var juliInput = document.getElementById("juliInput");
        var agustusInput = document.getElementById("agustusInput");
        var septemberInput = document.getElementById("septemberInput");
        var oktoberInput = document.getElementById("oktoberInput");
        var novemberInput = document.getElementById("novemberInput");
        var desemberInput = document.getElementById("desemberInput");

        
       


        if (selectedMonth === "januari") {
            januariInput.style.display = "block";
        } else if (selectedMonth === "februari") {
            februariInput.style.display = "block";
        }else if (selectedMonth === "maret") {
            maretInput.style.display = "block";
        }else if (selectedMonth === "april") {
            aprilInput.style.display = "block";
        }else if (selectedMonth === "mei") {
            meiInput.style.display = "block";
        }else if (selectedMonth === "juni") {
            juniInput.style.display = "block";
        }else if (selectedMonth === "juli") {
            juliInput.style.display = "block";
        }else if (selectedMonth === "agustus") {
            agustusInput.style.display = "block";
        }else if (selectedMonth === "september") {
            septemberInput.style.display = "block";
        }else if (selectedMonth === "oktober") {
            oktoberInput.style.display = "block";
        }else if (selectedMonth === "november") {
            novemberInput.style.display = "block";
        }else if (selectedMonth === "desember") {
            desemberInput.style.display = "block";
        }
    }
</script>

<?= $this->endSection(); ?>
