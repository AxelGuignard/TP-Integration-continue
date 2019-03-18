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
            <form action="javascript:register()" id="registerForm">
                <div class="form-group">
                    <label for="firstName">Prénom</label>
                    <input type="text" name="firstName" id="firstName" class="form-control" required/>
                    <label for="lastName">Nom</label>
                    <input type="text" name="lastName" id="lastName" class="form-control" required/>
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control" required/>
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" class="form-control" required/>
                    <label for="passwordConfirm">Mot de passe (confirmation)</label>
                    <input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control" required/>
                    <button type="submit" class="btn btn-outline-primary d-block mx-auto mt-2">Valider</button>
                </div>
            </form>
        </div>

        <?php
        include 'template/footer.php';
        ?>
    </body>
</html>