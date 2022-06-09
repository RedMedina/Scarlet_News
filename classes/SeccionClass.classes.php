<?php
    class SeccionesClass
    {
        private $id;
        private $color;
        private $Orden;
        private $descripcion;
        private $Fecha;

        public function GetID()
        {
            return $this->id;
        }

        public function GetDesc()
        {
            return $this->descripcion;
        }

        public function SetDesc($Descs)
        {
            $this->descripcion = $Descs;
        }

        public function GetColor()
        {
            return $this->color;
        }

        public function GetOrden()
        {
            return $this->Orden;
        }

        public function SetID($IDs)
        {
            $this->id = $IDs;
        }

        public function SetColor($Colors)
        {
            $this->color = $Colors;
        }

        public function SetOrden($Ordens)
        {
            $this->Orden = $Ordens;
        }

        public function getFecha() { 
            return $this->Fecha; 
       } 
   
       public function setFecha($Fecha) {  
           $this->Fecha = $Fecha; 
       } 
    }
?>