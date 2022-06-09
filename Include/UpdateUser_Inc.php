<?php
    include "../classes/UpdateUser.classes.php";
    if(isset($_POST['BtnPF']))
    {
        if(!empty($_FILES['ImagenP']['name']))
        {
            session_start();
            $UpadateUs = new UpdateUser;
            $id = $_POST['idPF'];
            $password = $_POST['ContPF'];
            $Cpassword = $_POST['ConfContPF'];
            $nombre = $_POST['namePF'];
            $email = $_POST['CorrPF'];
            $userAlias = $_POST['UsPF'];
            $Userfirma = $_POST['namePF'];
            $LastUpdateBy = $_SESSION['nombre'];
            //Image
            $filename = basename($_FILES['ImagenP']['name']);
            $imageType = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            $allowTypes = array('png', 'jpg', 'gif');
            if(in_array($imageType, $allowTypes) && $password == $Cpassword)
            {
                $imageName = $_FILES['ImagenP']['tmp_name'];
                $imageBase64 = base64_encode(file_get_contents($imageName));
                $realImage = 'data:image/'.$imageType.';base64,'.$imageBase64;
                $UpadateUs->Update($id, $password, $nombre, $email, $userAlias, $realImage, $Userfirma, $LastUpdateBy);
                if($_POST['edit'] == "true"){
                    header("Location: ../Porfile.php?EditRep=true&ID=" . $id);
                }else
                {
                    $_SESSION['nombre'] = $nombre;
                    $_SESSION['usuario'] = $userAlias;
                    $_SESSION['email'] = $email;
                    $_SESSION['firma'] = $Userfirma;
                    $_SESSION['imagen'] = $realImage;
                    header("Location: ../Porfile.php");
                }
            }
            else
            {
                header("Location: ../Error.php?error=InputError");
                exit();
            }
        }
        else
        {
            header("Location: ../Error.php?error=InputError");
            exit();
        }
    }
    else
    {
        header("Location: ../Porfile.php");
        exit();
    }
?>