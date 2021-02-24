<?php
session_start();
include 'connect.php'

?>

<!DOCTYPE html>
<html lang="en">
   
<head >
  <title>Curriculum Vitae</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<style>
body, html {
  height: 100%;
  margin: 0;
}

.bg {
  /* The image used */
  background-image: url("grad.jpg");

  /* Full height */
  height: 100%; 
  border-radius: 5px; 
  padding: 10px;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
</style>

<body >

    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav" style="background-color:#FFFFFF">
        <div class="container" >
            <a class="nav-item"  href="index.php">Home</a>
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

<div class="jumbotron text-center" style="background-color:#FFFFFF">
  <h1>Curriculum Vitae</h1>
  <p>
A curriculum vitae, Latin for "course of life", often shortened as CV or vita, is a written overview of someone's life's work.</p> 
</div>
  
<div class="bg" >
  
        
      <div id="main">
<h1>Your CV</h1>
<p>Help us by answering questions so we can make CV about you.</p>
<div >

<hr/>
<form action="connect.php" method="post">

<label>Education :</label>
<textarea id="education" name="education" placeholder=" Educational methods include teaching, training, storytelling, discussion and directed research." 
style="width:500px"></textarea><br/><br />
<label>Hobies :</label>

<textarea id="hobies" name="hobies" placeholder="Hobbies help you to become a more well-rounded person, and eventually, they often turn into helpful life skills." 
style="width:500px"></textarea>
<br/><br />
<label>Work experience : </label>
<textarea id="work_experience" name="work_experience" placeholder="Work experience can increase you chance of getting hired significantly." 
style="width:500px"></textarea><br/><br />
<label>Social network : </label>
<textarea id="social_network" name="social_network" placeholder="You can leave your Social network profile link here." 
style="width:500px"></textarea><br/><br />
<label>Age : </label>
<input type="text" name="age" id="age" placeholder="Your age." required="required"/><br/><br />
<label>About : </label>
<textarea id="about" name="about" placeholder="Something about you." 

style="width:500px"></textarea><br/><br />

<input type="submit" value=" Submit " name="Submit" id="submit"/><input type="button" onclick= "window.location='CV.php'" class="Redirect" value="Check CV's"/>
</form>
    
</div>

</body>
</html>