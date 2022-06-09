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

function ValInS()
{
    let Correo = document.getElementById("CRegUs").value;
    let nombre = document.getElementById("NameRegUs").value;
    let password = document.getElementById("PassRegUs").value;
    let confirmpass = document.getElementById("CPassRegUs").value;

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