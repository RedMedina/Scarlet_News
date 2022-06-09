<?php
    session_start();
    require_once('../SDK/facebook/src/Facebook/autoload.php');
    require_once('../app/facebookAuth.php');

    $facebook = new Facebook\Facebook([
        'app_id' => '645754663191323',
        'app_secret' => 'd6ac86809a05ba8bea401bd82b38c8fe',
        'default_graph_version' => 'v2.4',
    ]);

    $fbAuth = new FacebookAuth($facebook);
?>