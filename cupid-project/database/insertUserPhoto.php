<?php
require "DataBase.php";
$db = new DataBase();

if (isset($_POST['id_u']) && isset($_POST['id_p'])) {
    if ($db->dbConnect()) {
        if ($db->insertUserPhoto("users_photos", $_POST['id_u'], $_POST['id_p'])) {
            echo "1";
        } else echo "0";
    } else echo "-1";
} else echo "-2";
?>
