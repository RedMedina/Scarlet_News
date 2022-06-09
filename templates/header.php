<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Proyecto Final</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://css.gg/lock.css' rel='stylesheet'>
    <link href='https://css.gg/mail.css' rel='stylesheet'>
    <link href='https://css.gg/arrow-long-right.css' rel='stylesheet'>
    <script type='text/javascript' src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link href='https://css.gg/log-in.css' rel='stylesheet'>
    <link href='https://css.gg/log-out.css' rel='stylesheet'>
    <link href='https://css.gg/facebook.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/contenido.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/perfil.css">
    <link rel="stylesheet" href="css/SignUp.css">
    <link rel="stylesheet" href="css/CNews.css">
    <link rel="stylesheet" href="css/porfile.css">
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="css/Sections.css">
    <link rel="stylesheet" href="css/Editor.css">
    <link rel="stylesheet" href="css/News.css">
    <link rel="stylesheet" href="css/reporter.css">
    <link rel="stylesheet" href="css/sweetalert2.css">
    <link rel="stylesheet" href="css/ReporteLikes.css">
    
</head>
<body id="main">
    <div class="header">
        <a href="index.php"><img src="img/logoS.png" height="112" width="112"></a>
    </div>
    <?php include 'classes/Conexion.classes.php'; ?>
    <?php include "classes/SeccionClass.classes.php";?>
    <?php include 'classes/Sections.classes.php'; ?>
    <div class="topnav">
        <a href="index.php">Inicio</a>
        <?php
             $SectionSelect = new Secciones;
             $Seccion = $SectionSelect->SeleccionIndex();
             $i = 0;
            while($i < count($Seccion))
            {
        ?>
            <a href="index.php?Sec=<?php echo $Seccion[$i]->GetDesc();?>&ID=<?php echo $Seccion[$i]->GetID();?>" style="background-color: <?php echo $Seccion[$i]->GetColor();?>;"><?php echo $Seccion[$i]->GetDesc(); ?></a>
        <?php
            $i++;
            }
        ?>
        <form action="index.php" method="get" id="BusquedaNorma">
            <input type="hidden" name="FCAnt">
            <input type="hidden" name="FCDesp">
            <input type="hidden" name="PalabraCBsqAV">
            <input type="hidden" name="BusquedaAv" value="true">
        </form>
        <input type="text" name="TextBsqAV" class="busq" placeholder="buscar..." form="BusquedaNorma">  <button class="busqBtn" form="BusquedaNorma"><i class="fa fa-fw fa-search"></i></button>
        <button class="busqBtn" onclick="location.href='Search.php'"><i class="fa fa-fw fa-wrench"></i></button></button>
    </div>