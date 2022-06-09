<?php
include "../classes/UpdateUser.classes.php";
session_start();
if(isset($_POST['BtNConfCnt']))
{
    if($_POST['NContra'] == $_POST['NContraConf'])
    {
        $UpadateUs = new UpdateUser;
        $UpadateUs->UpdateContra($_POST['NContra'], $_SESSION['ID']);
        $_SESSION['passwordfacebook'] = false;
        $_SESSION['userkeyFacebook'] = "";
        header("Location: ../Porfile.php");
    }
    else
    {
        header("Location: ../ContraseñaFacebook.php?Error=Incorrecto");
    }
}
else
{

}
?>