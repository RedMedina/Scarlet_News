<?php
   require_once ("../app/init.php");
   header("Location: ".$fbAuth->getAuthURL()); 
?>