<?php
    session_start();
    if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn']!=true){
        header('location:../');
        exit();
    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Album</title>

    <script src="toPDF.js"></script>
    <script src="toHTML.js"></script>
    <!-- biblioteki do generowania pdf -->
    <script src="blobstream.js"></script>
    <script src="pdfkit.js"></script>
    <script src="pdfExport.js"></script>
    <style>
        .mainHolder {
            background-color: #333;
            padding: 10px;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            align-content: center;
            justify-content: center;
            align-items: center;
        }
        .mainHolder > div:first-child {
            width: 100%;
            text-align:center;
        }

        .container {
            width:515px;
            height: 700px ;
            margin:5px;
            padding: 70px 40px;
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            align-content: center;
            justify-content: center;
            align-items: center;
            background-image: url("back.jpg");
            background-repeat: no-repeat;
            background-position: center;
        }

        .draggable {
            padding: 5px;
            display: flex;
            cursor: move;
            width: 505px;
            height: 340px;
            flex-direction: column;
            text-align: center;
            align-content: center;
            justify-content: center;
            align-items: center;
        }

        .draggable.dragging {
            opacity: .5;
        }

        .draggable > img {
            max-width: 100%;
            max-height: calc(100% - 20px);
        }
        button {
            font-size: 15px;
            min-width:150px;
            margin:5px;
            line-height: 20px;
            padding:5px;
        }

        p {
            all:unset;
            font-size: 15px;
            height: 20px;
        }
    </style>

</head>
<body>

<div class="mainHolder">
    <div>
        <?php
        if($_SESSION['admin']==true) 
            echo '<form action="../manage/" style="all:unset;"><button>Back</button></form>';
        else
            echo '<form action="../logout.php" style="all:unset;"><button>Log Out</button></form>';

        ?>
        <button onclick="saveAsPdf()">Download as PDF</button>
        <button onclick="saveAsHTML()">Download as HTML</button>
    </div>
    <div class="container">
    <?php

        if(!empty($_POST['event']) || !empty($_SESSION['event'])){
            
            $conn = mysqli_connect('localhost','root','','cupid');
            if ($conn -> connect_errno) {
                echo "Failed to connect to MySQL: " . $conn -> connect_error;
                exit();
            }

            if(!empty($_POST['event']))
                $event = $_POST['event']; 
            else
                $event = $_SESSION['event'];
            $path = "../images/"; 

            $query = "SELECT p.name, u.login FROM photos p JOIN users_photos up ON up.id_p = p.id_p JOIN users u on u.id_u=up.id_u WHERE up.id_e = ".mysqli_real_escape_string($conn, $event);

            $result = mysqli_query($conn, $query);

            $rows = mysqli_num_rows($result);
            if($rows==0)
                echo '<p>Event does not contain any pictures.</p>';
            else if($rows==1){
                $tab = mysqli_fetch_array($result);
                echo '<div class="draggable" draggable="true"><img src="'.$path.$tab['name'].'" data-image="'.$path.$tab['name'].'"/><p>@'.$tab['login'].'</p></div>';
            }
            //rodzielanie tego na dwa pojemniki
            
            else{
                $counter = 0;
                while($tab = mysqli_fetch_array($result)){
                    if($counter==2){
                        echo '</div><div class="container">';
                        $counter=0;
                    }
                    $counter++;
                    echo '<div class="draggable" draggable="true"><img src="'.$path.$tab['name'].'" data-image="'.$path.$tab['name'].'"/><p>@'.$tab['login'].'</p></div>';
                }
            }
            mysqli_close($conn);
        }
    ?>
    </div>
</div>

<script src="draggable.js"></script>

</body>
</html>