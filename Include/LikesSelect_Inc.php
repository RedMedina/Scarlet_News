<?php
    include "../classes/Conexion.classes.php";
    include "../classes/Likes.classes.php";
     
     if(isset($_POST['LikesR']))
     {
        $IDNew = $_POST['NewsL'];
        $Like = new LikesN;
        $Like->NewLikes($IDNew);

        echo json_encode($Like->NewLikes($IDNew));
     }
     else
     {
         header("Location: ../index.php");
     }
?>