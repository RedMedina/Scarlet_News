<?php
    include "classes/Usuarios.classes.php";
    class SelectRep
    {
        private $Con;
        private $Statement;
        private $Usuarios;

        public function SelectReporters()
        {
            $Con = new Conexion;
            $Usuarios = array();
            $Statement = $Con->Conecta()->prepare("CALL SELECT_REPORTERS()");
            $Statement->execute();
            $result = $Statement->get_result();
            while ($row = $result->fetch_assoc())
            {
                $us = new Usuario;
                $us->SetID($row['USER_ID']);
                $us->SetNombre($row['FULLNAME']);
                $us->SetFoto($row['PICTURE']);
                $us->SetStatus($row['USER_STATUS']);
                array_push($Usuarios, $us);
            }
            $Con->Desconectar();
            return $Usuarios;
        }
        
        public function ConsultaDatosReporter($id)
        {
            $Con = new Conexion;
            $Statement = $Con->Conecta()->prepare("CALL REPORTER_SEL(?)");
            $Statement->bind_param("s", $id);
            $Statement->execute();
            $result = $Statement->get_result();
            while ($row = $result->fetch_assoc())
            {
                $Usuarios = new Usuario;
                $Usuarios->SetID($row['USER_ID']);
                $Usuarios->SetNombre($row['FULLNAME']);
                $Usuarios->SetEmail($row['EMAIL']);
                $Usuarios->SetUser($row['USER_ALIAS']);
                $Usuarios->SetFirma($row['USER_FIRMA']);
                $Usuarios->SetUserRol($row['USER_ROL']);
                $Usuarios->SetStatus($row['USER_STATUS']);
                $Usuarios->SetFoto($row['PICTURE']);
            }
            $Con->Desconectar();
            return $Usuarios;
        }
    }
?>