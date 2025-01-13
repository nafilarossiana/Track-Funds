<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Side Menu - Angkasa Pura | Airports</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="D:\KULIAH\MAGANG\Dashboard Visual RKA AP1\rra_ap1\app\Views\style.css">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap");
        * {
          margin: 0;
          padding: 0;
          outline: none;
          border: none;
          text-decoration: none;
          list-style: none;
          box-sizing: border-box;
          font-family: "Poppins", sans-serif;
        }
        body {
          background: rgb(233, 233, 233);
        }
        .container {
          display: flex;
          width: 1200px;
          margin: auto;
        }
        nav {
          position: absolute;
          top: 0;
          bottom: 0;
          height: 100%;
          left: 0;
          background: #fff;
          width: 90px;
          overflow: hidden;
          transition: width 0.2s linear;
          box-shadow: 0 20px 35px rgba(0,0,0,0.1);
        }
        .navbar {
          display: flex;
          flex-direction: column;
        }
        .logo {
          text-align: center;
          display: flex;
          align-items: center;
          justify-content: center;
          transition: all 0.5s ease;
          margin: 10px;
        }
        .logo img {
          width: 45px;
          height: 45px;
          border-radius: 50%;
          margin-right: 10px;
        }
        .logo h3 {
          margin-top: 10px;
          text-transform: uppercase;
          font-size: 16px;
          color: #68A7DA;
        }
        .fas {
          width: 70px;
          margin-right: 10px;
          color: #68A7DA;
          position: relative;
          height: 40px;
          top : 10px;
          text-align : center;
          font-size : 20px;
          align-items: center;
        }
        .nav-item {
          font-size: 16px;
          color: #68A7DA;
        }
        a {
          position: relative;
          color: rgb(85, 83, 83);
          font-size: 14px;
          display: flex;
          align-items: center;
          width: 300px;
          padding: 10px;
        }
        a:hover {
          background: #eee;
        }
        nav:hover {
          width: 280px;
          transition: all 0.5s ease;
        }
      /* Style Submenu */
        .submenu {
            display: none;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 280px; /* Sesuaikan lebar submenu */
            z-index: 1; /* Atur z-index agar submenu muncul di atas kontennya */
        }

        li:hover .submenu {
            display: block;
            position: absolute; /* Hapus line ini */
        }

        .submenu li {
            width: 100%; /* Sesuaikan lebar item submenu */
            padding-left: 70px;
            position: relative; /* Tambahkan line ini */
        }

        .submenu a {
            display: block;
            padding: 10px;
            color: #333; /* Sesuaikan warna teks submenu */
            text-decoration: none;
            padding-left : 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <nav>
            <div class="navbar">
                <div class="logo">
                    <img src="D:\KULIAH\MAGANG\Dashboard Visual RKA AP1\rra_ap1\app\Views\images\logoap1.jpg" alt="">
                    <h3>Angkasa Pura</h3>
                </div>
                <ul>
                    <li>
                        <a href="#">
                            <i class="fas fa-chart-pie"></i>
                            <span class="nav-item">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-dollar-sign"></i>
                            <span class="nav-item">Rencana Kerja Anggaran</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-file"></i>
                            <span class="nav-item">Rekapitulasi</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-user"></i>
                            <span class="nav-item">Data Unit</span>
                        </a>
                        <!-- Submenu for Data Unit -->
                        <ul class="submenu">
                            <li><a href="#"><span class="nav-item">Airside Facilities</span></a></li>
                            <li><a href="#"><span class="nav-item">Landside Facilities</span></a></li>
                            <li><a href="#"><span class="nav-item">Electrical Facilities</span></a></li>
                            <li><a href="#"><span class="nav-item">Mechanical Facilities</span></a></li>
                            <li><a href="#"><span class="nav-item">Airport Technology</span></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</body>
</html>