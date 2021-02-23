<style>
<?php 

  include 'contactcss.css'; 
session_start();
  $message_sent=false;

  if(isset($_POST['email']) && $_POST['email']!= ''){
    if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
          $userName=$_POST['name'];
          $userEmail=$_POST['email'];
          $messageSubject=$_POST['subject'];
          $message=$_POST['message'];

          $to="marko.grbes1@gmail.com";
          $body="";

          $body .="From: ".$userName. "\r\n";
          $body .="Email: ".$userEmail. "\r\n";
          $body .="Message: ".$message. "\r\n";

          mail($to,$messageSubject,$body);


          $message_sent=true;
    }
  }





?>

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
<body>
  <?php 
  if($message_sent):
  ?>
        <h3>Thanks, we'll be in touch! </h3>

  <?php
  else:
    
  ?>  
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav" >
        <div class="container">
            <a class="nav-item" href="index.php">Home</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto my-2 my-lg-0">
                    
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="about.php">About</a></li>
					<?php
						if(isset($_SESSION["loggedin"])){
							echo '<li class="nav-item"><a class="nav-link js-scroll-trigger" href="makeyourowncv.php">CV</a>';
							echo '<li class="nav-item"><a class="nav-link js-scroll-trigger" href="logoff.php">Log off</a>';
						}else{
							echo '<li class="nav-item"><a class="nav-link js-scroll-trigger" href="login.php">Sign in</a></li>';
						}
					?>
                    
                    
                    <li class="active"><a class="nav-link js-scroll-trigger" href="contact.php">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>



<br><br><br>

<div class="container">
  <div style="text-align:center">
    <h2>Contact Us</h2>
    <p>Swing by for a cup of coffee, or leave us a message:</p>
  </div>
  <div class="row">
    <div class="column">
      <img src="Osijek_957.jpg" style="width:100%">
    </div>
    <div class="column">
      <form action="index.php">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Your name..">
        <label for="email">Email</label>
        <input type="text" id="email" name="email" placeholder="Your email..">
        <label for="subject">Subject</label>
        <input type="text" id="subject" name="subject" placeholder="Subject..">
        <label for="message">Message</label>
        <textarea id="message" name="message" placeholder="Write something.." style="height:170px"></textarea>
        <input type="submit" value="Submit">
      </form>
    </div>
  </div>
</div>
<?php
endif;
?>

</body>
</html>

</body>
</html>