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
$_SESSION["email"]=$email;
$hashedpassword=md5($password);
echo $_SESSION["email"];
$sql = "INSERT INTO users (firstName,lastName,gender,email,password,number)
 VALUES ('$firstName', '$lastName', '$gender', '$email','$hashedpassword','$number')"; 

$result = mysqli_query($link, "SELECT * FROM users WHERE email = '$email'");

if($result->num_rows == 0) {
    
    $sql = mysqli_query($link,"INSERT INTO users (firstName,lastName,gender,email,password,number)
    VALUES ('$firstName', '$lastName', '$gender', '$email','$hashedpassword','$number')"); 
    echo $_SESSION["email"];
    $logged_in_user_id = mysqli_insert_id($link);

    $_SESSION['user'] = getUserById($logged_in_user_id);
    echo $_SESSION['user'];
    header("Location:login.php");
} else {
    echo "Email already exists";
}
}

function getUserById($id){
	global $link;
	$query = "SELECT * FROM users WHERE id=" . $id;
	$result = mysqli_query($link, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

//cvu make

if(isset($_POST["Submit"])){
    
$education=$_POST["education"];
$hobies=$_POST["hobies"];
$work_experience=$_POST["work_experience"];
$social_network=$_POST["social_network"];
$age=$_POST["age"];
$about=$_POST["about"];


$sql = "INSERT INTO cvu (education,hobies,work_experience,social_network,age,about) 
VALUES ( '$education', '$hobies', '$work_experience','$social_network','$age','$about')"; 

$result = mysqli_query($link, "SELECT * FROM cvu WHERE education = '$education'");

if($result->num_rows == 0) {
    
    $sql = mysqli_query($link,"INSERT INTO cvu (education,hobies,work_experience,social_network,age,about) 
    VALUES ( '$education', '$hobies', '$work_experience','$social_network','$age','$about')"); 
    header("Location:CV.php");
} else {
    echo "User ID already exists";
}
}


/*function printer($id){
    
    $sql1="SELECT * FROM users WHERE id=".$id;
    $result1=mysqli_query($link,$sql1);
    $resultCheck=mysqli_num_rows($result1);
}
if($resultCheck>0){
    while($row=mysqli_fetch_assoc($result1)){
        echo $row['firstName'] . "<br>";
    }*/
//}


mysqli_close($link);





?>
