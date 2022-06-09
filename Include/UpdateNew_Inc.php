<?php
     include "../classes/Validaciones.classes.php";
     include "../classes/NewClass.classes.php";
     include "../classes/Conexion.classes.php";
     include "../classes/News.classes.php";
    session_start();

    if(isset($_POST['CrearN']))
    {
        $NuevaNoticia = new News;
        $ID = $_POST['IDNew'];
        $Titulo = $_POST['TiNews'];
        $Pais = $_POST['PNews'];
        $Estado = $_POST['CNews'];
        $Ciudad = $_POST['CoNews'];
        $FechaNot = $_POST['FecNews'];
        $Descripcion = $_POST['DescNews'];
        $Texto = $_POST['TextNews'];
        $Estatus = $_POST['StatusNoticia'];
        $EditorStatus = $_POST['StatusNoticia'];
        $Seccion = $_POST['SeccionNews'];
        $Hora = $_POST['HorNews'];
        $RetroComm = $_POST['RetroCom'];
        $NuevaNoticia->UpdateNew($ID, $Titulo, $Pais, $Ciudad, $Estado, $FechaNot, $Descripcion, $Texto, $Estatus, $EditorStatus, $Seccion, $Hora, $RetroComm);
        //header("Location: ../CNews.php");
    }
    else
    {
        header("Location: ../CNews.php");
    }

?>