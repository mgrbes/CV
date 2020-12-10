<?php

require_once "connect.php";
session_start();
if (!$_SESSION['loggedin']){
    header("location: login.php");
} 
else{
if(isset($_POST['submit'])){
$sql = mysqli_query($link, "INSERT INTO cv(user_id,age,education,hobies,work_experience,social_network,about)
VALUES ('".$SESSION["myuser_id"]."','".$_POST["age"]."','".$_POST["education"]."','".$_POST["hobies"]."','".$_POST["work_experience"]."','".$_POST["social_network"]."','".$_POST["about"]."')");
$sql1 = mysqli_query($link, "SELECT * FROM users ");

if($sql1){
    header("location: cv.php");
}else{
    header("location: makeyourowncv.php");
}
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}
mysqli_close($link);


}

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
<p>Help us by answering questions so we can make CV about you.</p>
<div id="login">

<hr/>
<form action="" method="post">

<label>Education :</label>
<input type="text" name="education" id="education" required="required" /><br/><br />
<label>Hobies :</label>
<input type="text" name="hobies" id="hobies"/><br/><br />
<label>Work experience : </label>
<input type="text" name="work_experience" id="work_experience" required="required"/><br/><br />
<label>Social network : </label>
<input type="text" name="social_network" id="social_network" required="required"/><br/><br />
<label>Birth day : </label>
<input type="text" name="birth_day" id="birth_day" required="required"/><br/><br />
<label>About : </label>
<input type="text" name="about" id="about" required="required" /><br/><br />
<input type="submit" value=" Submit " name="submit"/><br />
</form>
    
</div>

</body>
</html>