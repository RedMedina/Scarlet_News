<div class="perfil">
    <?php
        session_start();
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
        {
    ?>
    <button class="btnLoginUs" onclick="location.href='Logout.php'"><i class="gg-log-out" style="color: white; position: relative; left:23px;"></i></button>
    <!-- <i class="gg-log-out"></i> -->
    <?php
        }
        else
        {
    ?>
    <button class="btnLoginUs" onclick="location.href='login.php'"><i class="gg-log-in" style="color: white; position: relative; left:23px;"></i></button>
    <?php
        }
    ?>
</div>