<?php
    class Usuario
    {
       private $Id;
       private $Nombre;
       private $Email;
       private $User;
       private $Foto;
       private $Firma;
       private $Status;
       private $UserRol;

        public function GetID(){
           return $this->Id;
        }

        public function SetID($ID){
           $this->Id = $ID;
        }

        public function GetNombre(){
            return $this->Nombre;
        }

        public function SetNombre($Nombre){
            $this->Nombre = $Nombre;
        }
        public function GetEmail(){
            return $this->Email;
        }
 
        public function GetUser(){
            return $this->User;
        }
 
        public function SetUser($User){
            $this->User = $User;
        }

        public function SetEmail($Email){
            $this->Email = $Email;
        }
       
        public function GetFoto(){
            return $this->Foto;
        }
 
        public function SetFoto($Foto){
            $this->Foto = $Foto;
        }
        public function GetFirma(){
            return $this->Firma;
        }
 
        public function SetFirma($Firma){
            $this->Firma = $Firma;
        }
        public function GetStatus(){
            return $this->Status;
        }
 
        public function SetStatus($Status){
            $this->Status = $Status;
        }
        public function GetUserRol(){
            return $this->UserRol;
        }
 
        public function SetUserRol($UserRol){
            $this->UserRol = $UserRol;
        }
    }
?>