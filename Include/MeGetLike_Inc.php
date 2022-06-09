<?php
    include "../classes/Conexion.classes.php";
    include "../classes/Likes.classes.php";
    session_start();
     if(isset($_POST['MeLikes']))
     {
        $IDNew = $_POST['NewsL'];
        $Like = new LikesN;
        echo json_encode($Like->MeLikes($IDNew, $_SESSION['ID']));
     }
     else
     {
         header("Location: ../index.php");
     }
?>