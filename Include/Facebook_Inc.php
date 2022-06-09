<?php
   require_once ("../app/init.php");   
   $fbAuth->login();
   header("Location: ../index.php");
?>