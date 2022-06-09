<?php
    include "../classes/InicioSesion.classes.php";
    //include "../classes/Usuarios.classes.php";

    if(isset($_POST['EnviarIS']))
    {
        $Usuario = $_POST['usInS'];
        $Password = $_POST['pasInS'];
        $InicioSesion = new InicioSesion;
        $Usuarios = new Usuario;
        $Usuarios = $InicioSesion->InicioSesions($Usuario, $Password);
        if(is_null($Usuarios))
        {
            header("Location: ../login.php?error=Incorrecto");
            exit();
        }
        else
        {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['ID'] = $Usuarios->GetID();
            $_SESSION['nombre'] = $Usuarios->GetNombre();
            $_SESSION['usuario'] = $Usuarios->GetUser();
            $_SESSION['email'] = $Usuarios->GetEmail();
            $_SESSION['firma'] = $Usuarios->GetFirma();
            $_SESSION['imagen'] = $Usuarios->GetFoto();
            $_SESSION['Status'] = $Usuarios->GetStatus();
            $_SESSION['UserRol'] = $Usuarios->GetUserRol();
            $_SESSION['DeleteUS'] = false;
            header("Location: ../index.php");
        }
    }
    else
    {
        header("Location: ../index.php");
    }
?>