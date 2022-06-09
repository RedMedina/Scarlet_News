
<?php include "classes/Validaciones.classes.php"; ?>
<?php include "classes/NewClass.classes.php"; ?>
<?php include 'classes/News.classes.php'; ?>
<?php include("./templates/header.php") ?>
<?php include("./templates/perfil.php") ?>

<script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="js/hashtags.js"></script>
<script type="text/javascript" src="js/API_paises.js"></script>
<script type="text/javascript" src="js/SelectionsURLv.js"></script>

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
        header("Location: index.php");
   }
   else if(!isset($_SESSION['loggedin']))
   {
       header("Location: index.php");
   }
   $SectionSelect = new Secciones;
   $Seccion = $SectionSelect->SelectFirstSeccion();
   $i = 0;
   
   $NoticiaEstado = new News;
   $NoticiaEstadoN = "";
   if(isset($_GET["Edit"])){$NoticiaEstadoN = $NoticiaEstado->SelecEditNew($_GET["ID"]);}
   
   if(isset($_GET["Edit"]) && $_GET["Edit"] == true && ($NoticiaEstadoN->GetStatus() != 3 && $NoticiaEstadoN->GetStatus() != 2))
   { 
    $NoticiaEdit = new News;
    $Noticia = $NoticiaEdit->SelecEditNew($_GET["ID"]);
?>
<div class="contenidoCNews">
    <div class="FormCNews">
    <form method="post" action="Include/UpdateNew_Inc.php" onsubmit="return ValCNews()"><br>
    <input type="hidden" name="IDNew" value=<?php echo $_GET["ID"];?>>
    <h3 class="textNNC">Editar Noticia</h3>
    <input type="text" name="TiNews" id="TiNews"class="InputNewsL" placeholder="Título" required value=<?php echo $Noticia->GetTitulo();?>><br><br>
    <select name="PNews" id="PNews"class="InputNewsL" placeholder="País" required><option value=<?php echo $Noticia->getPais();?> selected="selected"><?php echo $Noticia->getPais();?></option></select><br><br>
    <select name="CNews" id="CNews"class="InputNewsL" placeholder="Estado" required><option value=<?php echo $Noticia->getEstado();?> selected="selected"><?php echo $Noticia->getEstado();?></option></select><br><br>
    <select name="CoNews" id="CoNews"class="InputNewsL" placeholder="Ciudad" required><option value=<?php echo $Noticia->getCiudad();?> selected="selected"><?php echo $Noticia->getCiudad();?></option></select><br><br>
    <input type="date" name="FecNews" id="FecNews"class="InputNewsL" required value=<?php echo $Noticia->getFechaDeNoticia();?>><br><br>
    <input type="time" name="HorNews" id="HorNews"class="InputNewsL" required value=<?php echo $Noticia->GetHora();?>><br><br>
    
    <select name="SeccionNews" class="InputNewsL">
    <option value=<?php echo $Noticia->getSeccion();?> selected disabled hidden><?php echo $Noticia->getSeccion();?></option>
        <?php
            while($i < count($Seccion))
            {
        ?>
            <option name="SeccionNews" value=<?php echo $Seccion[$i]->GetID();?>><?php echo $Seccion[$i]->GetDesc();?></option>
         <?php
                $i++;
            }
        ?>
    </select><br><br>

    
    <label for="file-upload" class="custom-file-upload" style="border: 1px solid #ccc;display: inline-block;padding: 6px 12px;cursor: pointer;  background-color: #F7F7F7; font-family: Candara;border-radius: 35px;position:relative;left:57px;bottom:0px;" name="imgPefil"  required>
    <i class="fa fa-cloud-upload"></i> Imagenes
    </label><br>
    <input type="file" style="display: none;"class="file-upload" name="imgPefilRegUs" id="file-upload" onchange="encodeImageFileAsURL(this);" accept="image/png, .jpeg, .jpg, image/gif,video/mp4,video/x-m4v,video/*" required ><br>        
    <?php
        $Imagenes = $NoticiaEdit->SelectEditMedia($_GET["ID"]);
        $j = 0;
        $k = 0;
    ?>
    <div id="ArchivosI" class="ArchivosI">
        <?php
            while($j < count($Imagenes))
            {
                if($Imagenes[$j]->getTipo() == "Imagen")
                {
                    echo "<input type='hidden' name='archivoIMG".$k."'value=".$Imagenes[$j]->getContenido()."><img src=".$Imagenes[$j]->getContenido()." height='150' width='200' class='imgMediaCN'>";
                    $k++;
                }
                $j++;
            }
        ?>    
    </div>
    <input type="hidden" id="numI" name="numI" value=<?php echo $k;?>>

    <input type="text" name="DescNews" id="DescNews"class="InputNewsR" placeholder="Descripción" required value=<?php echo $Noticia->GetDescripcion();?>><br><br>
    <textarea name="TextNews" id="TextNews"class="InputNewsRT" placeholder="Texto" required><?php echo $Noticia->getTexto();?></textarea><br><br>

    
    <label for="file-upload2" class="custom-file-upload" style="border: 1px solid #ccc;display: inline-block;padding: 6px 12px;cursor: pointer;  background-color: #F7F7F7; font-family: Candara;border-radius: 35px;position:relative;left:520px;bottom:580px;" name="imgPefil2"  required>
    <i class="fa fa-cloud-upload"></i> Videos
    </label><br>
    <input type="file" style="display: none;"class="file-upload" name="imgPefilRegUs2" id="file-upload2" onchange="encodeVideoFileAsURL(this);" accept="image/png, .jpeg, .jpg, image/gif,video/mp4,video/x-m4v,video/*" required ><br>
    
    <?php
        $Videos = $NoticiaEdit->SelectEditMedia($_GET["ID"]);
        $x = 0;
        $y = 0;
    ?>
    <div id="ArchivosV" class="ArchivosV">
    <?php
            while($x < count($Videos))
            {
                if($Videos[$x]->getTipo() == "Video")
                {
                    echo "<input type='hidden' name='archivoVIDEO".$y."'value=".$Videos[$x]->getContenido()."><video src=".$Videos[$x]->getContenido()." height='150' width='200' controls class='VidMediaCN'>";
                    $y++;
                }
                $x++;
            }
        ?>  

    </div>
    <input type="hidden" id="numV" name="numV" value=<?php echo $y;?>>

    <div class="PalabrasCL"><button id="btnAgregarH"><i class="fa fa-fw fa-plus" style="position:relative;right:2px;top:1px;"></i></button><input type="text" name="newhashN" id="newhashN"placeholder="#Palabra Clave" class="hash2"></div><br><br>
    
    <div id="hashtags" class="hashtags">
        <?php
            $Hashtags = $NoticiaEdit->SelectEditKeys($_GET["ID"]);
            $w = 0;
            $z = 0;

            while($w < count($Hashtags))
            {
                echo "<div class='PalabrasCL'><input type='text' value=".$Hashtags[$w]->getTexto()." name='EtiqHash".$z."' id='EtiqHash".$z."'class='hash1'></div>";
                $z++;
                $w++;
            }
        ?>
        <input type="hidden" name="numEtiq" id="numEtiq" value=<?php echo $z;?>>
    </div>
    
    <?php
        if($_SESSION['UserRol'] == 2)
        {
    ?>
    <input type="radio" name="StatusNoticia" value="1" class="RadioS" <?php if($Noticia->GetStatus()==1){echo "checked";}?>><p class="PARRAS">En redacción</p> <br>
    <input type="radio" name="StatusNoticia" value="2" class="RadioS2" <?php if($Noticia->GetStatus()==2){echo "checked";}?>><p class="PARRAS2">Terminada</p><br><br>
    <?php
        }
        else
        {
    ?>
        <input type="Radio" name="StatusNoticia" value="3" class="RadioS" required <?php if($Noticia->GetStatus()==3){echo "checked";}?>><p class="PARRAS" style="position:relative; bottom:537px;">Aprobada</p><br><br>
        <input type="Radio" name="StatusNoticia" value="4" class="RadioS" required style="position:relative; bottom:645px;" <?php if($Noticia->GetStatus()==4){echo "checked";}?>><p class="PARRAS" style="position:relative; bottom:680px;">Rechazada</p><br><br>

    <?php
        }
    ?>
    <button class="CNBtn" onclick="ValCNews()" name="CrearN">Actualizar Noticia</button>
    <?php
        if($_SESSION['UserRol'] == 1){
    ?>
        <textarea name="RetroCom" id="RetroCom" placeholder="Retroalimentacion:" class="RetroComment"><?php echo $Noticia->getRetro();?></textarea>
    <?php
        }
    ?>
    </form>
    </div>
</div>
<?php
    } 
    else
    { 
?>

<div class="contenidoCNews">
    <div class="FormCNews">
    <form method="post" action="Include/InsertNew_Inc.php" onsubmit="return ValCNews()"><br>
    <h3 class="textNNC">Nueva Noticia</h3>
    <input type="text" name="TiNews" id="TiNews"class="InputNewsL" placeholder="Título" required><br><br>
    <select name="PNews" id="PNews"class="InputNewsL" placeholder="País" required></select><br><br>
    <select name="CNews" id="CNews"class="InputNewsL" placeholder="Estado" required></select><br><br>
    <select name="CoNews" id="CoNews"class="InputNewsL" placeholder="Ciudad" required></select><br><br>
    <input type="date" name="FecNews" id="FecNews"class="InputNewsL" required><br><br>
    <input type="time" name="HorNews" id="HorNews"class="InputNewsL" required><br><br>
    
    <select name="SeccionNews" class="InputNewsL">
        <?php
            while($i < count($Seccion))
            {
        ?>
            <option name="SeccionNews" value=<?php echo $Seccion[$i]->GetID();?>><?php echo $Seccion[$i]->GetDesc();?></option>
         <?php
                $i++;
            }
        ?>
    </select><br><br>

    <input type="hidden" id="numI" name="numI" value="0">
    <label for="file-upload" class="custom-file-upload" style="border: 1px solid #ccc;display: inline-block;padding: 6px 12px;cursor: pointer;  background-color: #F7F7F7; font-family: Candara;border-radius: 35px;position:relative;left:57px;bottom:0px;" name="imgPefil"  required>
    <i class="fa fa-cloud-upload"></i> Imagenes
    </label><br>
    <input type="file" style="display: none;"class="file-upload" name="imgPefilRegUs" id="file-upload" onchange="encodeImageFileAsURL(this);" accept="image/png, .jpeg, .jpg, image/gif,video/mp4,video/x-m4v,video/*" required ><br>        
    <div id="ArchivosI" class="ArchivosI"></div>

    <input type="text" name="DescNews" id="DescNews"class="InputNewsR" placeholder="Descripción" required><br><br>
    <textarea name="TextNews" id="TextNews"class="InputNewsRT" placeholder="Texto" required></textarea><br><br>

    <input type="hidden" id="numV" name="numV" value="0">
    <label for="file-upload2" class="custom-file-upload" style="border: 1px solid #ccc;display: inline-block;padding: 6px 12px;cursor: pointer;  background-color: #F7F7F7; font-family: Candara;border-radius: 35px;position:relative;left:520px;bottom:580px;" name="imgPefil2"  required>
    <i class="fa fa-cloud-upload"></i> Videos
    </label><br>
    <input type="file" style="display: none;"class="file-upload" name="imgPefilRegUs2" id="file-upload2" onchange="encodeVideoFileAsURL(this);" accept="image/png, .jpeg, .jpg, image/gif,video/mp4,video/x-m4v,video/*" required ><br>
    <div id="ArchivosV" class="ArchivosV"></div>
    
    <div class="PalabrasCL"><button id="btnAgregarH"><i class="fa fa-fw fa-plus" style="position:relative;right:2px;top:1px;"></i></button><input type="text" name="newhashN" id="newhashN"placeholder="#Palabra Clave" class="hash2"></div><br><br>
    <div id="hashtags" class="hashtags"><input type="hidden" name="numEtiq" id="numEtiq" value="0"></div>
    <?php
        if($_SESSION['UserRol'] == 2)
        {
    ?>
    <input type="radio" name="StatusNoticia" value="1" class="RadioS"><p class="PARRAS">En redacción</p> <br>
    <input type="radio" name="StatusNoticia" value="2" class="RadioS2"><p class="PARRAS2">Terminada</p><br><br>
    <?php
        }
        else
        {
    ?>
        <input type="checkbox" name="StatusNoticia" value="3" class="RadioS"><p class="PARRAS">Aprobada</p><br><br>
    <?php
        }
    ?>
    <button class="CNBtn" onclick="ValCNews()" name="CrearN">Crear Noticia</button>
    </form>
    </div>
</div>

<?php
}

?>

<?php include("./templates/footer.php") ?>