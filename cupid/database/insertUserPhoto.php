<?php
require "DataBase.php";
$db = new DataBase();

if (isset($_POST['id_u']) && isset($_POST['id_p']) && isset($_POST['id_e'])) {
    if ($db->dbConnect()) {
        if ($db->insertUserPhoto("users_photos", $_POST['id_u'], $_POST['id_p'], $_POST['id_e'])) {
            echo "1";
        } else echo "0";
    } else echo "-1";
} else echo "-2";
?>
