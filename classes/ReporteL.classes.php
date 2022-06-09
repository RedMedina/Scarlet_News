<?php
    class ReporteLikesR
    {
        private $Con;
        private $Statement;

        public function SelectIDNews()
        {
            $Con = new Conexion;
            $Noticia = array();
            $result = $Con->Conecta()->query("SELECT ID_NEWS, Seccion FROM SELECT_ID_NEW");
            while($row = $result->fetch_assoc())
            {
                $not = new ReporteLC;
                $not->setID($row['ID_NEWS']);
                $not->setSeccion($row['Seccion']);
                array_push($Noticia, $not);
            }
            $Con->Desconectar();
            return $Noticia;
        }

        public function SelectLikesT($ID)
        {
            $Con = new Conexion;
            $Statement = $Con->Conecta()->prepare("CALL SELECT_REP_LIKES(?)");
            $Statement->bind_param("s", $ID);
            $Statement->execute();
            $i = 0;
            $result = $Statement->get_result();
            while ($row = $result->fetch_assoc())
            {
                $i++;
            }
            $Con->Desconectar();
            return $i;
        }

        public function ReporteLikes($FechaIn, $FechaFin, $Seccion, $ID)
        {
            $Con = new Conexion;
            $Noticia = new Noticias;
            $FechaInQuery = "";
            $FechaFinQuery = "";
            $SeccionQuery = "";
            if(!empty($FechaIn))
            {
                $FechaInQuery = " AND NEWS_DATE > '".$FechaIn."'";
            }
            if(!empty($FechaFin))
            {
                $FechaFinQuery = " AND NEWS_DATE < '".$FechaFin."'";
            }
            if($Seccion >= 0)
            {
                $SeccionQuery = " AND Seccion = ".$Seccion;
            }

            $result = $Con->Conecta()->query("SELECT ID_NEWS, TITLE_NEW, DESCRIPTION_NEWS, NEWS_DATE, PRINCIPAL_PICTURE, Seccion FROM REPORTE_LIKES WHERE Activa = TRUE AND NEW_STATUS = 3 AND ID_NEWS = ".$ID." ".$FechaInQuery.$FechaFinQuery.$SeccionQuery);

            while($row = $result->fetch_assoc())
            {
                $not = new Noticias;
                $not->SetID($row['ID_NEWS']);
                $not->SetTitulo($row['TITLE_NEW']);
                $not->SetDescripcion($row['DESCRIPTION_NEWS']);
                $not->SetFoto($row['PRINCIPAL_PICTURE']);
                $not->setFechaDeNoticia($row['NEWS_DATE']);
                $not->setSeccion($row['Seccion']);
                $Noticia = $not;
            }
            $Con->Desconectar();
            return $Noticia;
        }

        public function SelectComments($IDNew)
        {
            $Con = new Conexion;
            $Statement = $Con->Conecta()->prepare("CALL SELECT_CANT_COMMMENTS(?)");
            $Statement->bind_param("s", $IDNew);
            $Statement->execute();
            $result = $Statement->get_result();
            $i = 0;
            while ($row = $result->fetch_assoc())
            {
                $i++;
            }
            $Statement->close();
            $Con->Desconectar();
            return $i;    
        }

        public function ReporteLikesSeccion($FechaIn, $FechaFin, $ID, $Likes)
        {
            $Con = new Conexion;
            $FechaInQuery = "";
            $FechaFinQuery = "";
            $sec = new SeccionReport;
            if(!empty($FechaIn))
            {
                $FechaInQuery = " AND CREATED_DATE > '".$FechaIn."'";
            }
            if(!empty($FechaFin))
            {
                $FechaFinQuery = " AND CREATED_DATE < '".$FechaFin."'";
            }

            $result = $Con->Conecta()->query("SELECT ID_SECTIONS, COLOR, DESCRIPTION, CREATED_DATE FROM SELECT_REPORTE_SECTION WHERE SECTIONS_STATUS = TRUE AND ID_SECTIONS=".$ID.$FechaInQuery.$FechaFinQuery);
            while($row = $result->fetch_assoc())
            {
                $sec->setID($row['ID_SECTIONS']);
                $sec->setDesc($row['DESCRIPTION']);
                $sec->setFecha($row['CREATED_DATE']);
                $sec->setColor($row['COLOR']);
                $sec->setLikes($Likes);
            }
            $Con->Desconectar();
            return $sec;
        }
    }
?>