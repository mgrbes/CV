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
<style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
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
<p>Here you can look at all CV's at this page.</p>
<div id="login">

<hr/>
<form action="" method="post">

<table>
<tr>
<th>Name</th>
<th>Last name</th>
<th>Email</th>

</tr>
<?php

// Check connection
if ($link->connect_error) {
die("Connection failed: " . $link->connect_error);
}
$sql = "SELECT * FROM users";
$result = $link->query($sql);

if ($result->num_rows > 0 ) {
// output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr> <td>" . $row["firstName"]. "</td> <td>" . $row["lastName"] . "</td> <td>"
    . $row["email"]. "</td> </tr>";}
    }


?>
</table>

<table>
<tr>
<th>Education</th>
<th>Hobies</th>
<th>Work experience</th>
<th>Social network</th>
<th>Age</th>
<th>About</th>

</tr>
<?php

// Check connection
if ($link->connect_error) {
die("Connection failed: " . $link->connect_error);
}
$sql = "SELECT * FROM cvu";
$result = $link->query($sql);

if ($result->num_rows > 0 ) {
// output data of each row
    while($row1 = $result->fetch_assoc()) {
        echo "<tr> <td>"  . $row1["education"]. "</td> <td>" . $row1["hobies"] . "</td> <td>"
    . $row1["work_experience"]. "</td> <td>" . $row1["social_network"] . "</td> <td>" . $row1["age"] . "</td> <td>" . $row1["about"] . "</td> </tr>";
    }
}
$link->close();
?>
</table>

<input type="button" onclick= "window.location='makeyourowncv.php'" class="Redirect" value="Go back"/>
</form>
    
</div>

</body>
</html>