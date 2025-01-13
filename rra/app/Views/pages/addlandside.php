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
      <form >
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
                  <label for="glaccount">GL-Account</label>
                    <select id="nama_gl" class="form-control" name="nama_gl">
                      <option disabled selected>-Pilih GL Account-</option>
                      <option value="1">None</option>
                      <option value="2">512020600-B.P.Taman</option>
                      <option value="3">512020700-B.P.Pagar</option>
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="jenis">Jenis</label>
                    <select id="jenis" class="form-control" name="jenis">
                      <option selected disabled>-Pilih Jenis-</option>
                      <option value="1">None</option>
                      <option value="2">Rutin</option>
                      <option value="3">Non Rutin</option>
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="jenis_kontrak">Jenis Kontrak</label>
                    <select id="jenis_kontrak" class="form-control" name="jenis_kontrak">
                    <option disabled selected>-Pilih Jenis Kontrak-</option>
                      <option value="1">Swakeloa</option>
                      <option value="2">Kontrak Payung</option>
                      <option value="3">Pengadaan Langsung</option>
                      <option value="4">Padi UMKM</option>
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" class="form-control" name="status">
                      <option disabled selected>-Pilih Status-</option>
                      <option value="1">Mendahului Proses</option>
                      <option value="2">Perencanaan</option>
                      <option value="3">Pengajuan</option>
                      <option value="4">Kontrol Anggaran</option>
                      <option value="5">Lelang/Appro</option>
                      <option value="6">Pelaksanaan</option>
                      <option value="7">Done</option>
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
                    <label for="bulan">Bulan</label>
                    <select id="bulan" class="form-control" name="bulan">
                      <option disabled selected>-Pilih Bulan-</option>
                      <option value="1">Januari</option>
                      <option value="2">Februari</option>
                      <option value="3">Maret</option>
                      <option value="4">April</option>
                      <option value="5">Mei</option>
                      <option value="6">Juni</option>
                      <option value="7">Juli</option>
                      <option value="8">Agustus</option>
                      <option value="9">September</option>
                      <option value="10">Oktober</option>
                      <option value="11">November</option>
                      <option value="12">Desember</option>
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="nominal">Nominal</label>
                    <input type="number" class="form-control" name="nominal" placeholder="Masukkan Nominal">
                    </div>
              </div>
              <div class="footer">
              <button type="button" class="btn footer-button"><i class="fa fa-save"></i>&nbsp; &nbsp; Simpan</button>
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
<?= $this->endSection(); ?>
```