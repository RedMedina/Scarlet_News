<?php
    include "../classes/Conexion.classes.php";
    include "../classes/Likes.classes.php";
    session_start();
    if(isset($_POST['LikesI']))
    {
       $IDNew = $_POST['NewsL'];
       $Like = new LikesN;
       $Like->CrearLike($IDNew, $_SESSION['ID']);
       $NuevosLikes = $Like->NewLikes($IDNew);

       echo json_encode($NuevosLikes);
    }
    else
    {
        header("Location: ../index.php");
    }
?>