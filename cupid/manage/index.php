<?php
    session_start();
    if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn']!=true || $_SESSION['admin']!=true){
        header('location:../');
        exit();
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cupid</title>
    <style>
        html, body {
            width: 100%;
            height: 100%;
            padding: 0;
            margin: 0;
        }

        body {
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            align-content: center;
            justify-content: center;
            align-items: center;
        }
        button {
            font-size: 15px;
            min-width:150px;
            margin:5px;
            line-height: 20px;
            padding:5px;
        }
        p {
            font-size:20px;
        }

    </style>

</head>
<body>

<p>Events:</p>
<?php
    $conn = mysqli_connect('localhost','root','','cupid');
    if ($conn -> connect_errno) {
        echo "Failed to connect to MySQL: " . $conn -> connect_error;
        exit();
    }

    $query = "Select * from events";
    $result = mysqli_query($conn,$query);
	$rows = mysqli_num_rows($result);
    while($tab = mysqli_fetch_array($result)){
        echo '<form action="../album/" method="POST"><input type="hidden" value="'.$tab['id_e'].'" name="event"><button>'.$tab['name'].'</button></form>';
    }
    mysqli_close($conn);
?>
<br>
<form action="../logout.php">
    <button>Log Out</button>
</form>

</body>
</html>
