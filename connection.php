<?php
session_start();

/**
 * Created by PhpStorm.
 * User: axelg
 * Date: 07/01/2019
 * Time: 16:08
 */
?>

<!DOCTYPE HTML>
<html>
<?php
include 'template/head.php';
?>
<body>
<?php
include 'template/navbar.php';
?>
<?php
include 'template/header.php';
?>

<div class="w-50 mx-auto p-2 rounded bg-custom-light mt-3">
    <form action="javascript:connect()" id="connectionForm">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control" required/>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" class="form-control" required/>
            <button type="submit" class="btn btn-outline-primary d-block mx-auto mt-2">Valider</button>
        </div>
    </form>
</div>

<?php
include 'template/footer.php';
?>
</body>
</html>