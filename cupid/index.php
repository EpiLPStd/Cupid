<?php
    session_start();
    if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']==true){
        if($_SESSION['admin']==true)
            header('location:./manage');
        else
           header('location:./event');
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

        form {
            text-align: center;
            padding: 20px;
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            align-content: center;
            justify-content: center;
            align-items: center;
            font-size: 20px;
        }

        form * {
            margin:5px;
        }

    </style>

</head>
<body>

<form action="login.php" method="POST" style="text-align: center; padding: 20px;">
    <label for="eventLogin">Event name: </label> <input type="text" name="eventLogin" id="eventLogin"/>  
    <label for="eventPasswd">Password: </label><input type="password" name="eventPasswd" id="eventPasswd"/>
    <input type="submit" value="Log In"/>
</form>
<p><?php if(isset($_SESSION['warning']) && $_SESSION['warning']!="") echo $_SESSION['warning'] ?></p>

</body>
</html>