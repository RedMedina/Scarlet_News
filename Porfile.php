<?php include("./templates/header.php") ?>
<?php include 'classes/SelectRep.classes.php'; ?>
<link rel="stylesheet" href="css/bootstrap.css">
<link href='https://css.gg/close.css' rel='stylesheet'>

<?php include("./templates/perfil.php") ?>

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

<div class="contenidoPerfil">
<?php
    if(isset($_GET["EditRep"]) && $_GET["EditRep"] == true && $_SESSION['UserRol'] == 1)
    {
        $SelectReporter = new SelectRep;
        $Reporter = $SelectReporter->ConsultaDatosReporter($_GET["ID"]);
?>

<center>
    <div class="PerfilContent" id="PerfilContent">
        <form action="Include/UpdateUser_Inc.php" method="post" onsubmit="return ValPerS()" enctype="multipart/form-data"><br>
        <label for="file-upload" class="btn2PF"><img src=<?php echo $Reporter->GetFoto()?> class="ImgPF" id="imgus" width="190" heigth="190"></label><br>
        <input type="file" name="ImagenP" class="imgP" id="file-upload" onchange="encodeImageFileAsURL(this);">
        <h3><?php echo $Reporter->GetUser()?></h3>
        <input type="text" name="namePF" id="namePF" required class="InputPF" value=<?php echo $Reporter->GetNombre()?>><br><br>
        <input type="text" name="UsPF" id="UsPF" required class="InputPF" value=<?php echo $Reporter->GetUser()?>><br><br>
        <input type="text" name="CorrPF" id="CorrPF" required class="InputPF" value=<?php echo $Reporter->GetEmail()?>><br><br>
        <input type="password" name="ContPF" id="ContPF"placeholder="Contraseña" required class="InputPF"><br><br>
        <input type="password" name="ConfContPF" id="ConfContPF"placeholder="Confirmar Contraseña" required class="InputPF"><br><br>
        <button class="BtnPF" type="submit" name="BtnPF" onclick="ValPerS()">Guardar</button><br><br>
        <input type="hidden" name="idPF" id="idPF" value=<?php echo $_GET['ID']?>>
        <input type="hidden" name="edit" value="true">
        </form>
        <button class="BtnPFX" type="submit" onclick="EliminarCuentaRep()" id="BtnPFEditUS" name="BtnPFEditUS"><i class="gg-close" style="left:4px;"></i></button>
        <script src="Js/PreImagen.js"></script>
    </div>
</center>

<?php
    }
    else
    {
?>
<center>
    <div class="PerfilContent" id="PerfilContent">
        <form action="Include/UpdateUser_Inc.php" method="post" onsubmit="return ValPerS()" enctype="multipart/form-data"><br>
        <label for="file-upload" class="btn2PF"><img src=<?php echo $_SESSION['imagen']?> class="ImgPF" id="imgus" width="190" heigth="190"></label><br>
        <input type="file" name="ImagenP" class="imgP" id="file-upload" onchange="encodeImageFileAsURL(this);">
        <h3><?php echo $_SESSION['usuario']?></h3>
        <input type="text" name="namePF" id="namePF" required class="InputPF" value=<?php echo $_SESSION['nombre']?>><br><br>
        <input type="text" name="UsPF" id="UsPF" required class="InputPF" value=<?php echo $_SESSION['usuario']?>><br><br>
        <input type="text" name="CorrPF" id="CorrPF" required class="InputPF" value=<?php echo $_SESSION['email']?>><br><br>
        <input type="password" name="ContPF" id="ContPF"placeholder="Contraseña" required class="InputPF"><br><br>
        <input type="password" name="ConfContPF" id="ConfContPF"placeholder="Confirmar Contraseña" required class="InputPF"><br><br>
        <button class="BtnPF" type="submit" name="BtnPF" onclick="ValPerS()">Guardar</button><br><br>
        <input type="hidden" name="idPF" id="idPF" value=<?php echo $_SESSION['ID']?>>
        </form>
        <button class="BtnPFX" type="submit" onclick="EliminarCuenta()" id="BtnPFX" name="BtnPFX"><i class="gg-close" style="left:4px;"></i></button>
        <script src="Js/PreImagen.js"></script><br>
        <?php
            if(isset($_SESSION['passwordfacebook']) && $_SESSION['passwordfacebook'] == true)
            {            
        ?>
        <a href="ContraseñaFacebook.php" class="CFBA">Cambiar Contraseña de Facebook</a>
        <?php
            }
        ?>
    </div>
</center>

<?php
 }
?>

</div>


<?php include("./templates/footer.php") ?>