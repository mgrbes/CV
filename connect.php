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


$firstName="";
$lastName="";
$gender="";
$email="";
$password1="";
$number="";
$errors=array();


if(isset($_POST['register'])){
    register();
}

//Register
function register(){
    global $link,$errors, $firstName,$lastName,$gender,$email,$number,$password1;

    $firstName=mysqly_real_escape_string($link,$_POST['firstName']);
    $lastName=mysqly_real_escape_string($link,$_POST['lastName']);
    $gender=mysqly_real_escape_string($link,$_POST['gender']);
    $email=mysqly_real_escape_string($link,$_POST['email']);
    $password1=mysqly_real_escape_string($link,$_POST['password1']);
    $number=mysqly_real_escape_string($link,$_POST['number']);

    if(empty($firstName)) {
    	array_push($errors, "Fill Name field !");
		} 

		if(empty($email)) {
			array_push($errors, "Fill email field !");
		}

    	if(empty($lastName)) {
    	array_push($errors, "Fill Last Name field !");
    	} 

    	if(empty($password1)) {
    	array_push($errors, "Fill Password field !");
    	} 

    	if(empty($gender)) {
        array_push($errors, "Choose gender!");
        
        if(empty($number)) {
            array_push($errors, "Type in your number!");
        } 
        

    }
    
    if (count($errors) == 0) {
		if (isset($_POST['username'])){
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO users (username, email, fname, lname, password, address) 
						VALUES('$username', '$email', '$fname','$lname', '$password','$address')";
			mysqli_query($db, $query);
			$_SESSION['success']  = "New user successfully created!!";
			header('location: profil.php');
		}else{
			$query = "INSERT INTO users (username, email, fname, lname, password, address) 
						VALUES('$username', '$email', '$fname','$lname', '$password','$address')";
			mysqli_query($db, $query);

			// get id of the created user
			$logged_in_user_id = mysqli_insert_id($db);

			$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
			$_SESSION['success']  = "You are now logged in";
		}	header('location: profil.php');				
	}
}


//$password=password_hash($password,PASSWORD_BCRYPT);


/*$sql = "INSERT INTO users (firstName,lastName,gender,email,password,number) VALUES ('$firstName', '$lastName', '$gender', '$email','$password','$number')"; 

$result = mysqli_query($link, "SELECT * FROM users WHERE email = '$email'");

if($result->num_rows == 0) {
    
    $sql = mysqli_query($link,"INSERT INTO users (firstName,lastName,gender,email,password,number)
    VALUES ('$firstName', '$lastName', '$gender', '$email','$password','$number')"); 
    
} else {
    echo "Email already exists";
}*/

mysqli_close($link);

header("Location:login.php");

?>
