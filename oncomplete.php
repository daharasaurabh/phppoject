<html>
<head><title>Sucessfull Signup</title>
</head>
<body>
<center>
<?php
$servername = "localhost";
$username = "phpmyadmin";
$password = "admin";
$database ="testDB";
$conn = new mysqli($servername, $username, $password,$database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$firstname=$_POST["firstname"];
$lastname=$_POST["lastname"];
$email=$_POST["email"];
$contact=$_POST["contact"];
$password=$_POST["password"];
$age=$_POST["age"];
$uploadOk = 1;

$result = $conn -> query("select * from employee where email='$email'");
if (mysqli_num_rows($result) > 0) {
  echo"<script>
  alert('Use a Different Email Id');
  document.location='signup.php'
  </script>";
exit();	
}


$target_dir = "uploads/";
$target_file = $target_dir .$_FILES["fileToUpload"]["name"];
$tempname = $_FILES["fileToUpload"]["tmp_name"];
$file_type = $_FILES['fileToUpload']['type'];

$sql1 = "INSERT INTO employee() 
VALUES ('$firstname','$lastname','$email','$contact','$age','$password','$target_file');";


if (file_exists($target_file)) {
  $uploadOk = 0;
  }
  if ($uploadOk == 0) {
    echo"<script>
      alert('Failed to Sign UP Try again!! ');
      document.location='signup.php'
      </script>";;
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($tempname, $target_file))  {
        if ($conn->query($sql1) === TRUE) {
          ?>
          <p>you have sucessfully signed as a new user</p>
          <br>
          <button onclick="location.href='login.php'" type="button" >Login</button>

          <?php

        }
        else {
            echo "Error sql" . $conn->error;
        }         
    }
    else{ 
      echo"<script>
      alert('Failed to Sign UP Try again!! ');
      document.location='signup.php'
      </script>";
    } 
  }
?>
</center>
</body>
</html>