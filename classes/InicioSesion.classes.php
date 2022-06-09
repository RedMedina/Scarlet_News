<?php 
    include "../classes/Conexion.classes.php";
    include "../classes/Validaciones.classes.php";
    include "../classes/Usuarios.classes.php";

    class InicioSesion extends Validaciones
    {
        private $Con;
        private $Statement;
        private $Usuarios;

        public function InicioSesions($email, $password)
        {
            $Con = new Conexion;
            $Usuarios = null;
            $Statement = $Con->Conecta()->prepare("CALL SELECT_USERS(?,?)");
            if($this->Vacios($email) && $this->Vacios($password))
            {
                $Statement->bind_param("ss", $email, $password);
                $Statement->execute();
                $result = $Statement->get_result();
                while ($row = $result->fetch_assoc()) {
                    $Usuarios = new Usuario;
                    $Usuarios->SetID($row['USER_ID']);
                    $Usuarios->SetNombre($row['FULLNAME']);
                    $Usuarios->SetEmail($row['EMAIL']);
                    $Usuarios->SetUser($row['USER_ALIAS']);
                    $Usuarios->SetFoto($row['PICTURE']);
                    $Usuarios->SetFirma($row['USER_FIRMA']);
                    $Usuarios->SetStatus($row['USER_STATUS']);
                    $Usuarios->SetUserRol($row['USER_ROL']);
                }
                $Statement->close();
                $Con->Desconectar();
            }
            else
            {
                $Con->Desconectar();
                header("Location: ../Error.php?error=Validacion");
            }
            return $Usuarios;
        }
    }

?>