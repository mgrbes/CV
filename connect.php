<?php

session_start();

/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'user');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 



// Check connection
if($link === false){
    echo ("ERROR: Could not connect. " . mysqli_connect_error());
}


$firstName=$_POST["firstName"];
$lastName=$_POST["lastName"];
$gender=$_POST["gender"];
$email=$_POST["email"];
$password=$_POST["password"];
$number=$_POST["number"];

$password=password_hash($password,PASSWORD_BCRYPT);

$sql = "INSERT INTO users (firstName,lastName,gender,email,password,number) VALUES ('$firstName', '$lastName', '$gender', '$email','$password','$number')"; 

$result = mysqli_query($link, "SELECT * FROM users WHERE email = '$email'");

if($result->num_rows == 0) {
    
    $sql = mysqli_query($link,"INSERT INTO users (firstName,lastName,gender,email,password,number)
    VALUES ('$firstName', '$lastName', '$gender', '$email','$password','$number')"); 
    
} else {
    echo "Email already exists";
}

mysqli_close($link);

header("Location:login.php");

?>
