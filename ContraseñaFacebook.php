<?php include("./templates/header.php") ?>
<?php include("./templates/perfil.php") ?>
<link rel="stylesheet" href="css/bootstrap.css">

<?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['UserRol'] == 1)
    {
        include("./templates/sidebarEditor.php");
    }
    else if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['UserRol'] == 2)
    {
        include("./templates/sidebarReporter.php");
    }
    else if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['UserRol'] == 3)
    {
        include("./templates/sidebarUsuario.php");
    }
    else if(!isset($_SESSION['loggedin']))
    {
        header("Location: index.php");
    }
?>

<center>
<form action="Include/CambiarContraFB.php" method="post" class="CambiarCFB">
    Contraseña Actual: <input type="password" name="ContraAc" value=<?php echo $_SESSION['userkeyFacebook'];?>><br><br>
    Nueva Contraseña: <input type="password" name="NContra" placeholder = "Ingrese la Nueva Contraseña"><br><br>
    Confirmar Contraseña: <input type="password" name="NContraConf" placeholder = "Confirmar Contraseña"><br><br>
    <button name="BtNConfCnt">Enviar</button>
</form>
</center>

<?php include("./templates/footer.php") ?>