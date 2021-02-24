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

if(isset($_POST["submit"])){
$firstName=$_POST["firstName"];
$lastName=$_POST["lastName"];
$gender=$_POST["gender"];
$email=$_POST["email"];
$password=$_POST["password"];
$number=$_POST["number"];
$hashedpassword="";

$hashedpassword=md5($password);

$sql = "INSERT INTO users (firstName,lastName,gender,email,password,number)
 VALUES ('$firstName', '$lastName', '$gender', '$email','$hashedpassword','$number')"; 

$result = mysqli_query($link, "SELECT * FROM users WHERE email = '$email'");

if($result->num_rows == 0) {
    
    $sql = mysqli_query($link,"INSERT INTO users (firstName,lastName,gender,email,password,number)
    VALUES ('$firstName', '$lastName', '$gender', '$email','$hashedpassword','$number')"); 
    header("Location:login.php");
} else {
    echo "Email already exists";
}
}

//CV make

if(isset($_POST["Submit"])){
$education=$_POST["education"];
$hobies=$_POST["hobies"];
$work_experience=$_POST["work_experience"];
$social_network=$_POST["social_network"];
$age=$_POST["age"];
$about=$_POST["about"];
$uid=$_POST["user_id"];

$sql = mysqli_query($link,"INSERT INTO cv (education,hobies,work_experience,social_network,age,about,user_id) 
VALUES ( '$education', '$hobies', '$work_experience','$social_network','$age','$about','$uid')"); 

$result = mysqli_query($link, "SELECT * FROM cv WHERE education = '$education'");

if($result->num_rows == 0) {
    
    $sql = mysqli_query($link,"INSERT INTO cv (education,hobies,work_experience,social_network,age,about,user_id) 
    VALUES ( '$education', '$hobies', '$work_experience','$social_network','$age','$about','$uid')"); 
    header("Location:CV.php");
} else {
    echo "User ID already exists";
}
}
mysqli_close($link);





?>
