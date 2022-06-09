<?php
class Busqueda
{
    private $Con;
    private $Statement;


    public function BusquedaAv($FechaIn, $FechaFin, $Texto, $PalabraCl)
    {
        $Con = new Conexion;
        $Noticia = array();
        $FechaInQuery = "";
        $FechaFinQuery = "";
        $TextoQuery = "";
        $PalabraCQuery = "";

        if(!empty($FechaIn))
        {
            $FechaInQuery = " AND NEWS_DATE > '".$FechaIn."'";
        }

        if(!empty($FechaFin))
        {
            $FechaFinQuery = " AND NEWS_DATE < '".$FechaFin."'";
        }

        if(!empty($Texto))
        {
            $TextoQuery = " AND (TITLE_NEW LIKE '%".$Texto."%' OR DESCRIPTION_NEWS LIKE '%".$Texto."%' OR TEXTO_NEWS LIKE '%".$Texto."%')";
        }

        if(!empty($PalabraCl))
        {
            $PalabraCQuery = " AND TEXT_KEY LIKE '%".$PalabraCl."%' AND ID_NEWS = KEY_NEWS";
        }

        $result = $Con->Conecta()->query("SELECT ID_NEWS, TITLE_NEW, DESCRIPTION_NEWS, NEWS_DATE, PRINCIPAL_PICTURE FROM BUSQUEDA_AV WHERE Activa = TRUE AND NEW_STATUS = 3".$FechaInQuery.$FechaFinQuery.$TextoQuery.$PalabraCQuery." LIMIT 10;");

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
}


?>