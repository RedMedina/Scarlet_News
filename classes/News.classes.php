<?php  
    class News extends Validaciones 
    {
        private $Con;
        private $Statement;

        public function InsertarNoticia($Title, $PaisN, $CiudadN, $EstadoN, $DateN, $FirmaRN, $DescriptionN, $TextoN, $Reporter, $StatusNEw, $PictureN, $EditorSatusN, $Seccion, $Hora)
        {
            $Con = new Conexion;
            $Statement = $Con->Conecta()->prepare("CALL INSERTAR_NOTICIA(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, sysdate(), ?, ?, ?, ?)");
            try
            {
               if($this->Vacios($Title) && $this->Vacios($PaisN) && $this->Vacios($CiudadN) && $this->Vacios($EstadoN) && $this->Vacios($DateN) &&
                $this->Vacios($FirmaRN) && $this->Vacios($DescriptionN) && $this->Vacios($TextoN) && $this->Vacios($Reporter) && $this->Vacios($StatusNEw)
                && $this->Vacios($PictureN) && $this->Vacios($EditorSatusN))
                {
                    $Statement->bind_param("ssssssssssssss", $Title, $PaisN, $CiudadN, $EstadoN, $DateN, $FirmaRN, $DescriptionN, $TextoN, $Reporter, $StatusNEw, $PictureN, $EditorSatusN, $Seccion, $Hora);
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

        public function InsertarMedia($Media, $Tipo)
        {
            $a = 1;
            $Con = new Conexion;
            $Statement = $Con->Conecta()->prepare("CALL INSERTAR_NEWS_MEDIA(?, ?, true, ?)");
            try
            {
                if($this->Vacios($Media) && $this->Vacios($Tipo))
                {
                    $Statement->bind_param("sss", $Media, $Tipo, $a);
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

        public function InsertarKeyWords($Words)
        {
            $Con = new Conexion;
            $Statement = $Con->Conecta()->prepare("CALL INSERTAR_KEYWORDS(true, ?)");
            try
            {
                if($this->Vacios($Words))
                {
                    $Statement->bind_param("s", $Words);
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

        public function SelectEditorReporter()
        {
            $Con = new Conexion;
            $Noticia = array();
            $Statement = $Con->Conecta()->prepare("SELECT ID_NEWS, TITLE_NEW, HORA_NEW, DESCRIPTION_NEWS, PRINCIPAL_PICTURE, NEW_STATUS, NEWS_DATE FROM select_noticia_editor_reporter WHERE Activa = TRUE");
            $Statement->execute();
            $result = $Statement->get_result();
            while ($row = $result->fetch_assoc())
            {
                $not = new Noticias;
                $not->SetID($row['ID_NEWS']);
                $not->SetTitulo($row['TITLE_NEW']);
                $not->SetDescripcion($row['DESCRIPTION_NEWS']);
                $not->SetFoto($row['PRINCIPAL_PICTURE']);
                $not->SetStatus($row['NEW_STATUS']);
                $not->SetHora($row['HORA_NEW']);
                $not->setFechaDeNoticia($row['NEWS_DATE']);
                array_push($Noticia, $not);
            }
            $Con->Desconectar();
            return $Noticia;
        }

        public function SelectEditorReporter_Rep($Reporter)
        {
            $Con = new Conexion;
            $Noticia = array();
            $Statement  = $Con->Conecta()->prepare("SELECT ID_NEWS, TITLE_NEW, HORA_NEW, DESCRIPTION_NEWS, PRINCIPAL_PICTURE, NEW_STATUS, NEWS_DATE, RETROALIMENTACION FROM SELECT_NOTICIA_EDITOR_REPORTER_REP WHERE Activa = TRUE AND REPORTER = ?");
            $Statement->bind_param("s", $Reporter);
            $Statement->execute();
            $result = $Statement->get_result();
            while ($row = $result->fetch_assoc())
            {
                $not = new Noticias;
                $not->SetID($row['ID_NEWS']);
                $not->SetTitulo($row['TITLE_NEW']);
                $not->SetDescripcion($row['DESCRIPTION_NEWS']);
                $not->SetFoto($row['PRINCIPAL_PICTURE']);
                $not->SetStatus($row['NEW_STATUS']);
                $not->SetHora($row['HORA_NEW']);
                $not->setFechaDeNoticia($row['NEWS_DATE']);
                $not->setRetro($row['RETROALIMENTACION']);
                array_push($Noticia, $not);
            }
            $Con->Desconectar();
            return $Noticia;
        }

        public function IndexNewSelect()
        {
            $Con = new Conexion;
            $Noticia = array();
            $Statement = $Con->Conecta()->prepare("SELECT ID_NEWS, TITLE_NEW, HORA_NEW, DESCRIPTION_NEWS, PRINCIPAL_PICTURE, NEW_STATUS, NEWS_DATE FROM select_noticia_editor_reporter WHERE Activa = TRUE AND NEW_STATUS = 3");
            $Statement->execute();
            $result = $Statement->get_result();
            while ($row = $result->fetch_assoc())
            {
                $not = new Noticias;
                $not->SetID($row['ID_NEWS']);
                $not->SetTitulo($row['TITLE_NEW']);
                $not->SetDescripcion($row['DESCRIPTION_NEWS']);
                $not->SetFoto($row['PRINCIPAL_PICTURE']);
                $not->SetStatus($row['NEW_STATUS']);
                $not->SetHora($row['HORA_NEW']);
                $not->setFechaDeNoticia($row['NEWS_DATE']);
                array_push($Noticia, $not);
            }
            $Con->Desconectar();
            return $Noticia;
        }

        public function IndexNewSelectSection($IDSeccion)
        {
            $Con = new Conexion;
            $Noticia = array();
            $Statement = $Con->Conecta()->prepare("CALL SelectNewSection(?)");
            $Statement->bind_param("s", $IDSeccion);
            $Statement->execute();
            $result = $Statement->get_result();
            while ($row = $result->fetch_assoc())
            {
                $not = new Noticias;
                $not->SetID($row['ID_NEWS']);
                $not->SetTitulo($row['TITLE_NEW']);
                $not->SetDescripcion($row['DESCRIPTION_NEWS']);
                $not->SetFoto($row['PRINCIPAL_PICTURE']);
                $not->setFechaDeNoticia($row['NEWS_DATE']);
                array_push($Noticia, $not);
            }
            $Con->Desconectar();
            return $Noticia;
        }

        public function SelecEditNew($ID)
        {
            $Con = new Conexion;
            $Statement = $Con->Conecta()->prepare('SELECT ID_NEWS, TITLE_NEW, PAIS, CIUDAD, ESTADO, NEWS_DATE, HORA_NEW, REPORTER_FIRMA, Seccion, DESCRIPTION_NEWS, TEXTO_NEWS, NEW_STATUS, PRINCIPAL_PICTURE, EDITOR_STATUS, REPORTER, RETROALIMENTACION FROM SELECT_NEW WHERE ID_NEWS = ? AND Activa = TRUE');
            if($this->Vacios($ID))
            {
                $Statement->bind_param("s", $ID);
                $Statement->execute();
                $result = $Statement->get_result();
                $new = null;
                while ($row = $result->fetch_assoc())
                {
                    $new = new Noticias;
                    $new->SetID($row['ID_NEWS']);
                    $new->SetTitulo($row['TITLE_NEW']);
                    $new->SetDescripcion($row['DESCRIPTION_NEWS']);
                    $new->SetFoto($row['PRINCIPAL_PICTURE']);
                    $new->SetStatus($row['NEW_STATUS']);
                    $new->SetHora($row['HORA_NEW']);
                    $new->setPais($row['PAIS']);
                    $new->setCiudad($row['CIUDAD']);
                    $new->setEstado($row['ESTADO']);
                    $new->setFechaDeNoticia($row['NEWS_DATE']);
                    $new->setSeccion($row['Seccion']);
                    $new->setTexto($row['TEXTO_NEWS']);
                    $new->setReporterFirma($row['REPORTER_FIRMA']);
                    $new->setReporter($row['REPORTER']);
                    $new->setRetro($row['RETROALIMENTACION']);
                }
                $Statement->close();
                $Con->Desconectar();
                return $new;
            }
            else
            {
                $Con->Desconectar();
                header("Location: ../Error.php?error=Validacion");
            }
        }

        public function SelectEditKeys($ID)
        {
            $Con = new Conexion;
            $Statement = $Con->Conecta()->prepare('SELECT ID_KEYS, STATUS_KEY, TEXT_KEY, KEY_NEWS FROM SELECTKEYW WHERE KEY_NEWS = ? AND STATUS_KEY = TRUE');
            if($this->Vacios($ID))
            {
                $Statement->bind_param("s", $ID);
                $Statement->execute();
                $result = $Statement->get_result();
                $KEYSWORDS = array();
                while ($row = $result->fetch_assoc())
                {
                    $key = new PalabrasClave;
                    $key->setID($row['ID_KEYS']);
                    $key->setStatus($row['STATUS_KEY']);
                    $key->setTexto($row['TEXT_KEY']);
                    $key->setNewKey($row['KEY_NEWS']);
                    array_push($KEYSWORDS, $key);
                }
                $Statement->close();
                $Con->Desconectar();
                return $KEYSWORDS;
            }
            else
            {
                $Con->Desconectar();
                header("Location: ../Error.php?error=Validacion");
            }
        }

        public function SelectEditMedia($ID)
        {
            $Con = new Conexion;
            $Statement = $Con->Conecta()->prepare('SELECT ID_MEDIA, CONTENT_MEDIA, TYPE_MEDIA, MEDIA_STATUS, NEWS_MEDIA FROM SELECTMEDIA WHERE NEWS_MEDIA = ? AND MEDIA_STATUS = TRUE');
            if($this->Vacios($ID))
            {
                $Statement->bind_param("s", $ID);
                $Statement->execute();
                $result = $Statement->get_result();
                $MEDIANEWS = array();
                while ($row = $result->fetch_assoc())
                {
                    $media = new MediaClasses;
                    $media->setIDMedia($row['ID_MEDIA']);
                    $media->setContenido($row['CONTENT_MEDIA']);
                    $media->setTipo($row['TYPE_MEDIA']);
                    $media->setStatus($row['MEDIA_STATUS']);
                    $media->setNewMedia($row['NEWS_MEDIA']);
                    array_push($MEDIANEWS, $media);
                }
                $Statement->close();
                $Con->Desconectar();
                return $MEDIANEWS;
            }
            else
            {
                $Con->Desconectar();
                header("Location: ../Error.php?error=Validacion");
            }
        }

        public function UpdateNew($ID, $Title, $PaisN, $CiudadN, $EstadoN, $DateN, $DescriptionN, $TextoN, $StatusNew, $EditorSatusN, $Seccion, $Hora, $Retro)
        {
            $Con = new Conexion;
            $Statement = $Con->Conecta()->prepare("CALL UPDATE_NOTICIA(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $Statement->bind_param("sssssssssssss", $Title, $PaisN, $CiudadN, $EstadoN, $DateN, $DescriptionN, $TextoN, $StatusNew, $EditorSatusN, $Seccion, $Hora, $ID, $Retro);
            $Statement->execute();
            $Statement->close();
            $Con->Desconectar();
        }

        public function DeleteNew($ID)
        {
            $Con = new Conexion;
            $Statement = $Con->Conecta()->prepare("SELECT DELETE_NOTICIAA(?)");
            $Statement->bind_param("s", $ID);
            $Statement->execute();
            $Statement->close();
            $Con->Desconectar();
        }

        public function DeleteNewFromUser($REPORTER)
        {
            $Con = new Conexion;
            $Statement = $Con->Conecta()->prepare("SELECT DELETE_NEW_BC_DEL_US(?)");
            $Statement->bind_param("s", $REPORTER);
            $Statement->execute();
            $Statement->close();
            $Con->Desconectar();
        }

        public function NoticiaRel($PalabraCl, $ID)
        {
            $Con = new Conexion;
            $Noticia = array();
            $PalabraCQuery = "";
            $PalabraCQuery = " AND TEXT_KEY LIKE '%".$PalabraCl."%' AND ID_NEWS = KEY_NEWS";
            $result = $Con->Conecta()->query("SELECT ID_NEWS, TITLE_NEW, PRINCIPAL_PICTURE FROM BUSQUEDA_AV WHERE Activa = TRUE AND NEW_STATUS = 3 AND ID_NEWS != ".$ID.$PalabraCQuery." LIMIT 5;");
            while ($row = $result->fetch_assoc())
            {
                $not = new Noticias;
                $not->SetID($row['ID_NEWS']);
                $not->SetTitulo($row['TITLE_NEW']);
                $not->SetFoto($row['PRINCIPAL_PICTURE']);
                array_push($Noticia, $not);
            }
            $Con->Desconectar();
            return $Noticia;
        }

        public function DeleteNewFromSection($Seccion)
        {
            $Con = new Conexion;
            $Con->Conecta()->query("UPDATE news SET Activa = false WHERE Seccion = ".$Seccion);
            $Con->Desconectar();
        }

    }
?> 