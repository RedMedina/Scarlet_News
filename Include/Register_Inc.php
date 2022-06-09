<?php
include "../classes/Register.classes.php";
session_start();
    if(isset($_POST['enviarBtnRegUs']))
    {
        if(!empty($_FILES['imgPefilRegUs']['name']))
        {
            $Reg = new Register;
            $nombre = $_POST['NameRegUs'];
            $email = $_POST['CRegUs'];
            $usuario = $_POST['UsRegUs'];
            $password = $_POST['PassRegUs'];
            $confirmarPass = $_POST['CPassRegUs'];
            $firmaUS = $_POST['NameRegUs'];
            $CreatedBy = $_POST['NameRegUs'];
            $UsRol = 3;
            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['UserRol'] == 1)
            {
                $UsRol = $_POST['UsRol'];
            }
            else
            {
                $UsRol = 3;
            }
            //Image
            $filename = basename($_FILES['imgPefilRegUs']['name']);
            $imageType = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            $allowTypes = array('png', 'jpg', 'gif');
            if(in_array($imageType, $allowTypes) && $password == $confirmarPass)
            {
                $imageName = $_FILES['imgPefilRegUs']['tmp_name'];
                $imageBase64 = base64_encode(file_get_contents($imageName));
                $realImage = 'data:image/'.$imageType.';base64,'.$imageBase64;
                $Reg->Registrar($nombre, $email, $usuario, $realImage, $firmaUS, $password, $CreatedBy, $CreatedBy, $UsRol);
                header("Location: ../login.php");
            }
            else
            {
                header("Location: ../Error.php?error=InputError");
                exit();
            }
            //----
        }
        else
        {
            header("Location: ../Error.php?error=InputError");
            exit();
        }
    }
    else
    {
        header("Location: ../SignUp.php");
        exit();
    }
?>