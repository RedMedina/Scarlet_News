<?php include("./templates/header.php") ?>

<?php include("./templates/perfil.php") ?>
<?//php include "classes/Conexion.classes.php"; ?>
<?php include "classes/Validaciones.classes.php"; ?>
<?php include "classes/NewClass.classes.php"; ?>
<?php include 'classes/News.classes.php'; ?>

<?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['UserRol'] == 1)
    {
        header("Location: index.php");
    }
    else if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['UserRol'] == 2)
    {
        include("./templates/sidebarReporter.php");
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

    <div class="ContenidoReporter">
        
        <button class="btnCrearNotR" onclick="location.href='CNews.php'"><i class="fa fa-fw fa-plus"></i> Crear Noticia</button><br><br>

        <?php
            $Select = new News;
            $Noticias = $Select->SelectEditorReporter_Rep($_SESSION['ID']);
            $i = 0;
            while($i < count($Noticias)){
        ?>
        <div class="NoticiaReporter">
            <img src=<?php echo $Noticias[$i]->GetFoto();?> width="300" heigth="300">
            <div class="TextoNoticiaRep">
            <h4 class="TituloNews"><?php echo $Noticias[$i]->GetTitulo();?></h4>
            <p class="DescripcionNews"><?php echo $Noticias[$i]->GetDescripcion();?></p>
            </div>
            <button class="btnEditarN" onclick="location.href='CNews.php?Edit=true&ID=<?php echo $Noticias[$i]->GetID();?>'">Editar</button><br>
            <input type="hidden" id="iDNew" value=<?php echo $Noticias[$i]->GetID();?>>
            <button class="btnBorrarN" onclick="BorrarNoticiaR(<?php echo $Noticias[$i]->GetID();?>)">Borrar</button>
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
            <div class="RetroAlimNR"><h4>Retroalimentación: </h4><br><p><?php echo $Noticias[$i]->getRetro();?></p></div>
        </div>
        <br><br>
        <?php
            $i++;
        }  
        ?>
        

    </div>

<?php include("./templates/footer.php") ?>