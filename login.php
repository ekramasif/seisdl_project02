<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Login</title>
</head>
<body>
        <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
            <a class="navbar-brand" href="index.php">Home</a>
            </div>
            <ul class="nav navbar-nav">
            <li><a href="#">About Us</a></li>
            <li><a href="#">Contuct Us</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            <li><a href="signup.php" target="_blank"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            </ul>
        </div>
        </nav>
    <div class="form_wrapper">
        <div class="form_container">
        <div class="title_container">
            <h2>Login</h2>
        </div>
        <div class="row clearfix">
            <div class="">
            <form  action="login.php" method="POST">
        <div class="row clearfix">
            <div class="col_half">
                <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
                    <input type="email" name="email" placeholder="Email" required />
                </div>
                </div>
        <div class="col_half">
            <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                <input type="password" name="password" placeholder="Password" required />
            </div>
        </div>
    </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Login">
            </form>
            </div>
        </div>
        </div>
    </div>
</body>
</html>

<?php
include("connection.php");
if(isset($_POST['submit']))
{
	$email=$_POST['email'];
	$password=MD5($_POST['password']);

	$q="select email, password from admin where email='$email' and password='$password'";
    $q1="select email, password from  student where email='$email' and password='$password'";
    $q2="select email, password from  teacher where email='$email' and password='$password'";
            $r=mysqli_query($conn,$q);
            $r1=mysqli_query($conn,$q1);
            $r2=mysqli_query($conn,$q2);
            if(mysqli_num_rows($r)>0)
            {
                $_SESSION['email']=$email;
                $_SESSION['admin_login_status']="loged in";
                header("Location:admin/home.php");
            }
            
            else if(mysqli_num_rows($r1)>0)
            {
                $_SESSION['email']=$email;
                $_SESSION['student_login_status']="loged in";
                header("Location:student/home.php");
            }

            else if(mysqli_num_rows($r2)>0)
            {
                $_SESSION['email']=$email;
                $_SESSION['teacher_login_status']="loged in";
                header("Location:teacher/home.php");
            }
            else
            {
                echo "<b><p style='color: red;'>Incorrect Email or Password</p></b>";
            }
	
}
?>