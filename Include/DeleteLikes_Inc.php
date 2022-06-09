<?php
    include "../classes/Conexion.classes.php";
    include "../classes/Likes.classes.php";
    session_start();
    if(isset($_POST['btnLikes']))
    {
       $IDNew = $_POST['NewID'];
       $Like = new LikesN;
       $Like->EliminarLike($IDNew, $_SESSION['ID']);
       $NuevosLikes = $Like->NewLikes($IDNew);

       echo json_encode($NuevosLikes);
    }
    else
    {
        header("Location: ../index.php");
    }
?>