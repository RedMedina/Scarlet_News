<?php
    include "../classes/Conexion.classes.php";
    include "../classes/Validaciones.classes.php";

    class UpdateUser extends Validaciones
    {
        private $Con;
        private $Statement;

        public function Update($id, $userkey, $nombre, $email, $userAlias, $picture, $userFirma, $lastupdateby)
        {
            $Con = new Conexion;
            $Statement = $Con->Conecta()->prepare('CALL UPDATE_USERS(?,?,?,?,?,?,?,?,sysdate(),?)');
            if($this->Vacios($id) && $this->Vacios($userkey) && $this->Vacios($nombre) && $this->Vacios($email) && $this->Vacios($userAlias) &&
               $this->Vacios($picture) && $this->Vacios($userFirma) && $this->Vacios($lastupdateby) && $this->NombresSinLetras($nombre) && $this->Email($email))
            {
                $Statement->bind_param("sssssssss", $id, $userkey, $nombre, $email, $userAlias, $picture, $userFirma, $userkey, $lastupdateby);
                $Statement->execute();
                $Statement->close();
                $Con->Desconectar();
            }
            else
            {
                $Con->Desconectar();
                header("Location: ../Error.php?error=Validacion");
            }
        }

        public function DeleteUser($id, $lastupdateby)
        {
            $Con = new Conexion;
            $Statement = $Con->Conecta()->prepare('CALL DELETE_USER(?,sysdate(),?)');
            if($this->Vacios($id) && $this->Vacios($lastupdateby))
            {
                $Statement->bind_param("ss", $id, $lastupdateby);
                $Statement->execute();
                $Statement->close();
                $Con->Desconectar();
            }
            else
            {
                $Con->Desconectar();
                header("Location: ../Error.php?error=Validacion");
            }
        }

        public function UpdateContra($UserKey, $ID)
        {
            $Con = new Conexion;
            $result = $Con->Conecta()->query("UPDATE users SET USER_KEY = ".$UserKey." WHERE USER_ID = ".$ID);
            $result->fetch_assoc();
            $Con->Desconectar();
        }
    }

?>