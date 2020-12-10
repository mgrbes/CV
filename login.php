<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'user');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myemail = mysqli_real_escape_string($db,$_POST['Email']);
      $mypassword = mysqli_real_escape_string($db,$_POST['Password']);
	  $myuser_id = mysqli_real_escape_string($db,$_POST['user_id']);	
      
      
      $sql = "SELECT id FROM users WHERE email = '$myemail' and password = '$mypassword'";
      
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myemail and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['loggedin'] = true;
         $_SESSION['login_user'] = $myemail;
         
         
         header("location: index.php");
      }else {
         echo  "Your Email or Password is invalid";
      }
   }
?>
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
							echo '<li class="nav-item"><a class="nav-link js-scroll-trigger" href="makeyourowncv.php">CV</a></li>';
							echo '<li class="nav-item"><a class="nav-link js-scroll-trigger" href="logoff.php">Log off</a></li>';
						}else{
							echo '<li class="active"><a class="nav-link js-scroll-trigger" href="login.php">Sign in</a></li>';
						}
					?>
                    
                    
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
  <div1 class="row">
    
    <div1 class="col-sm-4">
        
      <div id="main">
        <h1>Login</h1>
        <div id="login">
        <hr/>
			<form action="" method="post">
            <label>Email :</label>
			<input type="text" name="Email" placeholder="Email" id="Email" required="required"	/><br/><br />	 
            <label>Password :</label>	
            <input type="password" name="Password" placeholder="Password" id="Password" required = "required" /><br/><br />
            <input type="submit" value="Login">
			</form>
			<p>
            Don't have an account ? <a href="register.php">Sign up</a>
        </p>
		</div>
    </div>
    </div1>
    
  </div1>
</div>

</body>
</html>