<?php

session_start();
unset ($SESSION['username']);
unset ($_SESSION['loggedin']);
unset ($_SESSION['nombre']);
unset ($_SESSION['usuario']);
unset ($_SESSION['email']);
unset ($_SESSION['firma']);
unset ($_SESSION['imagen']);
unset ($_SESSION['Status']);
unset ($_SESSION['UserRol']);
session_destroy();

header('Location: index.php');

?>