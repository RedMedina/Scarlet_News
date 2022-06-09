<?php
    include "../classes/Conexion.classes.php";
    include "../classes/Sections.classes.php";
    include "../classes/Validaciones.classes.php";
    include "../classes/News.classes.php";
    session_start();
    if(isset($_GET['E']) && $_SESSION['UserRol'] == 1)
    {
        $Section = new Secciones;
        $Section->DeleteSection($_GET['ID'], $_SESSION['ID']);
        $New = new News;
        $New->DeleteNewFromSection($_GET['ID']);
        header("Location: ../Editor.php?Tag=Sec");
    }
    else
    {
        header("Location: ../index.php");
    }
?>