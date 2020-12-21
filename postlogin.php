<html>
    <head>
        <title>Welcome Page!</title>
        <link rel="stylesheet" href="css/mystyle.css">

    </head>
    <body>        
    
<?php
session_start();


$email=$_POST['username'];
$pass=$_POST['password'];
$servername = "localhost";
$username = "phpmyadmin";
$password = "admin";
$database ="testDB";
$conn = new mysqli($servername, $username, $password,$database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$result = $conn -> query("SELECT * 
                        FROM employee 
                        where email='$email'
                        and password='$pass'");

$sa=mysqli_num_rows($result);
if($sa===1){
    while($row = mysqli_fetch_array($result))
    {
        ?>
        <p> Hello <?php echo $row['firstname'];?> <img class="img1" src="<?php echo $row['storage'];?>" alt=""></p>
        <br>
        <center><p> welcome to the login page</p></center>
        <br>
        <?php


if ($result = $conn -> query("SELECT * FROM employee")) {
    
}
?>
<center>
<?php
echo " <table border='1'>
<tr>
<th>First Name</th>
<th>Last Name</th>
<th>Age</th>
<th>E-mail</th>
<th>Profile Photo</th>
</tr>";
while($row = mysqli_fetch_array($result))
  {
      $new=$row['storage'];
  echo "<tr>";
  echo "<td>" . $row['firstname'] . "</td>";
  echo "<td>" . $row['lastname'] . "</td>";
  echo "<td>" . $row['age'] . "</td>"; 
  echo "<td>" . $row['email'] . "</td>";
  echo "<td>" ."<img src='$new'>"."</td>";
  echo "</tr>";
  }
echo "</table>";


    }

}
else{
    ?>
    <p class="para"> YOU HAVE ENTERED WRONG CREDENTIALS</p>
    <P class="para">PLEASE TRY AGAIN USING CORRECT CREDENTIALS</P>
    <?php
}
session_destroy();

?>
</center>
<button type="submit">Log Out </button>
</body>

</html>