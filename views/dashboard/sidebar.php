<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="public/css/sidebar2.css">
     
    <!----===== Iconscout CSS ===== -->
    <script src="https://kit.fontawesome.com/24eae91c56.js" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"> -->

    <!--<title>Admin Dashboard Panel</title>--> 
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <!--<img src="images/logo.png" alt="">-->
            </div>

            <span class="logo_name">SASEB</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="#">
                    <i class="fa-solid fa-house"></i>
                    <span class="link-name">Dahsboard</span>
                </a></li>
                <li><a href="#">
                    <i class="fa-solid fa-user-graduate"></i>
                    <span class="link-name">Alumnos</span>
                </a></li>
                <li><a href="#">
                    <i class="fa-solid fa-user-tie"></i>
                    <span class="link-name">Psicologos</span>
                </a></li>
                <li><a href="#">
                    <i class="fa-solid fa-folder-open"></i>
                    <span class="link-name">Expedientes</span>
                </a></li>
                <li><a href="#">
                    <i class="fa-solid fa-file"></i>
                    <span class="link-name">Reportes</span>
                </a></li>
            </ul>
            
            <ul class="logout-mode">
                <li><a href="<?php echo constant('URL');?>/logout">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span class="link-name">Cerrar Sesión</span>
                </a></li>

                <!-- <li class="mode">
                    <a href="#">
                    <i class="fa-solid fa-moon"></i>
                    <span class="link-name">Modo Oscuro</span>
                </a> -->

                <div class="mode-toggle">
                  <span class="switch"></span>
                </div>
            </li>
            </ul>
        </div>
    </nav>
    <section class="dashboard">
        <div class="top">
            <i class="fa-solid fa-bars sidebar-toggle"></i>

            <div class="search-box">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Search here...">
            </div>
            
            <!--<img src="images/profile.jpg" alt="">-->
        </div>
    <script src="public/js/script.js"></script>
</body>
</html>