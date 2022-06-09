<?php

class Comments
{
    private $Con;
    private $Statement;

    public function SelectComments($IDNew, $tipoComment)
    {
        $Con = new Conexion;
        $Statement = $Con->Conecta()->prepare("CALL SELECT_COMMMENTS(?,?)");
        $Statement->bind_param("ss", $IDNew, $tipoComment);
        $Statement->execute();
        $COMMENTS = array();
        $result = $Statement->get_result();
        while ($row = $result->fetch_assoc())
        {
            $com = new Comentarios;
            $com->setIDComentario($row['ID_COMMENT']);
            $com->setComentario($row['COMENTARIO']);
            $com->setAutor($row['USER_ALIAS']);
            $com->setCommentAnswer($row['COMMENT_ANSWER']);
            $com->setImagen($row['PICTURE']);
            $com->setFechaCom($row['CREATION_DATE_C']);
            array_push($COMMENTS, $com);
        }
        $Statement->close();
        $Con->Desconectar();
        return $COMMENTS;    
    }

    public function CreateComments($Comentario, $Autor, $TipoDeCom, $UserAns, $CommentAns, $ComentNew)
    {
        $Con = new Conexion;
        $Statement = $Con->Conecta()->prepare("CALL INSERTAR_COMENTARIOS(?, ?, ?, sysdate(), ?, ?, ?)");
        $Statement->bind_param("ssssss", $Comentario, $Autor, $TipoDeCom, $UserAns, $CommentAns, $ComentNew);
        $Statement->execute();
        $Statement->close();
        $Con->Desconectar();
    }

    public function DeleteComments($DelID)
    {
        $Con = new Conexion;
        $Statement = $Con->Conecta()->prepare("CALL ELIMINAR_COM(?)");
        $Statement->bind_param("s", $DelID);
        $Statement->execute();
        $Statement->close();
        $Con->Desconectar();
    }
}
?>