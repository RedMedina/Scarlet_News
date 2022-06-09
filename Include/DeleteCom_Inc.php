<?php
include "../classes/Conexion.classes.php";
include "../classes/Comments.classes.php";
    if(isset($_GET["DeleteComBtn"]))
    {
        $IDCom = $_GET['IdCom'];
        $IDNew = $_GET['IdNew'];
        $Data = new Comments;
        $Data->DeleteComments($IDCom);
        //json_encode("Delete comment success");
        header("Location: ../News.php?New=".$IDNew);
    }
    else
    {
        header("Location: ../index.php");
    }
?>