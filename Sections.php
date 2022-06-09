<?php include("./templates/header.php") ?>

<?php include("./templates/perfil.php") ?>

<?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['UserRol'] == 1)
    {
        include("./templates/sidebarEditor.php");
    }
    else if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['UserRol'] == 2)
    {
        header("Location: index.php");
    }
    else if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['UserRol'] == 3)
    {
        header("Location: index.php");
    }
    else if(!isset($_SESSION['loggedin']))
    {
       header("Location: index.php");
    }

?>

        <script type="text/javascript">
		    function Colores() {
  			    var x = document.getElementById("colorSect").value;
  			    document.getElementById("hiddenB").value = x;
		    }
    	</script>

<?php
    if(isset($_GET["Edit"]) && $_GET["Edit"] == true)
    {
        $SectionSelect = new Secciones;
        $Seccion = $SectionSelect->SelectEditSeccion($_GET["ID"]);
        if(is_null($Seccion))
        {
            header("Location: Editor.php?Tag=Sec");
        }
        else{       
?>

 <div class="ContenidoSect">
        <center>
        <div class="SectionsCC"><br>
        <form method="post" action="Include/UpdateSection_Inc.php">
            <h3>Editar Sección</h3>
            <input type="text" name="NameSect" id="NameSect" placeholder="Nombre..." class="inputSect" value=<?php echo $Seccion->GetDesc();?>><br><br>
            Color: <input type="color" name="colorSect" class="SectColor" id="colorSect" onchange="Colores()" value=<?php echo $Seccion->GetColor();?>><br><br>
            <input type="hidden" id="hiddenB" name="hiddenB" value=<?php echo $Seccion->GetColor();?>>
            <input type="hidden" name="IDSect" value=<?php echo $_GET["ID"];?>>
            <input type="number" name="numSelect" id="numSelect" class="inputSect" placeholder="Orden..." value=<?php echo $Seccion->GetOrden();?>><br><br>
            <button class="BtnSections" onclick="ValSect()" name="BtnSections">Guardar</button>
        </form>
            
        </div>
       
        </center>
    </div>

<?php
 }
    }
    else{
?>
    <div class="ContenidoSect">
        <center>
        <div class="SectionsCC"><br>
        <form method="post" action="Include/InsertSection_Inc.php">
            <h3>Nueva Sección</h3>
            <input type="text" name="NameSect" id="NameSect" placeholder="Nombre..." class="inputSect"><br><br>
            Color: <input type="color" name="colorSect" class="SectColor" id="colorSect" onchange="Colores()"><br><br>
            <input type="hidden" id="hiddenB" name="hiddenB">
            <input type="number" name="numSelect" id="numSelect" class="inputSect" placeholder="Orden..."><br><br>
            <button class="BtnSections" onclick="ValSect()" name="BtnSections">Guardar</button>
        </form>
            
        </div>
       
        </center>
    </div>
<?php
    }
?>

<?php include("./templates/footer.php") ?>