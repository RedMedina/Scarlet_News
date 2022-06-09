function ValSect()
{
    let Numbera = document.getElementById("numSelect").value;
    let nameSect = document.getElementById("NameSect").value;

    if(!isNaN(Numbera) && Numbera.length > 0 && nameSect.length > 0)
    {
        Swal.fire(
            'Sección Creada Correctamente!',
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