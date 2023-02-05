<!DOCTYPE html>
<html>
  <head>
  </head>
  <body>
  <?php

$servername = "localhost";//gethostbyname('www.techtails.in');
$username = "u845107997_dheeraj";
$password = "1234@#Qwer";
$dbname = "u845107997_users";

$fName = $_REQUEST['first_name'];
$lName = $_REQUEST['last_name'];
$contact = $_REQUEST['contact'];
$email = $_REQUEST['email'];
$passwd = $_REQUEST['password'];
$age = $_REQUEST['age'];
 
// Create connection
$conn = mysqli_connect($servername,$username, $password, $dbname);

// Check connection
if($conn === false)
{
  die("ERROR: Could not connect. "
      . mysqli_connect_error());
}


$sql = "INSERT INTO user_info (first_name, last_name,age, contact, email, passwd)
VALUES ('$fName', '$lName','$age', '$contact','$email','$passwd')"; 
if(mysqli_query($conn, $sql))
{
  echo "<h3>data stored in a database successfully.";
}
else
{
  echo nl2br("\nERROR: Hush! Sorry $sql. ". mysqli_error($conn));
}

$conn->close();
echo nl2br("\nFirst Name : $fName\nLast Name : $lName\nAge : $age\nContact No : $contact\nEmail : $email");
header("Location : https://www.techtails.in");


?>
  </body>
</html>
