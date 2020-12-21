<?php
$servername = "localhost";
$username = "phpmyadmin";
$password = "admin";
$database ="testDB";
$conn = new mysqli($servername, $username, $password,$database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST["c_id"])){

    $result = $conn -> query("select * from employee");
    while($row = mysqli_fetch_array($result))
        {
            if($row['email']===$_POST["c_id"])
            {
                echo "User email ID alredy exists";
            }
        }
}
if(isset($_POST["age"])){

    if($_POST["age"]>60){
        echo "enter a valid age";
    }
    if($_POST["age"]<18){
        echo "enter a valid age";
    }
}
if(isset($_POST["contact"])){

    if(strlen($_POST["contact"])!==10){
        echo "enter a 10 digit mobile no";
    }
}
if(isset($_POST["confpassword"])){

    if($_POST["password"]!==$_POST["confpassword"]){
        echo "Your Password Does not Match";
    }
}

?>