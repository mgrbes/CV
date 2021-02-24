<style>
<?php include 'css.css';
session_start(); ?>

</style>

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
<style>
body, html {
  height: 100%;
  margin: 0;
}

.wg {
  /* The image used */
 /* background-color:#99CCFF;*/

  /* Full height */
  height: 100%; 

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
</style>
<body>

    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav" style="background-color:#FFFFFF">
        <div class="container">
            <a class="nav-item" href="index.php">Home</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto my-2 my-lg-0">
                    
                    <li class="active"><a class="nav-link js-scroll-trigger" href="about.php">About</a></li>
					<?php
						if(isset($_SESSION["loggedin"])){
							echo '<li class="nav-item"><a class="nav-link js-scroll-trigger" href="makeyourowncv.php">CV</a>';
							echo '<li class="nav-item"><a class="nav-link js-scroll-trigger" href="logoff.php">Log off</a>';
						}else{
							echo '<li class="nav-item"><a class="nav-link js-scroll-trigger" href="login.php">Sign in</a></li>';
						}
					?>
                    
                    
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="contact.php">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

<div class="jumbotron text-center" style="background-color:#FFFFFF">
  <h1>About</h1>
  <p>
A curriculum vitae, Latin for "course of life", often shortened as CV or vita, is a written overview of someone's life's work.</p> 
</div>
  
<div class="wg">
 
		<div>
    <img class="marginauto" src="f1.jpg" alt="centered image" />
</div>
		<p class="body">
		<br>
		Hello,
	  My name is Marko Grbeš I'm from Požega,Croatia, and am currently studying at University of Osijek-Faculty of Electrical Engineering, Computer Science and Information Technologies. This is my web page that'll help you make your CV, hopefully it helped you. This is my project from Web programming course.</p>
 
        
      
    
    
  
</div>

</body>
</html>