<?php
    class SeccionReport
    {
        private $ID;
        private $Desc;
        private $Fecha;
        private $Likes;
        private $Color;

       public function getID() { 
            return $this->ID; 
       } 
   
       public function setID($ID) {  
           $this->ID = $ID; 
       } 
   
       public function getDesc() { 
            return $this->Desc; 
       } 
   
       public function setDesc($Desc) {  
           $this->Desc = $Desc; 
       } 
   
       public function getFecha() { 
            return $this->Fecha; 
       } 
   
       public function setFecha($Fecha) {  
           $this->Fecha = $Fecha; 
       } 
   
       public function getLikes() { 
            return $this->Likes; 
       } 
   
       public function setLikes($Likes) {  
           $this->Likes = $Likes; 
       } 
   
       public function getColor() { 
            return $this->Color; 
       } 
   
       public function setColor($Color) {  
           $this->Color = $Color; 
       } 
    }
?>