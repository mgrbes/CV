<?php
session_start();
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'user');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

?>

<!DOCTYPE html>
<html lang="en">
   
<head>
  <title>Curriculum Vitae</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav" >
        <div class="container">
            <a class="nav-item" href="index.php">Home</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto my-2 my-lg-0">
                    
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="about.php">About</a></li>
					<?php
						if(isset($_SESSION["loggedin"])){
							echo '<li class="active"><a class="nav-link js-scroll-trigger" href="makeyourowncv.php">CV</a>';
							echo '<li class="nav-item"><a class="nav-link js-scroll-trigger" href="logoff.php">Log off</a></li>';
						}else{
							echo '<li class="nav-item"><a class="nav-link js-scroll-trigger" href="login.php">Sign in</a></li>';
						}
					?>
                    </li>
                    
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="contact.php">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

<div class="jumbotron text-center">
  <h1>Curriculum Vitae</h1>
  <p>
A curriculum vitae, Latin for "course of life", often shortened as CV or vita, is a written overview of someone's life's work.</p> 
</div>
  
<div class="container">
  
        
      <div id="main">
<h1>Your CV</h1>
<p>Here we made CV about information you gave to us.</p>
<div id="login">

<hr/>
<form action="" method="post">

<label>Name :</label>
<?php 
/*
$sql="SELECT * FROM users WHERE id='".$_SESSION['id']."'";
$result=mysqli_query($link,$sql);
$resultCheck=mysqli_num_rows($result);

if($resultCheck>0){
    while($row=mysqli_fetch_assoc($result)){
        echo $row['firstName'] . "<br>";
    }
}*/
?>
<label>Last Name :</label>

<label>Email :</label>

<label>Gender :</label>

<label>Number :</label>

<label>Hobies :</label>

<label>Age :</label>

<label>Education :</label>

<label>Work experience : </label>

<label>Social network : </label>

<label>Birth day : </label>

<label>About : </label>

</form>
    
</div>

</body>
</html>