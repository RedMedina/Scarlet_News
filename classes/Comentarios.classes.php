<?php
class Comentarios
{
    private $IDComentario;
    private $Comentario;
    private $Autor;
    private $Tipo;
    private $CommentAnswer;
    private $Imagen;
    private $FechaCom;

    public function getIDComentario() { 
        return $this->IDComentario; 
   } 

   public function setIDComentario($IDComentario) {  
       $this->IDComentario = $IDComentario; 
   } 

   public function getComentario() { 
        return $this->Comentario; 
   } 

   public function setComentario($Comentario) {  
       $this->Comentario = $Comentario; 
   } 

   public function getAutor() { 
        return $this->Autor; 
   } 

   public function setAutor($Autor) {  
       $this->Autor = $Autor; 
   } 

   public function getTipo() { 
        return $this->Tipo; 
   } 

   public function setTipo($Tipo) {  
       $this->Tipo = $Tipo; 
   } 

   public function getCommentAnswer() { 
        return $this->CommentAnswer; 
   } 

   public function setCommentAnswer($CommentAnswer) {  
       $this->CommentAnswer = $CommentAnswer; 
   } 

   public function getImagen() { 
        return $this->Imagen; 
    } 

   public function setImagen($Imagen) {  
        $this->Imagen = $Imagen; 
    }
    
   public function getFechaCom() { 
        return $this->FechaCom; 
   } 

   public function setFechaCom($FechaCom) {  
       $this->FechaCom = $FechaCom; 
   } 
}
?>