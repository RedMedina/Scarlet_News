<?php
    class Noticias
    {
        private $ID;
        private $Titulo;
        private $Descripcion;
        private $Foto;
        private $Status;
        private $Hora;
        private $Pais;
        private $Ciudad;
        private $Estado;
        private $FechaDeNoticia;
        private $Seccion;
        private $Texto;
        private $ReporterFirma;
        private $Reporter;
        private $Retroalimentacion;

        public function GetID()
        {
            return $this->ID;
        }

        public function SetID($idd)
        {
            $this->ID = $idd;
        }

        public function GetTitulo()
        {
            return $this->Titulo;
        }

        public function SetTitulo($Tit)
        {
            $this->Titulo = $Tit;
        }

        public function GetDescripcion()
        {
            return $this->Descripcion;
        }

        public function SetDescripcion($Desc)
        {
            $this->Descripcion = $Desc;
        }

        public function GetFoto()
        {
            return $this->Foto;
        }

        public function SetFoto($Fot)
        {
            $this->Foto = $Fot;
        }

        public function GetStatus()
        {
            return $this->Status;
        }

        public function SetStatus($Stat)
        {
            $this->Status = $Stat;
        }

        public function GetHora()
        {
            return $this->Hora;
        }

        public function SetHora($Hor)
        {
            $this->Hora = $Hor;
        }

        public function getPais() { 
            return $this->Pais; 
       } 
   
       public function setPais($Pais) {  
           $this->Pais = $Pais; 
       } 
   
       public function getCiudad() { 
            return $this->Ciudad; 
       } 
   
       public function setCiudad($Ciudad) {  
           $this->Ciudad = $Ciudad; 
       } 
   
       public function getEstado() { 
            return $this->Estado; 
       } 
   
       public function setEstado($Estado) {  
           $this->Estado = $Estado; 
       } 
   
       public function getFechaDeNoticia() { 
            return $this->FechaDeNoticia; 
       } 
   
       public function setFechaDeNoticia($FechaDeNoticia) {  
           $this->FechaDeNoticia = $FechaDeNoticia; 
       } 
   
       public function getSeccion() { 
            return $this->Seccion; 
       } 
   
       public function setSeccion($Seccion) {  
           $this->Seccion = $Seccion; 
       } 
   
       public function getTexto() { 
            return $this->Texto; 
       } 
   
       public function setTexto($Texto) {  
           $this->Texto = $Texto; 
       } 

       public function getReporterFirma() { 
            return $this->ReporterFirma; 
       } 

        public function setReporterFirma($ReporterFirma) {  
            $this->ReporterFirma = $ReporterFirma; 
        }
        
       public function getReporter() { 
            return $this->Reporter; 
       } 
   
       public function setReporter($Reporter) {  
           $this->Reporter = $Reporter; 
       }

       public function getRetro()
       {
            return $this->Retroalimentacion; 
       }

       public function setRetro($Retro)
       {
            $this->Retroalimentacion = $Retro;
       }
       
    }

    class PalabrasClave
    {
        private $ID;
        private $Status;
        private $Texto;
        private $NewKey;

       public function getID() { 
            return $this->ID; 
       } 
   
       public function setID($ID) {  
           $this->ID = $ID; 
       } 
   
       public function getStatus() { 
            return $this->Status; 
       } 
   
       public function setStatus($Status) {  
           $this->Status = $Status; 
       } 
   
       public function getTexto() { 
            return $this->Texto; 
       } 
   
       public function setTexto($Texto) {  
           $this->Texto = $Texto; 
       } 
   
       public function getNewKey() { 
            return $this->NewKey; 
       } 
   
       public function setNewKey($NewKey) {  
           $this->NewKey = $NewKey; 
       } 
    }

    class MediaClasses
    {
        private $IDMedia;
        private $Contenido;
        private $Tipo;
        private $Status;
        private $NewMedia;

       public function getIDMedia() { 
            return $this->IDMedia; 
       } 
   
       public function setIDMedia($IDMedia) {  
           $this->IDMedia = $IDMedia; 
       } 
   
       public function getContenido() { 
            return $this->Contenido; 
       } 
   
       public function setContenido($Contenido) {  
           $this->Contenido = $Contenido; 
       } 
   
       public function getTipo() { 
            return $this->Tipo; 
       } 
   
       public function setTipo($Tipo) {  
           $this->Tipo = $Tipo; 
       } 
   
       public function getStatus() { 
            return $this->Status; 
       } 
   
       public function setStatus($Status) {  
           $this->Status = $Status; 
       } 
   
       public function getNewMedia() { 
            return $this->NewMedia; 
       } 
   
       public function setNewMedia($NewMedia) {  
           $this->NewMedia = $NewMedia; 
       }     
    } 
?>