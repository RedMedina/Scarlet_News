<?php
    include "../classes/Conexion.classes.php";
    include "../classes/Validaciones.classes.php";

    class Register extends Validaciones
    {
        private $Con;
        private $Statement;

        public function Registrar($nombre, $email, $usuario, $picture, $userFirma, $userKey, $CreatedBy,$lastUpBy, $userRol)
        {
            $Con = new Conexion;
            $Statement = $Con->Conecta()->prepare('CALL INSERT_USERS(?,?,?,?,?,?,true,sysdate(),?,sysdate(),?,?)');
            //$Statement = $Con->Conecta()->prepare('CALL INSERT_USERS_Us(?,?,?,?,?,?,true,sysdate(),sysdate(),?)');
            try
            {
                if($this->Vacios($nombre) && $this->Vacios($email) && $this->Vacios($usuario) && $this->Vacios($picture) && $this->Vacios($userFirma) && $this->Vacios($userKey) &&
                $this->NombresSinLetras($nombre) && $this->Email($email) && $this->Password($userKey))
                {
                    $Statement->bind_param("sssssssss", $nombre, $email, $usuario, $picture, $userFirma, $userKey, $CreatedBy, $lastUpBy,$userRol);
                    //$Statement->bind_param("sssssss", $nombre, $email, $usuario, $picture, $userFirma, $userKey,$userRol);
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
            catch (Exception $e)
            {
                header("Location: ../Error.php?error=StatementFailed");
            }
        }

        public function GetLastID()
        {
            $Con = new Conexion;
            $result = $Con->Conecta()->query('SELECT USER_ID FROM users ORDER BY USER_ID DESC LIMIT 1');
            $ID = 0;
            while ($row = $result->fetch_assoc())
            {
                $ID = $row['USER_ID'];
            }
            $Con->Desconectar();
            return $ID;
        }
    }

?>