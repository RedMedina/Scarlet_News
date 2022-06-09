<?php

    class Secciones
    {
        private $Con;
        private $Statement;

        public function IngresarSections($Color, $Descripcion, $SectionOrder, $CreatedBy, $LastUpBy, $Vacio)
        {
            $Con = new Conexion;
            $Statement = $Con->Conecta()->prepare('CALL ADD_SECTION(?, ?, ?, ?, sysdate(), true, ?, sysdate())');
            try
            {
                if($Vacio == true)
                {
                    $Statement->bind_param("sssss", $Color, $Descripcion, $SectionOrder, $CreatedBy, $LastUpBy);
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

        public function SelectFirstSeccion()
        {
            $Con = new Conexion;
            $Seccion = array();
            $Statement = $Con->Conecta()->prepare('CALL SELECT_SECFIRST()');
            $Statement->execute();
            $result = $Statement->get_result();
            while ($row = $result->fetch_assoc())
            {
                $sec = new SeccionesClass;
                $sec->SetID($row['ID_SECTIONS']);
                $sec->SetColor($row['COLOR']);
                $sec->SetDesc($row['DESCRIPTION']);
                array_push($Seccion, $sec);
            }
            $Con->Desconectar();
            return $Seccion;
        }

        public function SelectEditSeccion($id)
        {
            $Con = new Conexion;
            $Statement = $Con->Conecta()->prepare('CALL SELECT_SECEDIT(?)');
            $Statement->bind_param("s", $id);
            $Statement->execute();
            $result = $Statement->get_result();
            $sec = null;
            while ($row = $result->fetch_assoc())
            {
                $sec = new SeccionesClass;
                $sec->SetID($row['ID_SECTIONS']);
                $sec->SetColor($row['COLOR']);
                $sec->SetDesc($row['DESCRIPTION']);
                $sec->SetOrden($row['SECTIONS_ORDEN']);
            }
            $Con->Desconectar();
            return $sec;
        }

        public function SelectRepLikesNew($id)
        {
            $Con = new Conexion;
            $Statement = $Con->Conecta()->prepare('CALL SELECT_SECEDIT(?)');
            $Statement->bind_param("s", $id);
            $Statement->execute();
            $result = $Statement->get_result();
            $sec = new SeccionesClass;
            while ($row = $result->fetch_assoc())
            {
                //$sec = new SeccionesClass;
                $sec->SetID($row['ID_SECTIONS']);
                $sec->SetColor($row['COLOR']);
                $sec->SetDesc($row['DESCRIPTION']);
                $sec->SetOrden($row['SECTIONS_ORDEN']);
            }
            $Con->Desconectar();
            return $sec;
        }

        public function UpdateSection($id, $color, $description, $orden, $LastupBy)
        {
            $Con = new Conexion;
            $Statement = $Con->Conecta()->prepare('CALL UPDATE_SECTIONS(?, ?, ?, ?, sysdate(), ?)');
            $Statement->bind_param("sssss", $id, $color, $description, $orden, $LastupBy);
            $Statement->execute();
            $Statement->close();
            $Con->Desconectar();
        }

        public function DeleteSection($id, $lasup)
        {
            $Con = new Conexion;
            $Statement = $Con->Conecta()->prepare('CALL DELETE_SECTIONS(?, sysdate(), ?)');
            $Statement->bind_param("ss", $id, $lasup);
            $Statement->execute();
            $Statement->close();
            $Con->Desconectar();
        }

        public function SeleccionIndex()
        {
            $Con = new Conexion;
            $Seccion = array();
            $Statement = $Con->Conecta()->prepare('CALL Select_Secciones_Index()');
            $Statement->execute();
            $result = $Statement->get_result();
            while ($row = $result->fetch_assoc())
            {
                $sec = new SeccionesClass;
                $sec->SetID($row['ID_SECTIONS']);
                $sec->SetColor($row['COLOR']);
                $sec->SetDesc($row['DESCRIPTION']);
                array_push($Seccion, $sec);
            }
            $Con->Desconectar();
            return $Seccion;
        }

        public function SeleccionarReporteSeccion()
        {
            $Con = new Conexion;
            $Seccion = array();
            $Statement = $Con->Conecta()->prepare('CALL Select_Secciones_Reporte()');
            $Statement->execute();
            $result = $Statement->get_result();
            while ($row = $result->fetch_assoc())
            {
                $sec = new SeccionesClass;
                $sec->SetID($row['ID_SECTIONS']);
                $sec->SetColor($row['COLOR']);
                $sec->SetDesc($row['DESCRIPTION']);
                $sec->setFecha($row['CREATED_DATE']);
                array_push($Seccion, $sec);
            }
            $Con->Desconectar();
            return $Seccion;
        }
    }

?>