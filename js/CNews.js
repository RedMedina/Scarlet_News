function ValCNews()
{
    let Titulo = document.getElementById("TiNews").value;
    let Pais = document.getElementById("PNews").value;
    let Ciudad = document.getElementById("CNews").value;
    let Colonia = document.getElementById("CoNews").value;
    let Fecha = document.getElementById("FecNews").value;
    let Hora = document.getElementById("HorNews").value;
    let Descripcion = document.getElementById("DescNews").value;
    let Texto = document.getElementById("TextNews").value;

    if(Titulo.length > 0 && Pais.length > 0 && Ciudad.length > 0 && Colonia.length > 0 && Fecha.length > 0
        && Hora.length > 0 && Descripcion.length > 0 && Texto.length > 0)
    {
        Swal.fire(
            'Noticia Creada Correctamente!',
            '',
            'success'
          )
          return true;
    }
    else
    {
        Swal.fire({icon: 'error',title: 'Error',text: 'Algunos datos no están correctos'})
        return false;
    }
}