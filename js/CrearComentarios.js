//Seleccionar Comentarios Principales
/*$(function($)
{
    let IDNoticia = $("#IDNEW").val();
    $.ajax({
        url: './Include/CommentsGet_Inc.php',
        type: 'POST',
        data: {'idNoticia': IDNoticia, 'TipoComment': 1, 'CommentP': 1},
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
            alert("Consumo Comments principal Exitoso");
        }
    });
});*/

$(function($)
{
    let IDNoticia = $("#NewID").val();
    $.ajax({
        url: './Include/MeGetLike_Inc.php',
        type: 'POST',
        data: {'MeLikes': 1, 'NewsL': IDNoticia},
        success: function(response)
        {
            console.log(response);
            if(response == 1)
            {
                document.getElementById("btnLikes").className = "btnLikesLiked";
                document.getElementById("LikedID").value = "True";
            }
            else
            {
                document.getElementById("btnLikes").className = "btnLikes";
                document.getElementById("LikedID").value = "False";
            }
        },
        error: function(jqXHR, status, error)
        {
            console.log(error);
            console.log(status);
        },
        complete: function(jqXHR, status)
        {
            console.log("Consumo Likes Me Exitoso");
        }
    });
});



$(function($)
{
    let IDNoticia = $("#NewID").val();
    $.ajax({
        url: './Include/LikesSelect_Inc.php',
        type: 'POST',
        data: {'LikesR': 1, 'NewsL': IDNoticia},
        success: function(response)
        {
            console.log(response);
            document.getElementById("btnLikes").innerHTML = response + " <i class='fa fa-thumbs-up' style='font-size:20px;'></i>";
        },
        error: function(jqXHR, status, error)
        {
            console.log(error);
            console.log(status);
        },
        complete: function(jqXHR, status)
        {
            console.log("Consumo Likes principal Exitoso");
        }
    });
});


$(function($){
$("#btnLikes").click(function(){
    
    let IDNoticia = $("#NewID").val();
    let Liked = $("#LikedID").val();

    if(Liked === "False")
    {
        $.ajax({
            url: './Include/LikesInser_Inc.php',
            type: 'POST',
            data: {'LikesI': 1, 'NewsL': IDNoticia},
            success: function(response)
            {
                console.log(response);
                document.getElementById("btnLikes").innerHTML = response + " <i class='fa fa-thumbs-up' style='font-size:20px;'></i>";
                document.getElementById("btnLikes").className = "btnLikesLiked";
                document.getElementById("LikedID").value = "True";
            },
            error: function(jqXHR, status, error)
            {
                console.log(error);
                console.log(status);
            },
            complete: function(jqXHR, status)
            {
                console.log("Consumo Crear Likes Exitoso");
            }
            });
    }
    else if (Liked === "True")
    {
        $.ajax({
            url: './Include/DeleteLikes_Inc.php',
            type: 'POST',
            data: {'btnLikes': 1, 'NewID': IDNoticia},
            success: function(response)
            {
                console.log(response);
                document.getElementById("btnLikes").innerHTML = response + " <i class='fa fa-thumbs-up' style='font-size:20px;'></i>";
                document.getElementById("btnLikes").className = "btnLikes";
                document.getElementById("LikedID").value = "False";
            },
            error: function(jqXHR, status, error)
            {
                console.log(error);
                console.log(status);
            },
            complete: function(jqXHR, status)
            {
                console.log("Consumo Eliminar Likes Exitoso");
            }
            });
    }
    
});
});
  


function MostrarLikes()
{

}