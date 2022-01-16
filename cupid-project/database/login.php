<?php
require "DataBase.php";
$db = new DataBase();

if (isset($_POST['username']) && isset($_POST['password'])) {
    if ($db->dbConnect()) {
        if ($db->logIn("users", $_POST['username'], $_POST['password'])) {
            echo "1";
        } else echo "0";
    } else echo "-1";
} else echo "-2";

?>
