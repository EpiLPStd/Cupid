<?php
    $file_path = "images/";

    if (!is_dir($file_path)) {
        mkdir($file_path, 0755, true);
    }

    $file_path = $file_path . basename($_FILES['uploaded_file']['name']);

    if (move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $file_path)) {
        echo "1";
    } 
    else {
        echo "0";
    }
?>
