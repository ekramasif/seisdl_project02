<?php
   session_start();
   if($_SESSION['admin_login_status']!="loged in" and ! isset($_SESSION['email']) )
    header("Location:../index.php");
   
   if(isset($_GET['sign']) and $_GET['sign']=="out") {
	$_SESSION['admin_login_status']="loged out";
	unset($_SESSION['email']);
   header("Location:../index.php");    
   }
?>
<html lang="en">
<head>
  <title>Add Course</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<style>
   fieldset.custom-border {
      border: 1px groove #ddd !important;
      padding: 0 1.4em 1.4em 1.4em !important;
      margin: 0 0 1.5em 0 !important;
      -webkit-box-shadow: 0px 0px 0px 0px #000;
      box-shadow: 0px 0px 0px 0px #000;
   }
   legend.custom-border {
      width: auto;
      padding: 0 10px;
      border-bottom: none;
   }
</style>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="home.php">Home</a>
    </div>
    <ul class="nav navbar-nav">
    <li><a href="viewstudent.php">View Student</a></li>
      <li><a href="viewteacher.php">View Teacher</a></li>
      <li><a href="viewcourse.php">View Courses</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="?sign=out" target="_blank"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>
<div class="container">
   <div class="col-md-6">
      <form class="form-horizontal form-label-left" action="" method="POST"> 
         <fieldset class="custom-border">
            <legend class="custom-border">Add course</legend>
               <div class="form-group">
                  <div class="col-md-12">
                     <label>Course Title</label>
                  </div>
                  <div class="col-md-12">
                     <input type="text" name="title" class="form-control">
                  </div>
               </div>
                  <div class="form-group">
                     <div class="col-md-12">
                        <label>Course Code</label>
                     </div>
                  <div class="col-md-12">
                     <input type="text" name="code" class="form-control">
                  </div>
               </div>
               <div class="form-group">
                  <div class="col-md-12">
                     <label>Course Credit</label>
                  </div>
                  <div class="col-md-12">
                     <input type="text" name="credit" class="form-control">
                  </div>
               </div>
               <input type="submit" name="submit" class="btn btn-primary" value="Add Course">
            </fieldset>
         </form>
   </div>
</div>
</body>
</html>

<?php
include("../connection.php");
if(isset($_POST['submit'])) 
{
	// to receive value from the input fields
    $title=$_POST['title'];
    $code=$_POST['code'];
    $credit=$_POST['credit'];

    $q="insert into course values('$title','$code','$credit')";
         
	if(mysqli_query($conn,$q))
	{
		echo "Successfully Added";
	
    }
	else
	{
		echo "error".mysqli_error($conn);
	}
}
?>