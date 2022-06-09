var i = 0;
        $(document).ready(function(){
        $("#btnAgregarH").click(function(){
        var Hash = document.getElementById('newhashN').value;
        if(Hash === ""){
        	Swal.fire({icon: 'error',title: 'Error',text: 'Hay Campos Vacios'})
        }else{
                let num = document.getElementById('numEtiq').value;
    		$("#hashtags").append("<div class='PalabrasCL'>\n\
                <input type='text' value="+Hash+" name='EtiqHash"+num+"' id='EtiqHash"+num+"'class='hash1'></div>");
                document.getElementById('newhashN').value = "";
                document.getElementById('numEtiq').value = parseInt(num) + 1;
        }
	});
        i++;
        });