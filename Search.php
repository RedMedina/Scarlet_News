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
    <div class="ContenidoBusqAv">
        <center>
        <div class="BusqAvC">
            <form method="get" action="index.php"><br>
            <h3>Busqueda Avanzada</h3>
            <p>Fecha Inicial: </p><input type="date" name="FCAnt" id="FCAnt"placeholder="Fecha Anterior..." class="inputBusqAv"><br><br>
            <p>Fecha Final: </p><input type="date" name="FCDesp" id="FCDesp"placeholder="Fecha Posterior..." class="inputBusqAv"><br><br>
            <input type="text" name="TextBsqAV" placeholder="Texto..." class="inputBusqAv"><br><br>
            <input type="text" name="PalabraCBsqAV" placeholder="Palabra Clave..." class="inputBusqAv"><br><br>
            <input type="hidden" name="BusquedaAv" value="true">
            <button class="BtnBusqAv">Buscar</button>
            </form>
        </div>
        </center>
    </div>

<?php include("./templates/footer.php") ?>