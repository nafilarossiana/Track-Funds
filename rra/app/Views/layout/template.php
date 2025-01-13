<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Rencana Realisasi Anggaran | Angkasa Pura </title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
       <!-- jQuery -->
       <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <!-- Popper.js -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <!-- Bootstrap JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <style>
     * {
      margin: 0;
      padding: 0;
      list-style: none;
      text-decoration: none;
      box-sizing: border-box;
      font-family: "Roboto", sans-serif;
    }

    body {
      background: #fff;
    }

    .wrapper .header {
      z-index: 1;
      background: linear-gradient(93deg, #60abda 0%, #4ca3d0 100%);
      position: fixed;
      width: calc(100% - 0%);
      height: 70px;
      display: flex;
      top: 0;
    }

    .wrapper .header .header-menu {
      width: calc(100% - 0%);
      height: 100%;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 20px;
    }

    .wrapper .header .header-menu .title {
      color: #fff;
      font-size: 16px;
      text-transform: uppercase;
      font-weight: 600;
    }

    .wrapper .header .header-menu .title span {
      color: #fff;
    }

    .wrapper .header .header-menu .sidebar-btn {
      color: #fff;
      position: absolute;
      margin-left: 240px;
      font-size: 22px;
      font-weight: 900;
      cursor: pointer;
      transition: 0.3s;
      transition-property: color;
    }

    .wrapper .header .header-menu .sidebar-btn:hover {
      color: #4CCEE8;
    }

    .wrapper .header .header-menu ul {
      display: flex;
    }

    .wrapper .header .header-menu ul li a {
      background: #fff;
      color: #000;
      display: block;
      margin: 0 10px;
      font-size: 18px;
      width: 34px;
      height: 34px;
      line-height: 35px;
      text-align: center;
      border-radius: 50%;
      transition: 0.3s;
      transition-property: background, color;
    }

    .wrapper .header .header-menu ul li a:hover {
      background: #4CCEE8;
      color: #fff;
    }

    .wrapper .sidebar {
    z-index: 1;
    background: #fff;
    position: fixed;
    top: 70px;
    width: 250px;
    height: calc(100% - 9%);
    transition: 0.3s;
    transition-property: width, box-shadow;
    overflow-y: auto;
    box-shadow: 4px 0 5px -2px rgba(0, 0, 0, 0.2); /* Tambahkan baris ini */
}

    .wrapper .sidebar .sidebar-menu {
      overflow: hidden;
    }

    .wrapper .sidebar .sidebar-menu .item {
      width: 250px;
      overflow: hidden;
    }

    .wrapper .sidebar .sidebar-menu .item .menu-btn {
      display: block;
      color: #868e96;
      left: 20px;
      position: relative;
      padding: 25px 15px;
      transition: 0.3s;
      transition-property: color;
    }

    .wrapper .sidebar .sidebar-menu .item .menu-btn:hover {
      color: #4CCEE8;
    }

    .wrapper .sidebar .sidebar-menu .item .menu-btn i {
      margin-right: 20px;
    }

    .wrapper .sidebar .sidebar-menu .item .menu-btn .drop-down {
      float: right;
      font-size: 12px;
      margin-top: 3px;
    }

    .wrapper .sidebar .sidebar-menu .item .sub-menu {
      background: #3498DB;
      overflow: hidden;
      max-height: 0;
      transition: 0.3s;
      transition-property: background, max-height;
    }

    .wrapper .sidebar .sidebar-menu .item.active .sub-menu {
      max-height: 500px;
    }

    .wrapper .sidebar .sidebar-menu .item.active .menu-btn {
      color: #4CCEE8;
    }

    .wrapper .sidebar .sidebar-menu .item .sub-menu a {
      display: block;
      position: relative;
      color: #fff;
      white-space: nowrap;
      font-size: 15px;
      padding: 20px;
      transition: 0.3s;
      transition-property: background;
    }

    .wrapper .sidebar .sidebar-menu .item .sub-menu a:hover {
      background: #55B1F0;
    }

    .wrapper .sidebar .sidebar-menu .item .sub-menu a:not(last-child) {
      border-bottom: 1px solid #8FC5E9;
    }

    .wrapper .sidebar .sidebar-menu .item .sub-menu i {
      padding-right: 20px;
      font-size: 10px;
    }

    .wrapper .sidebar .sidebar-menu .item:target .sub-menu {
      max-height: 500px;
    }

    .wrapper .main-container {
    width: calc(100% - 250px);
    margin-top: 40px;
    margin-left: 250px;
    padding: 15px;
    background: url(background.jpg) no-repeat;
    background-size: cover;
    height: 100vh;
    transition: 0.3s;
}

    .wrapper.collapsed .sidebar {
      width: 90px;
    }

    .wrapper.collapsed .sidebar .profile img,
    .wrapper.collapsed .sidebar .profile p,
    .wrapper.collapsed .sidebar a span {
      display: none;
    }

    .wrapper.collapsed .sidebar .sidebar-menu .item .menu-btn {
      font-size: 23px;
    }

    .wrapper.collapsed .sidebar .sidebar-menu .item .sub-menu i {
      font-size: 18px;
      padding-left: 3px;
    }

    .wrapper.collapsed .main-container {
      width: calc(100% - 70px);
      margin-left: 70px;
    }

    .wrapper .main-container .card {
      background: #fff;
      padding: 15px;
      margin-bottom: 10px;
      font-size: 14px;
    }
  </style>
      </head>
    <body>
           <!--wrapper start-->
        <div class="wrapper">
            <!--header menu start-->
            <div class="header">
                <div class="header-menu">
                    <div class="title">Track <span> | Funds</span></div>
                    <div class="sidebar-btn">
                        <i class="fas fa-bars"></i>
                    </div>
                    <div class="dropdown mr-3">
  <button class="btn btn-outline-light font-weight-bold dropdown-toggle" style="border-width: 2px;"type="button" id="dropdown-thang" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-fw fa-calendar"></i> <span>2024</span>
  </button>
  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-thang">
    <a class="dropdown-item d-flex justify-content-between align-items-center" href="#"><span style="color: blue;">2024</span> <i class="fas fa-check text-success" style="color: blue;"></i></a>
    <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">2023</a>
    <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">2022</a>
    <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">2021</a>
    <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">2020</a>
  </div>

  
</div>
                </div>
          </div>

            <!--header menu end-->
            <!--sidebar start-->
            <div class="sidebar">
                <div class="sidebar-menu">
                   <!--Bagian level user-->
                  <?php if (session()->get('kelompok') == 'admin_airside') { ?>
          
                    <li class="item">
                        <a href="/pages/dashairside" class="menu-btn">
                            <i class="fas fa-chart-pie"></i><span>Dashboard</span>
                        </a>
                    <li class="item">
                        <a href="/pages/airside" class="menu-btn">
                            <i class="fas fa-file"></i><span>Data Unit</span>
                        </a>
                    </li>
                    <li class="item">
                        <a href="/pages/akun" class="menu-btn">
                            <i class="fa fa-paper-plane "></i><span>Data Akun</span>
                        </a>
                    </li>
                    <li class="item">
                    <a href="/user/logout" class="menu-btn">
    <i class="fas fa-sign-out-alt"></i><span>Log Out</span>
</a>

                    </li>
                    <?php }?>


                    <?php if (session()->get('kelompok') == 'admin_landside') { ?>
                  
                      <li class="item">
                        <a href="/landside/dashlandside" class="menu-btn">
                            <i class="fas fa-chart-pie"></i><span>Dashboard</span>
                        </a>
                    </li>
                   
                    <li class="item">
                        <a href="/landside/landside" class="menu-btn">
                            <i class="fas fa-file"></i><span>Data Unit</span>
                        </a>
                    </li>
                    <li class="item">
                        <a href="/pages/akun" class="menu-btn">
                            <i class="fa fa-paper-plane "></i><span>Data Akun</span>
                        </a>
                    </li>
                    <li class="item">
                    <a href="/user/logout" class="menu-btn">
    <i class="fas fa-sign-out-alt"></i><span>Log Out</span>
</a>

                    </li>
                    <?php }?>

                    


<?php if (session()->get('kelompok') == 'admin_electrical') { ?>
  <li class="item">
    <a href="/pages/electrical/dashelectrical" class="menu-btn">
        <i class="fas fa-chart-pie"></i><span>Dashboard</span>
    </a>
</li>
<li class="item">
    <a href="/pages/electrical/electrical" class="menu-btn">
        <i class="fas fa-user"></i><span>Data Unit</span>
    </a>
</li>
<li class="item">
    <a href="/pages/akun" class="menu-btn">
        <i class="fa fa-paper-plane "></i><span>Data Akun</span>
    </a>
</li>
<li class="item">
<a href="/user/logout" class="menu-btn">
<i class="fas fa-sign-out-alt"></i><span>Log Out</span>
</a>

</li>
<?php }?>

<?php if (session()->get('kelompok') == 'admin_technology') { ?>
  <li class="item">
    <a href="/pages/airporttech/dashtechnology" class="menu-btn">
        <i class="fas fa-chart-pie"></i><span>Dashboard</span>
    </a>
</li>
<li class="item">
    <a href="/pages/airporttech/airporttech" class="menu-btn">
        <i class="fas fa-user"></i><span>Data Unit</span>
    </a>
</li>
<li class="item">
    <a href="/pages/akun" class="menu-btn">
        <i class="fa fa-paper-plane "></i><span>Data Akun</span>
    </a>
</li>
<li class="item">
<a href="/user/logout" class="menu-btn">
<i class="fas fa-sign-out-alt"></i><span>Log Out</span>
</a>

</li>
<?php }?>



<?php if (session()->get('kelompok') == 'admin_utama') { ?>

                    
                    <li class="item">
                        <a href="/pages/rekapitulasi" class="menu-btn">
                            <i class="fas fa-file"></i><span>Rekapitulasi</span>
                        </a>
                    </li>
               
                    <li class="item">
                        <a href="/pages/rkacoba" class="menu-btn">
                            <i class="fas fa-dollar-sign"></i><span>Rencana Kerja Anggaran</span>
                        </a>
                    </li>
                    
                    <li class="item">
                        <a href="/pages/akun" class="menu-btn">
                            <i class="fa fa-paper-plane "></i><span>Data Akun</span>
                        </a>
                    </li>
                    <li class="item" id="unit">
                        <a href="#unit" class="menu-btn">
                            <i class="fas fa-user"></i><span>Data Unit <i class="fas fa-chevron-down drop-down"></i></span>
                        </a>
                        <div class="sub-menu">
                            <a href="/pages/dashairside"></i><span>Airside Facilities</span></a>
                            <a href="/landside/dashlandside"></i><span>Landside Facilities</span></a>
                            <a href="/pages/electrical/dashelectrical"></i><span>Electrical Facilities</span></a>
                            <a href="/pages/mechanical/dashmechanical"></i><span>Mechanical Facilities</span></a>
                            <a href="/pages/airporttech/dashairporttech"></i><span>Airport Technology</span></a>
                        </div>
                    </li>
                    <li class="item">
                        <a href="/pages/user" class="menu-btn">
                            <i class="fas fa-lock"></i><span>Data Pengguna</span>
                        </a>
                    </li>
                    <li class="item">
<a href="/user/logout" class="menu-btn">
<i class="fas fa-sign-out-alt"></i><span>Log Out</span>
</a>

</li>
  <?php }?>

                    
                </div>
            </div>
            <!--sidebar end-->
            <!--main container start-->
            <div class="main-container">
              <?= $this->renderSection('content'); ?>
            </div>
        </div>
        <!--wrapper end--
        
        <!-- KONFIGURASI UNTUK CSS dan JAVASCRIPT Bootstrap-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



        <script type="text/javascript">
    $(document).ready(function(){
        var isSidebarCollapsed = true;

        // Setel kelas collapsed berdasarkan status
        if (isSidebarCollapsed) {
            $(".wrapper").addClass("collapsed");
        }

        $(".sidebar-btn").click(function(){
            // Toggle kelas collapsed
            $(".wrapper").toggleClass("collapsed");

            // Simpan status sidebar di localStorage (opsional, jika diperlukan)
            localStorage.setItem('isSidebarCollapsed', $(".wrapper").hasClass("collapsed"));
        });

        // Menangani klik pada elemen Data Unit
        $("#unit .menu-btn").click(function(e){
            // Toggle kelas 'active' pada elemen Data Unit
            $(this).parent().toggleClass("active");

            // Toggle max-height pada sub-menu Data Unit
            $(this).next(".sub-menu").toggleClass("expanded");

            // Menutup dropdown lain jika terbuka
            $(".sidebar-menu .item").not($(this).parent()).removeClass("active");
            $(".sub-menu").not($(this).next(".sub-menu")).removeClass("expanded");

            e.stopPropagation(); // Mencegah klik menyebar ke elemen lain
        });

        // Menutup dropdown ketika mengklik elemen lain di luar dropdown
        $(document).click(function(){
            $("#unit .menu-btn").parent().removeClass("active");
            $("#unit .sub-menu").removeClass("expanded");
        });
    });
</script>
    </body>
</html>