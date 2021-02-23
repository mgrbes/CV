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
$password="";
$number="";

$errors=array();


if(isset($_POST['register'])){
    register();
}

//Register
function register(){
    global $link,$errors, $firstName,$lastName,$gender,$email,$number;

    $firstName=mysqly_real_escape_string($link,$_POST['firstName']);
    $lastName=mysqly_real_escape_string($link,$_POST['lastName']);
    $gender=mysqly_real_escape_string($link,$_POST['gender']);
    $email=mysqly_real_escape_string($link,$_POST['email']);
    $password=mysqly_real_escape_string($link,$_POST['password']);
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

    	if(empty($password)) {
    	array_push($errors, "Fill Password field !");
    	} 

    	if(empty($gender)) {
        array_push($errors, "Choose gender!");
        }
        if(empty($number)) {
            array_push($errors, "Type in your number!");
        } 
        

    }
    
    if (count($errors) == 0) {
		if (isset($_POST['email'])){
			$password = md5($password);//encrypt the password before saving in the database
			$query = "INSERT INTO users (firstName, lastName, gender, email, password, number) 
					        	VALUES('$firstName', '$lastName', '$gender','$email', '$password','$number')";
			mysqli_query($link, $query);
			$_SESSION['success']  = "New user successfully created!!";
			header('location: index.php');
		}else{
			$query = "INSERT INTO users (firstName, lastName, gender, email, password, number) 
                                VALUES('$firstName', '$lastName', '$gender','$email', '$password','$number')";
			mysqli_query($link, $query);

			// get id of the created user
			$logged_in_user_id = mysqli_insert_id($link);

			$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
			$_SESSION['success']  = "You are now logged in";
		}	header('location: index.php');				
    }

    function getUserById($id){
        global $link;
        $query = "SELECT * FROM users WHERE id=" . $id;
        $result = mysqli_query($link, $query);
    
        $user = mysqli_fetch_assoc($result);
        return $user;
    }

    function display_error() {
        global $errors;
    
        if (count($errors) > 0){
            echo '<div class="error">';
                foreach ($errors as $error){
                    echo $error .'<br>';
                }
            echo '</div>';
        }
    }
    function isLoggedIn(){
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
    }
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['user']);
        header("location: login.php");
    }
  



}

//login
function e($val){
	global $link;
	return mysqli_real_escape_string($link, trim($val));
}

if (isset($_POST['login'])) {
	login();
}

function login(){
	global $link, $email, $errors;

	// grap form values
	$username = e($_POST['email']);
	$password = e($_POST['password']);

	// make sure form is filled properly
	if (empty($email)) {
		array_push($errors, "Email is required");
	}
	if (empty($password)) {
		array_push($errors, "password is required");
	}

	// attempt login if no errors on form
	if (count($errors) == 0) {
		$password = md5($password);

		$query = "SELECT * FROM users WHERE email='$email' AND password='$password' LIMIT 1";
		$results = mysqli_query($link, $query);

		if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);
			$_SESSION['user'] = $logged_in_user;
			$_SESSION['success']  = "You are now logged in";
			header('location: index.php');
			
		}else {
			array_push($errors, "Wrong email/password combination");
		}
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




?>
