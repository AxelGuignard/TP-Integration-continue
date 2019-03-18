<?php
session_start();

/**
 * Created by PhpStorm.
 * User: axelg
 * Date: 07/01/2019
 * Time: 16:08
 */

require_once "class/BDD.php";
$db = BDD::getConnection();
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

        <?php
        if($_SESSION["user"]) {
            ?>
            <div class="bg-custom-light w-50 rounded p-3 mx-auto mt-3">
                <table>
                    <thead>
                    <tr>
                        <th>Artiste</th>
                        <th>Album</th>
                        <th>Année</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $query = "SELECT art_nom, alb_nom, alb_annee FROM albums, artistes WHERE albums.alb_art = artistes.art_id";
                    $stmt = $db->prepare($query);
                    $stmt->execute();
                    $result = $stmt->fetchAll();

                    foreach ($result as $album) {
                        echo "<tr>";
                        echo "<td>" . $album["art_nom"] . "</td>";
                        echo "<td>" . $album["alb_nom"] . "</td>";
                        echo "<td>" . $album["alb_annee"] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <?php
        }
        ?>

        <?php
        include 'template/footer.php';
        ?>
    </body>
</html>