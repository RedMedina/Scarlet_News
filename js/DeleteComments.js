function EliminarComentarios(idNoticia, idComentario)
{
    location.href = "./Include/DeleteCom_Inc.php?DeleteComBtn=1&IdCom="+idComentario+"&IdNew="+idNoticia;
}


$(function($){
    $("#BorrarCom").click(function(){
        var $this = $(this);
        var number = $this.data('id');
        $.ajax({
            url: './Include/DeleteCom_Inc.php',
            type: 'POST',
            data: {'DeleteComBtn': 1, 'IdCom': number},
            success: function(response)
            {
                console.log(response);
            },
            error: function(jqXHR, status, error)
            {
                console.log(error);
                console.log(status);
            },
            complete: function(jqXHR, status)
            {
                console.log("Eliminar Comentario Exitoso");
            }
        });
    });
});


$(function($){
    $("#BorrarCom").click(function(){
        var $this = $(this);
        var number = $this.data('id');
        $.ajax({
            url: './Include/DeleteCom_Inc.php',
            type: 'POST',
            data: {'DeleteComBtn': 1, 'IdCom': number},
            success: function(response)
            {
                console.log(response);
            },
            error: function(jqXHR, status, error)
            {
                console.log(error);
                console.log(status);
            },
            complete: function(jqXHR, status)
            {
                console.log("Eliminar Comentario Exitoso");
            }
        });
    });
});