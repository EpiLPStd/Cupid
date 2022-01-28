<?php
	session_start();
    $conn = mysqli_connect('localhost','root','','cupid');
    if ($conn -> connect_errno) {
        echo "Failed to connect to MySQL: " . $conn -> connect_error;
        exit();
    }

    $login = mysqli_real_escape_string($conn, $_POST['eventLogin']);
    $pass = mysqli_real_escape_string($conn, $_POST['eventPasswd']);

    $query = "Select id_e, password from events where name = '".$login."'";
    $result = mysqli_query($conn,$query);
	$rows = mysqli_num_rows($result);
    if($rows==0){
        $query = "Select id_u, password from users where login = '".$login."'";
        $result = mysqli_query($conn,$query);
        $rows = mysqli_num_rows($result);
        if ($rows==1){
            $tab = mysqli_fetch_array($result);
            if(password_verify($pass, $tab['password'])){
                $_SESSION['loggedIn']=true;
                $_SESSION['admin']=true;
                $_SESSION['user']=$tab['id_u'];
                $_SESSION['warging']="";
                header('location:./manage');
            }
            else{
                $_SESSION['warning']="Wrong password.";
                header('location:./');
            }
        }
        else{
            $_SESSION['warning']="Error! Try again.";
            header('location:./');
        }
    }
    else if ($rows==1){
		$tab = mysqli_fetch_array($result);
        if(password_verify($pass, $tab['password'])){
            $_SESSION['loggedIn']=true;
            $_SESSION['admin']=false;
            $_SESSION['event']=$tab['id_e'];
            $_SESSION['warning']="";
            header('location:./album');
        }
        else{
            $_SESSION['warning']="Wrong password.";
            header('location:./');
        }
    }
    else{
        echo 'multiple';
        $_SESSION['warning']="Error! Try again.";
        header('location:./');
    }



?>