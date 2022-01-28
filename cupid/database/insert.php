<?php
require "DataBase.php";
$db = new DataBase();

if (isset($_POST['name'])) {
    if ($db->dbConnect()) {
        if ($db->insert("photos", $_POST['name'])) {
            echo "1";
        } else echo "0";
    } else echo "-1";
} else echo "-2";
?>
