<?php
 include "../classes/Validaciones.classes.php";
 include "../classes/NewClass.classes.php";
 include "../classes/Conexion.classes.php";
 include "../classes/News.classes.php";
session_start();
    if(isset($_GET['DelNew']) && ($_SESSION['UserRol'] == 1 || $_SESSION['UserRol'] == 2))
    {
        $NuevaNoticia = new News;
        $NuevaNoticia->DeleteNew($_GET['IDNew']);
        if($_GET['Ad'] == "Reporter")
        {
            header("Location: ../Reporter.php");
        }else
        {
            header("Location: ../Editor.php?Tag=News");
        }
    }
    else
    {
        header("Location: ../index.php");
    }
?>