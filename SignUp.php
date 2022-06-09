<?php include("./templates/header.php") ?>

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

?>

<div class="contenidoRegUs">
    <div class="cabeceraRegUs">
        <h2>Crear Cuenta</h2>
    </div>
        <div class="contenidoRegUS">
            <form method="post" action="Include/Register_Inc.php" onsubmit="return ValInS()" enctype="multipart/form-data">
            <input type="text" name="NameRegUs" id="NameRegUs" placeholder="Nombre Completo..." class="inputRegUS" required><br><br>
            <input type="text" name="UsRegUs" id="UsRegUs" placeholder="Usuario..." class="inputRegUS" required><br><br>
            <input type="mail" name="CRegUs" id="CRegUs" placeholder="Correo..." class="inputRegUS" required><br><br><br>
            <label for="file-upload" class="custom-file-upload" style="border: 1px solid #ccc;display: inline-block;padding: 6px 12px;cursor: pointer;  background-color: #F7F7F7; font-family: Candara;border-radius: 35px;position:relative;left:170px;" name="imgPefil"  required>
            <i class="fa fa-cloud-upload"></i> Imagen de Perfil
            </label><br>
            <input type="file" style="display: none;"class="file-upload" name="imgPefilRegUs" id="file-upload" onchange="encodeImageFileAsURL(this);" accept="image/png, .jpeg, .jpg, image/gif" required >
            <?php
                if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['UserRol'] == 1){
            ?>
            <select name="UsRol" class="inputRegUS">
                <option name="UsRol" value="3">Usuario</option>
                <option name="UsRol" value="1">Editor</option>
                <option name="UsRol" value="2">Reportero</option>
            </select><br><br>
            <?php
                }
            ?>
            <input type="password" name="PassRegUs" id="PassRegUs" placeholder="Contraseña..." class="inputRegUS" required><br><br>
            <input type="password" name="CPassRegUs" id="CPassRegUs" placeholder="Confirmar Contraseña..." class="inputRegUS" required><br><br>
            <input type="submit" name="enviarBtnRegUs" class="enviarBtnRegUs" onclick="ValInS()"><br>
            <img id="imgus" class="imgUSUARIORegUs" width="130" heigth="130"><br>
            <script src="Js/PreImagen.js"></script>
            </form>
        </div>
</div>

<?php include("./templates/footer.php") ?>