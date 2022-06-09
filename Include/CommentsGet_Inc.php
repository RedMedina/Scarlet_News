<?php
 include "../classes/Conexion.classes.php";
 include "../classes/Comments.classes.php";
    if(isset($_POST['CommentP']))
    {
        $Data = new Comments;
        $Comentarios = $Data->SelectComments($_POST["idNoticia"], $_POST["TipoComment"]);
        echo json_encode($Comentarios);
    }
?>