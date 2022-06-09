<?php include("./templates/header.php") ?>

<?php include("./templates/perfil.php") ?>
<?php include "classes/Validaciones.classes.php"; ?>
<?php include "classes/NewClass.classes.php"; ?>
<?php include("classes/News.classes.php") ?>
<?php include("classes/Busqueda.classes.php") ?>


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

<?php
if(isset($_GET['Sec']) && isset($_GET['ID']))
    {
        $Select = new News;
        $Noticias = $Select->IndexNewSelectSection($_GET['ID']);
        $i = 0;
        while($i < count($Noticias)){
?>
<div class="contenido">
    <br>
    <div class="noticia">
        <a href="News.php?New=<?php echo $Noticias[$i]->GetID();?>">
        <img src=<?php echo $Noticias[$i]->GetFoto();?> width="600" height="337">
        <h2 class="tNoti"><?php echo $Noticias[$i]->GetTitulo();?></h2>
        <p class="pnot"><?php echo $Noticias[$i]->GetDescripcion();?>    
        </p>
        <p class="horaNot"><?php echo $Noticias[$i]->getFechaDeNoticia();?></p>
        </a>
    </div>
</div>

<?php
    $i++;
        }
    }
else if(isset($_GET['BusquedaAv']))
{
    $FechaIn = $_GET['FCAnt'];
    $FechaFin = $_GET['FCDesp'];
    $Texto= $_GET['TextBsqAV'];
    $PClave = $_GET['PalabraCBsqAV'];

    $Busqueda = new Busqueda;
    $Noticias = $Busqueda->BusquedaAv($FechaIn, $FechaFin, $Texto, $PClave);
    $j = 0;
    while($j < count($Noticias)){
?>
    <div class="contenido">
        <br>
        <div class="noticia">
        <a href="News.php?New=<?php echo $Noticias[$j]->GetID();?>">
        <img src=<?php echo $Noticias[$j]->GetFoto();?> width="600" height="337">
        <h2 class="tNoti"><?php echo $Noticias[$j]->GetTitulo();?></h2>
        <p class="pnot"><?php echo $Noticias[$j]->GetDescripcion();?>    
        </p>
        <p class="horaNot"><?php echo $Noticias[$j]->getFechaDeNoticia();?></p>
        </a>
        </div>
    </div>
<?php
        $j++;
    }
}   
else
{
?>
<?php
    $Select = new News;
    $Noticias = $Select->IndexNewSelect();
    $i = 0;
    while($i < count($Noticias))
    {
?>
<div class="contenido">
    <br>
    <div class="noticia">
        <a href="News.php?New=<?php echo $Noticias[$i]->GetID();?>">
        <img src=<?php echo $Noticias[$i]->GetFoto();?> width="600" height="337">
        <h2 class="tNoti"><?php echo $Noticias[$i]->GetTitulo();?></h2>
        <p class="pnot"><?php echo $Noticias[$i]->GetDescripcion();?>    
        </p>
        <p class="horaNot"><?php echo $Noticias[$i]->getFechaDeNoticia();?></p>
        </a>
    </div>
</div>

<?php
    $i++;
    }
}
?>

<?php include("./templates/footer.php") ?>
