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
      background: linear-gradient(93deg, #3088CF 0%, #92C044 100%, #B9B9B9 100%);
      position: fixed;
      width: 100% ;
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

    

    .wrapper .main-container {
    width: 100%;
    margin-top: 40px;
  
    padding: 15px;
    background: url(background.jpg) no-repeat;
    background-size: cover;
    height: 100vh;
    transition: 0.3s;
}

   
    .wrapper.collapsed .main-container {
      width: 100%;

    }

    .wrapper .main-container .card {
      background: #fff;
      padding: 15px;
      margin-bottom: 10px;
      font-size: 14px;
    }
    .header-menu .dropdown .btn {
            color: #fff;
        }

        .header-menu .dropdown .btn i {
            margin-right: 5px;
        }

        .header-menu .dropdown .dropdown-menu a {
            color: #000;
        }

        .header-menu .dropdown .dropdown-menu a:hover {
            background-color: #4CCEE8;
            color: #fff;
        }

        .header-menu .logout-btn {
            color: #fff;
            font-size: 18px;
            margin-left: 15px;
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
            <div class="dropdown">
                <button class="btn btn-outline-light font-weight-bold dropdown-toggle" style="border-width: 2px;" type="button" id="dropdown-thang" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-fw fa-calendar"></i> <span>2024</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-thang">
                    <a class="dropdown-item d-flex justify-content-between align-items-center" href="#"><span style="color: blue;">2024</span> <i class="fas fa-check text-success" style="color: blue;"></i></a>
                    <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">2023</a>
                    <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">2022</a>
                    <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">2021</a>
                    <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">2020</a>
                </div>
                <a href="/user/logout" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </div>
        </div>
    </div>

            <!--header menu end-->
            <!--sidebar start-->
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