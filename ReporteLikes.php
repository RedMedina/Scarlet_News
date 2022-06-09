<?php include("./templates/header.php") ?>
<?php include("./templates/perfil.php") ?>
<script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="js/ReporteLikes.js"></script>
<?php include "classes/NewClass.classes.php"; ?>
<?php include "classes/SectionReport.classes.php"; ?>
<?php include ("classes/Comentarios.classes.php") ?>
<?php include "classes/ReporteLikesClasses.classes.php"; ?>
<?php include "classes/ReporteL.classes.php"; ?>


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

<?php
    $SectionSelect = new Secciones;
    $Seccion = $SectionSelect->SelectFirstSeccion();
    $i = 0;
?>

<center>
<div class="ContenidoLikes">
    <form action="ReporteLikes.php" method="get">
    <div class="ContenidoRLikes">
        <h3 class="TiRep">Generar Reporte</h3>
        Sección: 
        <select name="SeccionN" id="SeccionN" class="SeccionN">
            <option value="-1" name="SeccionN">Todas</option>
            <?php
                while($i < count($Seccion)){ 
            ?>
                <option name="SeccionN" value=<?php echo $Seccion[$i]->GetID();?>><?php echo $Seccion[$i]->GetDesc();?></option>
            <?php
                $i++;
            }
        ?>
        </select><br><br>
        Fecha Inicial: <input type="date" name="FechaInRL" id="FechaInRL" class="FechaInRL"><br><br>
        Fecha Final: <input type="date" name="FechaFinRL" id="FechaFinRL" class="FechaFinRL"><br><br>
        <input type="radio" name="RadioOp" id="RadioOp" value="PNoticia" required>Por Noticias <br><br>
        <input type="radio" name="RadioOp" id="RadioOp" value="PSeccion" required>Por Secciones <br><br>
        <button id="GenerarRep" name="GenerarRep" class="GenerarRep">Generar Reporte</button>
    </div>
    </form>
</div>

<?php
    if(isset($_GET['GenerarRep']))
    {
       $Seccion = $_GET['SeccionN'];
       $FechaIn = $_GET['FechaInRL'];
       $FechaFin = $_GET['FechaFinRL'];
       $Tipo = $_GET['RadioOp'];
       $k = 0;
       $CantLikes = array();

       $ReporteLikess = new ReporteLikesR;
       $Reporte = $ReporteLikess->SelectIDNews();
       while($k < count($Reporte))
       {
            $Reporte[$k]->setLikes($ReporteLikess->SelectLikesT($Reporte[$k]->getID()));
            array_push($CantLikes, $Reporte[$k]);
            $k++;
       }

       $longitud = count($CantLikes);
        for ($i = 0; $i < $longitud; $i++) {
            for ($j = 0; $j < $longitud - 1; $j++) {
                if ($CantLikes[$j]->getLikes() < $CantLikes[$j + 1]->getLikes()) {
                    $temporal = $CantLikes[$j];
                    $CantLikes[$j] = $CantLikes[$j + 1];
                    $CantLikes[$j + 1] = $temporal;
                }
            }
        }


        $SeccionesTipo = new Secciones;
        $SeccionesTipo_1 = $SeccionesTipo->SeleccionarReporteSeccion();
        $SeccionReporte = array();
        $l = 0;
        while($l < count($SeccionesTipo_1))
        {
            $r = 0;
            $LikesTotal = 0;
            $SR = new SeccionReport;
            $SR->setID($SeccionesTipo_1[$l]->GetID());
            $SR->setDesc($SeccionesTipo_1[$l]->GetDesc());
            $SR->setFecha($SeccionesTipo_1[$l]->getFecha());
            $SR->setColor($SeccionesTipo_1[$l]->GetColor());
            while($r < count($CantLikes))
            {
                if($CantLikes[$r]->getSeccion() == $SeccionesTipo_1[$l]->GetID())
                {
                    $LikesTotal = $LikesTotal + $CantLikes[$r]->getLikes();
                }
                $r++;
            }
            $SR->setLikes($LikesTotal);
            array_push($SeccionReporte, $SR);
            $l++;
        }



        $longitud2 = count($SeccionReporte);
            for ($m = 0; $m < $longitud2; $m++) {
                for ($n = 0; $n < $longitud2 - 1; $n++) {
                    if ($SeccionReporte[$n]->getLikes() < $SeccionReporte[$n + 1]->getLikes()) {
                        $temporal = $SeccionReporte[$n];
                        $SeccionReporte[$n] = $SeccionReporte[$n + 1];
                        $SeccionReporte[$n + 1] = $temporal;
                    }
                }
        }   


        if($Tipo == "PSeccion")
        {
        
        $b = 0;
        $SeccionReporteDeLikes = array();
        while($b < count($SeccionReporte))
        {
            $Sec = new SeccionReport;
            $Sec = $ReporteLikess->ReporteLikesSeccion($FechaIn, $FechaFin, $SeccionReporte[$b]->getID(), $SeccionReporte[$b]->getLikes());
            $b++;
            array_push($SeccionReporteDeLikes, $Sec);
        }

        $a = 0;
        while($a < count($SeccionReporteDeLikes))
        {
            echo "<div class='SeccionRCont' style='background-color:".$SeccionReporteDeLikes[$a]->getColor()."'>";
            echo "<p>";
            echo $SeccionReporteDeLikes[$a]->getDesc();
            echo "<br>";
            echo "Likes: ".$SeccionReporteDeLikes[$a]->getLikes();
            echo "<br>";
            echo "Fecha de Creación: <br>";
            echo $SeccionReporteDeLikes[$a]->getFecha();
            echo "</p>";
            echo "</div>";
            echo "<br>";
            $a++;
        }
        }
        else{
        $z = 0;
        $Noticia = array();
        while($z < count($CantLikes))
        {
            $not = new Noticias;
            $not = $ReporteLikess->ReporteLikes($FechaIn, $FechaFin, $Seccion, $CantLikes[$z]->getID());
            $z++;
            array_push($Noticia, $not);
        }

        $y = 0;
        while($y < count($Noticia))
        {
            if(!empty($Noticia[$y]->GetTitulo())){
            echo "<div class='ReporteNewL'>";
            $Seccion = new Secciones;
            $Section = $Seccion->SelectRepLikesNew($Noticia[$y]->getSeccion());
            echo "<h3>".$Noticia[$y]->GetTitulo()."</h3>";
            echo "<div class='SeccionR' style='background-color:".$Section->GetColor()."'><p>".$Section->GetDesc()."</p></div>";
            echo "<div class='FechaR'>".$Noticia[$y]->getFechaDeNoticia()."<div>";
            echo "<div>";
            $p = 0;
            $Likes = 0;
            while($p < count($CantLikes))
            {
                if($CantLikes[$p]->getID() == $Noticia[$y]->GetID())
                {
                    $Likes = $CantLikes[$p]->getLikes();
                }
                $p++;
            }
            echo "Likes: ". $Likes;
            echo "</div>";
            $CantComments = $ReporteLikess->SelectComments($Noticia[$y]->GetID());
            echo "<div> Comentarios: ".$CantComments."</div>";
            echo "<br>";
            }
            $y++;
        }
        }
    }
?>

</center>


<?php include("./templates/footer.php") ?>