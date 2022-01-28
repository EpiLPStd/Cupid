<?php 
  
 define('DB_HOST', 'localhost');
 define('DB_USER', 'root');
 define('DB_PASS', '');
 define('DB_NAME', 'cupid');
 
 $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
 
 if (mysqli_connect_errno()) {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 die();
 }

 $stmt = $conn->prepare("SELECT id_e FROM events WHERE name = '" . $_POST['name'] . "';");
 $stmt->execute(); 
 $stmt->bind_result($name);
 
 $products = array(); 
 
 while($stmt->fetch()){
     $temp = array();
     $temp['name'] = $name; 
     array_push($products, $temp);
 }
 
 echo $name;