<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scarlet News</title>
    <link rel="stylesheet" href="css/Facebook.css">
</head>
<body>
    <center>
<?php
session_start();
require_once __DIR__ . '../SDK/facebook/src/Facebook/autoload.php';
$fb = new Facebook\Facebook([
    'app_id' => '645754663191323',
    'app_secret' => 'd6ac86809a05ba8bea401bd82b38c8fe',
    'default_graph_version' => 'v2.4',
]);

$helper = $fb->getRedirectLoginHelper();
$permissions = ['email'];
$loginUrl = $helper->getLoginUrl('facebook/fb-callback.php', $permissions);
echo "<div class='DivLogin'>";
echo "<img src='img/facebookLogo.png' width=127 height=127><br><br>";
echo '<div class="linkFB"><a href="'. htmlspecialchars($loginUrl) . '" class="LoginFB">Iniciar sesión con Facebook</a><div>';
echo "</div>";
?>
</center>
</body>
</html>