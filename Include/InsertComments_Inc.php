<?php
include "../classes/Conexion.classes.php";
include "../classes/Comentarios.classes.php";
include "../classes/Comments.classes.php";
    if(isset($_POST['EnviarBtnNews']))
    {
        $IDResponse = $_POST['IDResponse'];
        $Comentario = $_POST['CommentNews'.$IDResponse];
        $Autor  = $_POST['IdUS'.$IDResponse];
        $TipoComentario  = $_POST['TipoCom'.$IDResponse];
        $UserAns  = $_POST['UserAns'.$IDResponse];
        $ComentAns  = $_POST['ComAns'.$IDResponse];
        $ComNew  = $_POST['NewCom'.$IDResponse];
        $Data = new Comments;

        $Data->CreateComments($Comentario, $Autor, $TipoComentario, $UserAns, $ComentAns, $ComNew);
        header("Location: ../News.php?New=".$ComNew."");
    }
    else
    {
        header("Location: ../index.php");
    }
?>