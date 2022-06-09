<?php
    class Validaciones
    {
        protected function Vacios($Texto)
        {
            if(!empty($Texto))
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        protected function NombresSinLetras($Nombre)
        {
            if ( !preg_match ("/^[a-zA-Z-' ]*$/",$Nombre)) 
            {
                return false;
            }
            else
            {
                return true;
            } 
        }

        protected function Email($email)
        {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
            {
               return false;
            }
            else
            {
                return true;
            }
        }

        protected function Password($password)
        {
            if (!preg_match ("/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/",$password))
            {
                return false;
            }
            else
            {
                return true;
            }
        }
    }

?>