function name(nom)
{
    let res = /^[a-zA-Z]+$/.test(nom);
    return res;
}

function mail(m)
{
    let re = /\S+@\S+\.\S+/;
    return re.test(m);
}

function pass(pas)
{
    let re = /^(?=.*\d)(?=.*[!@#$%^&.*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    return re.test(pas);
}

function ValPerS()
{
    let Correo = document.getElementById("CorrPF").value;
    let nombre = document.getElementById("namePF").value;
    let password = document.getElementById("ContPF").value;
    let confirmpass = document.getElementById("ConfContPF").value;

    let cmail = mail(Correo);
    let cnombre = name(nombre);
    let cpass = pass(password);
    let CCpass;
    if(password === confirmpass)
    {
        CCpass = true;
    }
    else
    {
        CCpass = false;
    }

    if(cmail == true && cnombre == true && cpass == true && CCpass == true)
    {
        Swal.fire(
            'Cuenta Creada Correctamente!',
            'Será redirigido a su perfil...',
            'success'
          )
        return true;
    }
    else
    {
        if(cmail == false){Swal.fire({icon: 'error',title: 'Error',text: 'Formato de email invalido'})}
        if(cnombre == false){Swal.fire({icon: 'error',title: 'Error',text: 'Solo se admiten letras en el nombre'})}
        if(cpass == false){Swal.fire({icon: 'error',title: 'Error',text: 'La contraseña debe ser 8 caracteres, con mayusculas, minusculas, numeros y caracteres especiales'})}
        if(CCpass == false){Swal.fire({icon: 'error',title: 'Error',text: 'Confirme correctamente la contraseña'})}
        return false;
    }
}



function EliminarCuenta()
{
    Swal.fire({
        title: '¿Esta seguro de eliminar la cuenta?',
        text: "Borrará su cuenta permanentemente",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Borrar Cuenta'
      }).then((result) => {
        if (result.isConfirmed) {
          location.href = "Include/DeleteUser_Inc.php?BtnPFX=true";
        }
      })    
}

function EliminarCuentaRep()
{
    Swal.fire({
        title: '¿Esta seguro de eliminar la cuenta?',
        text: "Borrará la cuenta permanentemente",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Borrar Cuenta'
      }).then((result) => {
        if (result.isConfirmed) {
          let ID = document.getElementById("idPF").value;
          location.href = "Include/DeleteUser_Inc.php?BtnPFEditUS=true&ID="+ID;
        }
      })
}

