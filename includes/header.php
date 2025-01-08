<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>Painel Administrativo</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link href="<?php echo base_url; ?>assets/css/main.css" rel="stylesheet" />
  <link href="<?php echo base_url; ?>assets/css/styles.css" rel="stylesheet" />
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url; ?>assets/css/font-awesome.min.css">
</head>

<body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo">Sistema CRUD</a>
        <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
        <!-- Navbar Right Menu-->
        <ul class="app-nav">
            <li class="dropdown"><a class="app-nav__item" href="<?php echo base_url; ?>logout.php" data-toggle="dropdown" aria-label="Open Profile Menu"><?= $_SESSION['user'] ?>  <i class="fa fa-sign-out fa-lg"></i></a>
            </li>
        </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?php echo base_url; ?>assets/img/avatar.png" alt="User Image" width="50">
            <div>
                <p class="app-sidebar__user-name"><?php echo $_SESSION['user'] ?></p>
            </div>
        </div>
        <ul class="app-menu">
        <li><a class="app-menu__item" href="<?php echo base_url; ?>views/Usuario/index.php"><i class="app-menu__icon fa fa-user-o"></i><span class="app-menu__label">Usuários</span></a></li>
            <li><a class="app-menu__item" href="<?php echo base_url; ?>views/Empresa/index.php"><i class="app-menu__icon fa fa-hourglass-start"></i><span class="app-menu__label">Empresas</span></a></li>
            <li><a class="app-menu__item" href="<?php echo base_url; ?>views/Funcionario/index.php"><i class="app-menu__icon fa fa-graduation-cap"></i><span class="app-menu__label">Funcionários</span></a></li>
        </ul>
    </aside>
    <main class="app-content">