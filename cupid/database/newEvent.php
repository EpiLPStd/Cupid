<?php
require "DataBase.php";
$db = new DataBase();

if (isset($_POST['name']) && isset($_POST['password'])) {
    if ($db->dbConnect()) {
        if ($db->createEvent("events", $_POST['name'], $_POST['password'])) {
            echo "1";
        } else echo "0";
    } else echo "-1";
} else echo "-2";

?>
