<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>ERROR</title>
</head>
<body>
    <?php
        if($_GET['error'] == 403)
        {    
    ?>
    <h3>ERROR 403:</h3><br>
    <p>No tiene autorización para este recurso.</p><br><br>
    <img src="../img/floppatriste.jpg" height="343" width="360">
    <?php
        }
    ?>
    
</body>
</html>