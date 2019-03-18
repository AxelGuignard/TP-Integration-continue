<nav class="navbar navbar-light bg-custom-primary">
    <div></div>
    <form class="form-inline">
        <?php
        if(isset($_SESSION['user']))
        {
            ?>
            <button type="button" onclick="disconnect()" class="btn btn-outline-light">DISCONNECT</button>
            <?php
        }
        else
        {
            ?>
            <a href="register.php" class="btn btn-outline-light">REGISTER</a>
            <a href="connection.php" class="btn btn-outline-light">CONNECT</a>
            <?php
        }
        ?>
    </form>
</nav>