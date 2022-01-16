<?php
require "DataBase.php";
$db = new DataBase();

if (isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password'])) {
    if ($db->dbConnect()) {
        if ($db->signUp("users", $_POST['email'], $_POST['username'], $_POST['password'])) {
            echo "1";
        } else echo "0";
    } else echo "-1";
} else echo "-2";

?>
