<?php
    class ReporteLC
    {
        private $ID;
        private $Likes;
        private $Seccion;
        public function getID() { 
            return $this->ID; 
        } 
   
        public function setID($ID) {  
           $this->ID = $ID; 
        } 
   
        public function getLikes() { 
            return $this->Likes; 
        } 
   
        public function setLikes($Likes) {  
           $this->Likes = $Likes; 
        }
        public function getSeccion() { 
            return $this->Seccion; 
        } 
   
        public function setSeccion($Seccion) {  
           $this->Seccion = $Seccion; 
        }     
    }

	
?>