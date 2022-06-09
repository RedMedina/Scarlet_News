<?php
 include "../classes/Validaciones.classes.php";
 include "../classes/NewClass.classes.php";
 include "../classes/Conexion.classes.php";
 include "../classes/News.classes.php";

    session_start();
    if(isset($_POST['CrearN']))
    {
        $NuevaNoticia = new News;
        $Titulo = $_POST['TiNews'];
        $Pais = $_POST['PNews'];
        $Ciudad = $_POST['CoNews'];
        $Estado = $_POST['CNews'];
        $Fecha = $_POST['FecNews'];
        $Firma =  $_SESSION['firma'];
        $Descripcion = $_POST['DescNews'];
        $Texto = $_POST['TextNews'];
        $Reportero = $_SESSION['ID'];
        $StatusNew = $_POST['StatusNoticia'];
        $Foto = $_POST['archivoIMG1'];
        $StatusEditor = "En Revision";
        $SecNew = $_POST['SeccionNews'];
        $Hora = $_POST['HorNews'];
        
        $NuevaNoticia->InsertarNoticia($Titulo, $Pais, $Ciudad, $Estado, $Fecha, $_SESSION['firma'], $Descripcion, $Texto, $_SESSION['ID'], $StatusNew, $Foto, $StatusEditor, $SecNew, $Hora);


        $NumVideos = $_POST['numV'];
        $NumImages = $_POST['numI'];
        $NumKeyWords = $_POST['numEtiq'];
        $i = 0;

        
        while($i < $NumVideos)
        {
            $Videos = $_POST['archivoVIDEO' . $i];
            $NuevaNoticia->InsertarMedia($Videos, "Video");
            $i++;
        }

        $i = 0;
        while($i < $NumImages)
        {
            $Images = $_POST['archivoIMG' . $i];
            $NuevaNoticia->InsertarMedia($Images, "Imagen");
            $i++;
        }

        $i = 0;
        while($i < $NumKeyWords)
        {
            $KeyWords = $_POST['EtiqHash' . $i];
            $NuevaNoticia->InsertarKeyWords($KeyWords);
            $i++;
        }
        //header("Location: ../CNews.php?Correcto=true");
    }
    else
    {
        header("Location: ../CNews.php?Error=BtnFailed");
    }
?>