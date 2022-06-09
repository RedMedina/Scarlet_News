
<?php include("./templates/header.php"); ?>
<?php include 'classes/SelectRep.classes.php'; ?>
<?php include "classes/NewClass.classes.php"; ?>
<?php include "classes/Validaciones.classes.php"; ?>
<?php include 'classes/News.classes.php'; ?>

<?php include("./templates/perfil.php"); ?>

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

    <div class="ContenidoEditor">

    <?php
        if($_GET['Tag'] == "News")
        {
            $Select = new News;
            $Noticias = $Select->SelectEditorReporter();
            $i = 0;
            while($i < count($Noticias)){
    ?>
        <div class="NoticiaReporter">
            <img src=<?php echo $Noticias[$i]->GetFoto();?> width="300" heigth="300">
            <div class="TextoNoticiaRep">
            <h4 class="TituloNews"><?php echo $Noticias[$i]->GetTitulo();?></h4>
            <p class="DescripcionNews"><?php echo $Noticias[$i]->GetDescripcion();?></p>
            </div>
            <button class="btnEditarN" onclick="location.href='CNews.php?Edit=true&ID=<?php echo $Noticias[$i]->GetID();?>'">Revisar</button><br>
            <input type="hidden" id="iDNewE" value=<?php echo $Noticias[$i]->GetID();?>>
            <button class="btnBorrarN" onclick="BorrarNoticiaE(<?php echo $Noticias[$i]->GetID();?>)">Borrar</button>
            <?php if($Noticias[$i]->GetStatus() == 1)
                  {
                    echo "<div class='RevisionN'></div><p class='StatusNews'>Redacción</p>";
                  }
                  else if ($Noticias[$i]->GetStatus() == 2)
                  {
                    echo "<div class='RevisionN'></div><p class='StatusNews'>Terminada</p>";
                  }
                  else if($Noticias[$i]->GetStatus() == 3)
                  {
                    echo "<div class='AceptadoN'></div><p class='StatusNews'>Publicada</p>";
                  }
                  else if($Noticias[$i]->GetStatus() == 4)
                  {
                    echo "<div class='NoAceptadoN'></div><p class='StatusNews'>Rechazada</p>";
                  }
            ?>
        </div>
        <br><br>
    <?php
        $i++;
            }
        }
        else if($_GET['Tag'] == "Rep")
        {
    ?>
        <center>
        <?php
            $select = new SelectRep;
            $Reporteros = $select->SelectReporters();
            $i = 0;
            while($i < count($Reporteros))
            {
        ?>
        <div class="EditorCuentas">
            <a href="Porfile.php?EditRep=true&ID=<?php echo $Reporteros[$i]->GetID();?>">
            <img src=<?php echo $Reporteros[$i]->GetFoto();?> width="150" heigth="150">
            <h3><?php echo $Reporteros[$i]->GetNombre();?></h3><div <?php if($Reporteros[$i]->GetStatus()==true){echo"class='StatusUsActive'";}else{echo"class='StatusUsInactivde'";}?>></div>
            </a>
        </div><br><br>
        
    <?php
            $i++;
            }
            echo "</center>";
        }
        else if($_GET['Tag'] == "Sec"){ 
            echo "<button class='btnNuevoSec' onclick=location.href='Sections.php'><i class='fa fa-fw fa-plus'></i> Nueva Sección</button>";
            $SectionSelect = new Secciones;
            $Seccion = $SectionSelect->SelectFirstSeccion();
            $i = 0;
            while($i < count($Seccion))
            {
    ?>
            <center>
            <div class="EditarSecciones" style="background-color: <?php echo $Seccion[$i]->GetColor();?>">
                <h3><?php echo $Seccion[$i]->GetDesc();?></h3>
                <button class="btnEditSec" onclick="location.href='Sections.php?Edit=true&ID=<?php echo $Seccion[$i]->GetID();?>'">Editar</button><br><br>
                <button class="btnDeleteSec" onclick="location.href='Include/DeleteSection_Inc.php?E=true&ID=<?php echo $Seccion[$i]->GetID();?>'">Borrar</button>
            </div>
            </center>
    <?php	
            $i++;
        }
    }
    ?>
    </div>

<?php include("./templates/footer.php") ?>