<?php
   session_start();
   if($_SESSION['student_login_status']!="loged in" and ! isset($_SESSION['email']) )
    header("Location:../index.php");
   
   if(isset($_GET['sign']) and $_GET['sign']=="out") {
	$_SESSION['student_login_status']="loged out";
	unset($_SESSION['email']);
   header("Location:../index.php");    
   }
?>
<html lang="en">
<head>
  <title>Student Home Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="home.php">Home</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="enroll.php">Enrollment</a></li>
      <li><a href="mycourse.php">My Course</a></li>
      <li><a href="submitidea.php">Submit Idea</a></li>
      <li><a href="Viewidea.php">View Idea</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="?sign=out" target="_blank"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>
  
<main role="main" class="container">
            <div class="jumbotron text-center">
                <h1>Student Home Page</h1>
                <p class="lead text-info">Welcome</p>
            </div>
        </main>

</body>
</html>
