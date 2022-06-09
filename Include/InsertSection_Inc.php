<?php
    include "../classes/Sections.classes.php";
    include '../classes/Conexion.classes.php';

    session_start();
    if(isset($_POST['BtnSections']))
    {
        $Insert = new Secciones;
        $color = $_POST['hiddenB'];
        $descripcion = $_POST['NameSect'];
        $orden = $_POST['numSelect'];

        $Insert->IngresarSections($color, $descripcion, $orden, $_SESSION['ID'], $_SESSION['ID'], true);
        header("Location: ../Sections.php");
    }
    else
    {
        header("Location: ../Sections.php");
        exit();
    }
?>