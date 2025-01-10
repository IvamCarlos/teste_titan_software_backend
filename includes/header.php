<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>Painel Administrativo</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link type="text/css" href="<?php echo base_url; ?>assets/css/main.css" rel="stylesheet" />
  <link type="text/css" href="<?php echo base_url; ?>assets/css/styles.css" rel="stylesheet" />
  <!-- 
    Arquivos de estilo utilizados para compor a tabela de funcionários, empresas e usuários, 
    formulário de cadastro e alerta em caso de erro ou sucesso 
  -->
  <link type="text/css" rel="stylesheet" href="<?php echo base_url; ?>assets/css/table.css">
  <link type="text/css" rel="stylesheet" href="<?php echo base_url; ?>assets/css/form.css">
  <link type="text/css" rel="stylesheet" href="<?php echo base_url; ?>assets/css/alert.css">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url; ?>assets/css/font-awesome.min.css">
  
</head>

<body>
    <div class="navbar">
        <a href="<?php echo base_url; ?>usuarios"><i class="fa fa-user"></i> Usuários</a>
        <a href="<?php echo base_url; ?>empresas"><i class="fa fa-laptop"></i> Empresas</a>
        <a href="<?php echo base_url; ?>"><i class="fa fa-user-circle"></i> Funcionários</a>
        <a class="logout" href="<?php echo base_url; ?>logout"><i class="fa fa-sign-out"></i> Sair</a>
    </div>

    <div class="container">
      <div class="main">   