<nav class="navbar navbar-light bg-main">
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
            <a href="" class="btn btn-outline-light">REGISTER</a>
            <button type="button" onclick="connect()" class="btn btn-outline-light">CONNECT</button>
            <?php
        }
        ?>
    </form>
</nav>