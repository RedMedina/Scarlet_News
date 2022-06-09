<link href='https://css.gg/mic.css' rel='stylesheet'>
<link href='https://css.gg/close.css' rel='stylesheet'>
<link href='https://css.gg/menu.css' rel='stylesheet'>

<style>
    .sidebarE{
        background-color: #FF0000;
        position: fixed;
        bottom:0px;
        /*max-width: 220px;
        min-width: 220px;*/
        min-height: 450px;
        height: 100%;
        overflow-x: hidden;
        transition: 0.5s;
        display: block;
        left: 0px;
        width: 0px;
    }
    .aSB{
        color: white;
        text-decoration: none;
        font-size: 19px;
        font-family: Candara;  
    }

    .aSB:hover
    {
        background-color: white;
        color: black;
    }

    .LinkSB
    {
        max-width: 230px;
        min-width: 230px;
        max-height: 50px;
        min-height: 50px;
    }
    .LinkSB:hover{
        background-color: white;
    }
    .imgUSEd{
        border: 3px solid white;
        border-radius: 50%;
        height: 100px;
        width: 100px;
    }

    #main {
        transition: margin-left .5s;
    }

    .btnSideBar{
        border: 0px;
        background-color: white;
        border-radius: 25px;
        color: red;
        font-family: Candara;
        max-width: 30px;
        min-width: 30px;
        max-height: 30px;
        min-height: 30px;
        font-style: bold;
        font-size: 15px;
        position: relative;
        bottom: 210px;
        left: 85px;
    }

    .btnSideBar:hover{
       opacity: 0.8;
    }

    .btnOpenSb{
        color: white;
        background-color: #FF0000;
        border: 0px;
        border-radius: 15px;
        position: relative;
        left: 10px;
        bottom: 30px;
        max-width: 40px;
        min-width: 40px;
        max-height: 40px;
        min-height: 40px;
    }

    .btnOpenSb:hover{
        opacity: 0.6;
    }
</style>

<div class="sidebarE" id="sidebarE">
    <center><br>
    <a href="Porfile.php"><img src=<?php echo $_SESSION['imagen']?> class="imgUSEd" width="100" height="100"></a><br><br>
    <a href="Porfile.php" class="aSB"><div class="LinkSB">Perfil</div></a><br>
    <button class="btnSideBar" onclick="closeNav()"><i class="gg-close"></i></button><br>
    </center>
</div>

<div id = "main">
<button class="btnOpenSb" onclick="openNav()"><i class="gg-menu" style="left:4px;"></i></button>

<script>
function openNav() {
document.getElementById("sidebarE").style.width = "220px";
document.getElementById("main").style.marginLeft = "220px";
}

function closeNav() {
document.getElementById("sidebarE").style.width = "0";
document.getElementById("main").style.marginLeft= "0";
}
</script>