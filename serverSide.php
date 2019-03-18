<?php
session_start();

/**
 * Created by PhpStorm.
 * User: axelg
 * Date: 18/03/2019
 * Time: 08:51
 */

if(!isset($_REQUEST["action"]))
{
    echo false;
    exit();
}

require_once "class/BDD.php";
$db = BDD::getConnection();

$action = $_REQUEST["action"];

switch($action)
{
    case "register":
        if(!isset($_REQUEST["firstName"]) or !isset($_REQUEST["lastName"]) or !isset($_REQUEST["email"]) or !isset($_REQUEST["password"]))
        {
            echo false;
            exit();
        }

        $firstName = $_REQUEST["firstName"];
        $lastName = $_REQUEST["lastName"];
        $email = $_REQUEST["email"];
        $password = password_hash($_REQUEST["password"], PASSWORD_DEFAULT);

        $query = "INSERT INTO Utilisateur (uti_password, uti_mail, uti_inscription, uti_name, uti_lastname) VALUES (:password, :email, now(), :firstName, :lastName)";
        $params = [':password' => $password, ':email' => $email, ':firstName' => $firstName, 'lastName' => $lastName];
        $stmt = $db->prepare($query);
        if(!$stmt->execute($params))
        {
            print_r($db->errorInfo());
            exit();
        }

        $id = $db->lastInsertId();

        $_SESSION['user'] = $id;
        echo true;
        break;
    case "disconnect":
        session_unset();
        session_destroy();
        break;
    case "connect":
        if(!isset($_REQUEST["email"]) or !isset($_REQUEST["password"]))
        {
            echo false;
            exit();
        }

        $email = $_REQUEST["email"];
        $password = $_REQUEST["password"];

        $query = "SELECT uti_id, uti_password FROM Utilisateur WHERE uti_mail = :email";
        $params = [':email' => $email];
        $stmt = $db->prepare($query);
        if(!$stmt->execute($params))
        {
            print_r($db->errorInfo());
            exit();
        }

        if($stmt->rowCount() > 0)
        {
            $result = $stmt->fetchAll();

            $found = false;
            foreach($result as $user)
            {
                if(password_verify($password, $user["uti_password"]))
                {
                    $found = true;
                    $_SESSION['user'] = $user["uti_id"];
                    break;
                }
            }
            echo $found;
        }
        else
        {
            echo false;
        }
        break;
}