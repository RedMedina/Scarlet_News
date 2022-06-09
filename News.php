<?php include("./templates/header.php") ?>
<?php include("./templates/perfil.php") ?>
<?php include "classes/Validaciones.classes.php"; ?>
<?php include "classes/NewClass.classes.php"; ?>
<?php include("classes/News.classes.php") ?>
<?php include("classes/Comentarios.classes.php") ?>
<?php include("classes/Comments.classes.php") ?>
<?php include("classes/Likes.classes.php") ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type='text/javascript' src="js/CrearComentarios.js"></script>
<script type='text/javascript' src="js/DeleteComments.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

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
    $Select = new News;
    $Noticia = $Select->SelecEditNew($_GET['New']);
?>

    <div class="NewsContent">
        <div class="NewsBox">
            <input type="hidden" id="IDNEW" value=<?php echo $_GET['New'];?>>
            <h1 class="tituloNews"><?php echo $Noticia->GetTitulo();?></h1>
            <p class="HoraNews"><?php echo $Noticia->getFechaDeNoticia(); echo " "; echo $Noticia->GetHora();?></p>
            <p class="AutorNews"><?php echo $Noticia->getReporterFirma();?></p>
            <img src=<?php echo $Noticia->GetFoto();?> width="600" height="350" class="ImagenMiniatura"><br><br>
            <p id="DescripcionText">
            <b>
                <?php 
                echo "En ";
                echo $Noticia->getCiudad();
                echo ", ";
                echo $Noticia->getEstado();
                echo ", ";
                echo $Noticia->getPais();
                echo ". ";
                echo $Noticia->GetDescripcion();
                ?>
            </b>
            </p> <!--La descripción tendrá la fecha y lugar de la noticia-->
            <p class="ContenidoText">
            <?php echo $Noticia->getTexto();?>
            </p><br><br>

            <!--Galeria de video e imagenes-->
            <?php
                $Imagenes = $Select->SelectEditMedia($_GET["New"]);
                $i = 0;
                while($i < count($Imagenes))
                {
                    if($Imagenes[$i]->getTipo() == "Imagen")
                    {   
            ?>
                 <img src=<?php echo $Imagenes[$i]->getContenido() ?> width="300" height="200" class="ImgGaleriaN">
            <?php
                    }
                $i++;
                }
                echo "<br>";
                $Videos = $Select->SelectEditMedia($_GET["New"]);
                $i = 0;
                while($i < count($Videos))
                {   
                    if($Videos[$i]->getTipo() == "Video")
                    {                     
            ?>
                <video src=<?php echo $Videos[$i]->getContenido(); ?> controls width="520" height="300" class="VideoGaleriaN"></video><br>
            <?php
                    }        
                    $i++;
                }
            ?>

            <p style="float: right; font-family:Candara;"><?php echo $Noticia->getFechaDeNoticia(); echo " "; echo $Noticia->GetHora();?></p><br><br>
        </div><br>
        
        <div class="PalabrasClaveNews">
            <?php
                $KeyWords = $Select->SelectEditKeys($_GET["New"]);
                $i = 0;
                while($i < count($KeyWords))
                {
            ?>
            <button class="PCN"><?php echo $KeyWords[$i]->getTexto();?></button>
            <?php
                $i++;
                }
            ?>
        </div><br>

        
        <div class="newsLikes">
           <input type="hidden" name="NewID" id="NewID" value=<?php echo $_GET["New"];?>>
           <input type="hidden" name="LikedID" id="LikedID" value="False">
           <button class="btnLikes" id="btnLikes" name="btnLikes">a</button>
        </div><br>

        <div class="NoticiasRelacionadasNews">
            <h3>Recomendados: </h3>
            <?php
                $NotRel = $Select->NoticiaRel($KeyWords[1]->getTexto(), $_GET["New"]);
                $l = 0;
                while($l < count($NotRel)){
            ?>
            <div class="NoticaRel1"><a href="News.php?New=<?php echo $NotRel[$l]->GetID();?>"><center><img src=<?php echo $NotRel[$l]->GetFoto();?> width="200" height="150"><h4><?php echo $NotRel[$l]->GetTitulo();?></h4></center></a></div>
            <?php
                    $l++;
                }
            ?>
        </div>
        <br>

        <?php
            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        ?>
        <form action="Include/InsertComments_Inc.php" method="post">
        <div class="newsComments">
            <img src=<?php echo $_SESSION['imagen']; ?> width="75" height="75"><br>
            <textarea type="text" name="CommentNews-1" id="CommentNews-1" placeholder="Escriba un comentario..." class="inputCN"></textarea><br>
            <input type="hidden" id="IdUS-1" name="IdUS-1" value=<?php echo $_SESSION['ID']; ?>>
            <input type="hidden" id="TipoCom-1" name="TipoCom-1" value="1">
            <input type="hidden" id="UserAns-1" name="UserAns-1" >
            <input type="hidden" id="ComAns-1" name="ComAns-1" >
            <input type="hidden" name="IDResponse" value="-1">
            <input type="hidden" id="NewCom-1" name="NewCom-1" value=<?php echo $_GET['New']; ?>>
            <button class="EnviarBtnNews" name="EnviarBtnNews"><i class="material-icons" style="position:relative;left:1px; top:2px">send</i></button>
        </div>
        </form>
                
        <?php
            }
        ?>

        <div class="newsComments" id="ListaDeComentarios" name="ListaDeComentarios">
                <?php
                    $SelectComments = new Comments;
                    $i = 0;
                    $j = 0;
                    $Com = $SelectComments->SelectComments($_GET["New"], 1);
                    while($i < count($Com))
                    {
                ?>
                    <div class="ComentariosNews">
                    <img src=<?php echo $Com[$i]->getImagen();?> class="ImgCom">
                        <div class="Espaciocoment">
                            <p class="ComentariosNewsPName">
                                <?php
                                echo $Com[$i]->getAutor();
                                ?>
                            </p>
                            <p class="ComentariosNewsP">
                                <?php
                                echo $Com[$i]->getComentario();
                                ?>
                            </p>
                            <p class="FechaComNewsP"><?php echo $Com[$i]->getFechaCom();?></p>
                        </div>
                    </div>
                    <?php
                        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
                        if($_SESSION['UserRol'] == 2 && $_SESSION['ID'] == $Noticia->getReporter() || $_SESSION['UserRol'] == 1){
                    ?>
                        <input type="hidden" name="BorrarComP<?php echo $i;?>" id="BorrarComP<?php echo $i;?>" value=<?php echo $Com[$i]->getIDComentario();?>>
                        <button id="BorrarCom" class="BorrarCom" onclick="EliminarComentarios(<?php echo $_GET['New']?>,<?php echo $Com[$i]->getIDComentario()?>)" data-id='<?php echo $Com[$i]->getIDComentario();?>'>X Borrar Comentario</button>
                    <?php
                        }
                        }
                        $Com2 = $SelectComments->SelectComments($_GET["New"], 2);
                        while($j < count($Com2))
                        {
                    ?>
                        <div class="MoverCom">
                        <?php
                        if($Com2[$j]->getCommentAnswer() == $Com[$i]->getIDComentario())
                        {
                            echo "<p class='ComentariosNewsPName2'>".$Com2[$j]->getAutor()."</p>";
                            echo "<div class='Espaciocoment'>
                                 <img src=".$Com2[$j]->getImagen()." class='ImgComCom'>
                                 <p class='ComentariosNewsP2'>";
                            echo $Com2[$j]->getComentario();
                            echo "</p>
                                  <p class='FechaComNewsP2'>".$Com2[$j]->getFechaCom()."</p>
                                 </div>";
                            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
                            if($_SESSION['UserRol'] == 2 && $_SESSION['ID'] == $Noticia->getReporter() || $_SESSION['UserRol'] == 1) {
                                echo "<input type='hidden' name='BorrarComS".$j."' id='BorrarComS".$j."' value='".$Com2[$j]->getIDComentario()."'>";
                                echo "<button id='BorrarComS' class='BorrarCom' onclick='EliminarComentarios(".$_GET['New'].", ".$Com2[$j]->getIDComentario().")' data-id='".$Com2[$j]->getIDComentario()."'>X Borrar Comentario</button>";
                            }
                        }
                        }
                        ?>
                        </div>
                        <?php
                            $j++;
                        }
                        $j = 0;
                        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
                        echo "<form  action='Include/InsertComments_Inc.php' method='post'>";
                        echo "<input type='hidden' name='IdUS".$i."' id='IdUS".$i."' value='".$_SESSION['ID']."'>";
                        echo "<input type='hidden' name='NewCom".$i."' id='NewCom".$i."' value='".$_GET["New"]."'>";                       
                        echo "<input type='hidden' id='TipoCom".$i."' name='TipoCom".$i."' value='2'>";
                        echo "<input type='hidden' id='UserAns".$i."' name='UserAns".$i."' value='".$Com[$i]->getAutor()."'>";
                        echo "<input type='hidden' id='ComAns".$i."' name='ComAns".$i."' value='".$Com[$i]->getIDComentario()."'>";
                        echo "<input type='hidden' id='IDResponse' name='IDResponse' value='".$i."'>";      
                        echo "<textarea class='ComentarioCom' name='CommentNews".$i."' id='CommentNews".$i."' placeholder='Responder...'></textarea>";
                        echo "<button class='btnEnviarComCom' id='btnEnviarComCom' name='EnviarBtnNews'>Enviar</button>";
                        echo "</form>";
                        }
                        $i++;
                        }
                ?>
        </div>


    </div>

<?php include("./templates/footer.php") ?>