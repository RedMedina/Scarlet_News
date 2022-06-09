<?php
include "../classes/Register.classes.php";
    class FacebookAuth
    {
        protected $facebook;
        protected $facebookURL = "http://localhost/PIA_BDM_PWCI/Include/Facebook_Inc.php";
        //protected $facebookURL = "Include/Facebook_Inc.php";

        public function __construct(Facebook\Facebook $facebook)
        {
            $this->facebook = $facebook;
        }

        public function getHelper()
        {
            return $this->facebook->getRedirectLoginHelper();
        }

        public function getAuthURL()
        {
            return $this->getHelper()->getLoginUrl($this->facebookURL, array('email'));
        }

        public function isLogin()
        {
            return isset($_SESSION['id_facebook']);
        }

        public function login()
        {
            try {
                $response = $this->facebook->get('/me?fields=id,name,picture,email', $this->getHelper()->getAccessToken());
                
                $usuario = $response->getGraphUser();
                $picture = $usuario->getPicture();

                $nombre = $usuario['name'];
                $email = $usuario['email'];
                $usuario = $usuario['email'];
                $password = "A%aaa1.bbbb";
                $confirmarPass = "A%aaa1.bbbb";
                $realImage = $picture['url'];
                $UsRol = 3;
                $Reg = new Register;
                $Reg->Registrar($nombre, $email, $usuario, $realImage, $nombre, $password, $nombre, $nombre, $UsRol);
                $ID = $Reg->GetLastID();

                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['ID'] = $ID;
                $_SESSION['nombre'] = $nombre;
                $_SESSION['usuario'] = $usuario;
                $_SESSION['email'] = $email;
                $_SESSION['firma'] = $nombre;
                $_SESSION['imagen'] = $realImage;
                $_SESSION['Status'] = true;
                $_SESSION['UserRol'] = $UsRol;
                $_SESSION['DeleteUS'] = false;
                $_SESSION['facebooklogin'] = true;
                $_SESSION['passwordfacebook'] = true;
                $_SESSION['userkeyFacebook'] = $password;

            } catch (\Throwable $th) {
            }
        }
    }
?>