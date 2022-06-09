function BorrarNoticiaE(ID)
{
    Swal.fire({
        title: '¿Esta seguro de eliminar la Noticia?',
        text: "Borrará la noticia permanentemente",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Borrar Noticia'
      }).then((result) => {
        if (result.isConfirmed) {
          let id = document.getElementById('iDNewE').value;
          location.href = "Include/DeleteNew_Inc.php?DelNew=true&Ad=Editor&IDNew="+ID;
        }
      })
}