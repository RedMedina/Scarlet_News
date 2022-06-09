let Antes = "";
let Antes2 = "";

function encodeImageFileAsURL(element) {
  var file = element.files[0];
  var reader = new FileReader();
  reader.onloadend = function() {
    let num = document.getElementById('numI').value;
    Antes = Antes + "<input type='hidden' name='archivoIMG"+num+"'value="+reader.result+"><img src="+reader.result+" height='150' width='200' class='imgMediaCN'>";
    document.getElementById('ArchivosI').innerHTML = Antes;
    //document.getElementById('CosoIMGperfil').src = reader.result;
    document.getElementById('numI').value = parseInt(num) + 1;
  };
  reader.readAsDataURL(file);
}

function encodeVideoFileAsURL(element) {
        var file = element.files[0];
        var reader = new FileReader();
        reader.onloadend = function() {
          let num = document.getElementById('numV').value;
          Antes2 = Antes2 + "<input type='hidden' name='archivoVIDEO"+num+"'value="+reader.result+"><video src="+reader.result+" height='150' width='200' controls class='VidMediaCN'></video>";
          document.getElementById('ArchivosV').innerHTML = Antes2;
          //document.getElementById('CosoIMGperfil').src = reader.result;
          document.getElementById('numV').value = parseInt(num) + 1;
        };
        reader.readAsDataURL(file);
}