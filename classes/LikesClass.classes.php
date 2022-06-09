<?php
    
    class Likes
    {
        private $ID_Likes;
        private $Status;
        private $NewLike;
        private $UserLike;

       public function getIDLikes() { 
            return $this->IDLikes; 
       } 
   
       public function setIDLikes($IDLikes) {  
           $this->IDLikes = $IDLikes; 
       } 
   
       public function getStatus() { 
            return $this->Status; 
       } 
   
       public function setStatus($Status) {  
           $this->Status = $Status; 
       } 
   
       public function getNewLike() { 
            return $this->NewLike; 
       } 
   
       public function setNewLike($NewLike) {  
           $this->NewLike = $NewLike; 
       } 
   
       public function getUserLike() { 
            return $this->UserLike; 
       } 
   
       public function setUserLike($UserLike) {  
           $this->UserLike = $UserLike; 
       } 
    }
?>