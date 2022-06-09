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

    <div class="contenidoLogin">
        <br>
        <center>
        <div class="InicioSesionContenido">
            <div class="CabeceraInicioS">
                <h2>Inicio Sesión</h2>
            </div>
            <div class="ContenidoInicioS">
                <form method="post" action="./Include/InicioSesion_Inc.php">
                <div class="usSend"><i class="gg-mail"style="top: 11px;"></i></div>
                <input type="text" name="usInS" id="usInS" class="usInS" placeholder="usuario..." required>
                <div class="passSend"><i class="gg-lock" style="top: 7px;"></i></div>
                <input type="password" name="pasInS" id="pasInS" class="pasInS" placeholder="contraseña..." required>
                <button class="btnLogin" type="submit" name="EnviarIS"><i class="gg-arrow-long-right" style="left: 5px;"></i></button>
                </form>
                <a class="regUsIn" href="SignUp.php">Registrarse</a>
                <form action="Include/FacebookLogin_Inc.php" method="post">
                    <button class="LoginFBBtn"><i class="gg-facebook" style="postion:relative; top:8px"></i><div>Ingresar con Facebook</div></button>
                </form>
            </div>
        </div>
        </center>
    </div>      

<?php include("./templates/footer.php") ?>