<?php


session_start();
if(($_SESSION["loggedin"])){ 
  echo $_SESSION["login_user"]; 
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
<style>
body, html {
  height: 100%;
  margin: 0;
}

.bg {
  /* The image used */
  background-image: url("ivan1.jpg");

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
                    
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="about.php">About</a></li>
					<?php
						if(isset($_SESSION["loggedin"])){
							echo '<li class="nav-item"><a class="nav-link js-scroll-trigger" href="makeyourowncv.php">CV</a></li>';
							echo '<li class="nav-item"><a class="nav-link js-scroll-trigger" href="logoff.php">Log off</a></li>';
							
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
  <h1>Curriculum Vitae</h1>
  <p>
A curriculum vitae, Latin for "course of life", often shortened as CV or vita, is a written overview of someone's life's work.</p> 
</div>
  
<div class="bg" >
  <div1 class="row" >
    
    <div1 class="col-sm-4">
        
      <h3>&emsp;&emsp;&emsp;&emsp;&emsp;Easy to make</h3>
      <p>&emsp;&emsp;&emsp;This web page helps you make your own CV in just a couple &emsp;&emsp;&emsp;of minute of work.</p>
      <p>&emsp;&emsp;&emsp;Making CV helps you find a new job, your employer will &emsp;&emsp;&emsp;definitely like variety of your choice.</p>
    </div1>
    
  </div1>
</div>

</body>
</html>