<?php
    include "../classes/Conexion.classes.php";
    include "../classes/Sections.classes.php";
    if(isset($_POST['BtnSections']))
    {
        session_start();
        $ID = $_POST['IDSect'];
        $color = $_POST['hiddenB'];
        $description = $_POST['NameSect'];
        $orden = $_POST['numSelect'];
    
        $UpdateSection = new Secciones;
        $UpdateSection->UpdateSection($ID, $color, $description, $orden, $_SESSION['ID']);
        header("Location: ../Editor.php?Tag=Sec");
    }else
    {
        header("Location: ../index.php");
    }
?>