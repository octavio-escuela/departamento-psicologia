<?php
    $user = $this->d['user'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo constant('URL');?>/public/css/sidebar2.css">
    <link rel="stylesheet" href="<?php echo constant('URL');?>/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo constant('URL');?>/public/css/dataTables.bootstrap5.min.css">

    <!-- dataTables -->
    <!-- <link rel="stylesheet" href="public/Datatable/css"> -->
    <!-- <script src="public/Datatable/DataTables-1.12.1/js/dataTables.bootstrap5.min.js"></script> -->
    <!----===== Iconscout CSS ===== -->
    <script src="https://kit.fontawesome.com/24eae91c56.js" crossorigin="anonymous"></script>

</head>

<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <!-- <img src="images/logo.png" alt=""> -->
            </div>

            <span class="logo_name">SASEB</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="<?php echo constant('URL');?>">
                    <i class="fa-solid fa-house"></i>
                    <span class="link-name">Inicio</span>
                </a></li>
                <li><a href="<?php echo constant('URL');?>/students">
                    <i class="fa-solid fa-user-graduate"></i>
                    <span class="link-name">Alumnos</span>
                    </a>
                </li>
                
                <li><a href="<?php echo constant('URL');?>/psychologists">
                    <i class="fa-solid fa-user-tie"></i>
                    <span class="link-name">Psicologos</span>
                </a>
                <ul>
                    <li>
                        <a href="<?php echo constant('URL');?>/signup">
                            <i class="fa-solid fa-user-plus"></i>
                            <span class="link-name">Nuevo psicologo</span>
                        </a>
                    </li>
                </ul>
                </li>
                <li><a href="<?php echo constant('URL');?>/files">
                    <i class="fa-solid fa-folder-open"></i>
                    <span class="link-name">Expedientes</span>
                </a></li>
                <li><a href="#">
                    <i class="fa-solid fa-file"></i>
                    <span class="link-name">Reportes</span>
                </a></li>
                <?php if($user->getRole() == "admin"){ ?>
				<li><a href="<?php echo constant('URL'); ?>Usuarios/Listar"> 
                    <i class="fas fa-user"></i> 
                    <span class="link-name"> Usuarios </span></a>
                </li>
				<li><a href="<?php echo constant('URL'); ?>Configuracion/Listar"> 
                    <i class="fas fa-cogs"></i> 
                    <span class="link-name"> Configuración </span></a>
                </li>
                <?php }else{
                    echo "";
                } ?>
            </ul>
            
            <ul class="logout-mode">
                <li><a href="<?php echo constant('URL');?>/logout">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span class="link-name">Cerrar Sesión</span>
                </a></li>
            </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard" id="main-container">
        <div class="top">
            <i class="fa-solid fa-bars sidebar-toggle"></i>

            <div class="search-box">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Search here...">
            </div>
        </div>

        
    <script src="<?php echo constant('URL'); ?>/public/js/script.js"></script>
</body>
</html>