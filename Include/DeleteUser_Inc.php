<?php 
    include "../classes/UpdateUser.classes.php";
    include "../classes/News.classes.php";
    session_start();
    if(isset($_GET['BtnPFX']))
    {
        $DeleteUs = new UpdateUser;
        $DeleteUs->DeleteUser($_SESSION['ID'], $_SESSION['nombre']);
        if($_SESSION['UserRol'] == 2)
        {
            $Noticia = new News;
            $Noticia->DeleteNewFromUser($_SESSION['ID']);
        }
        header("Location: ../Logout.php");
    }
    else if(isset($_GET['BtnPFEditUS']) && $_SESSION['UserRol'] == 1)
    {
        $DeleteUs = new UpdateUser;
        $DeleteUs->DeleteUser($_GET['ID'], $_SESSION['nombre']);
        $Noticia = new News;
        $Noticia->DeleteNewFromUser($_GET['ID']);
        header("Location: ../Editor.php?Tag=Rep");
    }
    else
    {
        header("Location: ../Porfile.php");
        exit();
    }
?>