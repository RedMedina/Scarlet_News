<?php
    class LikesN
    {
        private $Con;
        private $Statement;

    public function CrearLike($NewLike, $UserLike)
    {
        $Con = new Conexion;
        $Statement = $Con->Conecta()->prepare("CALL INSERTAR_LIKE(?,?)");
        $Statement->bind_param("ss", $NewLike, $UserLike);
        $Statement->execute();
        $Statement->close();
        $Con->Desconectar();
    }

    public function EliminarLike($IDNew, $IdUs)
    {
        $Con = new Conexion;
        $Statement = $Con->Conecta()->prepare("CALL Eliminar_Like2(?, ?)");
        $Statement->bind_param("ss", $IDNew, $IdUs);
        $Statement->execute();
        $Statement->close();
        $Con->Desconectar();
    }

    public function NewLikes($IDNewsLikes)
    {
        $Con = new Conexion;
        $Statement = $Con->Conecta()->prepare("CALL Seleccionar_Likes(?)");
        $Statement->bind_param("s", $IDNewsLikes);
        $Statement->execute();
        $i = 0;
        $result = $Statement->get_result();
        while ($row = $result->fetch_assoc())
        {
            $i++;
        }
        $Statement->close();
        $Con->Desconectar();
        return $i;
    }

    public function MeLikes($ID_LikesNews, $UserLike)
    {
        $Con = new Conexion;
        $Statement = $Con->Conecta()->prepare("CALL Mi_Like(?, ?)");
        $Statement->bind_param("ss", $ID_LikesNews, $UserLike);
        $Statement->execute();
        $i = 0;
        $result = $Statement->get_result();
        while ($row = $result->fetch_assoc())
        {
            $i++;
        }
        $Statement->close();
        $Con->Desconectar();
        return $i;
    }
}

?>