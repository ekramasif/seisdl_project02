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
    <title>Student Registration</title>
</head>
<body>
    <nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
        <a class="navbar-brand" href="index.php">Project Ideas</a>
        </div>
        <ul class="nav navbar-nav">
        <li><a href="#">About Us</a></li>
        <li><a href="#">Contuct Us</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
        <li><a href="login.php" target="_blank"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
    </div>
    </nav>
    <div class="form_wrapper">
        <div class="form_container">
          <div class="title_container">
            <h2>Student Sign Up</h2>
          </div>
          <div class="">
            <div class="">
              <form action="" method="POST">
                <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                    <input type="text" name="name" placeholder="Name" />
                </div>
                <div class="input_field"> <span><i aria-hidden="true" class="fa fa-pencil"></i></span>
                    <input type="text" name="id" placeholder="ID" required/>
                </div>
                <div class="input_field"> <span><i aria-hidden="true" class="fa fa-book"></i></span>
                    <input type="text" name="department" placeholder="Department" />
                </div>
                <div class="input_field"> <span><i aria-hidden="true" class="fa fa-book"></i></span>
                    <input type="text" name="semester" placeholder="Semester" />
                </div>
                <div class="input_field"> <span><i aria-hidden="true" class="fa fa-home"></i></span>
                    <input type="text" name="address" placeholder="Address" />
                </div>
                <div class="input_field"> <span><i aria-hidden="true" class="fa fa-phone"></i></span>
                    <input type="text" name="phone" placeholder="Phone" />
                </div>  
                <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
                    <input type="email" name="email" placeholder="Email" required />
                </div>
                <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                    <input type="password" name="password" placeholder="Password" required />
                </div>
                <input type="submit" name="submit" class="btn btn-primary" value="Register">
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
	// to receive value from the input fields
    $name=$_POST['name'];
    $id=$_POST['id'];
    $semester=$_POST['semester'];
    $department=$_POST['department'];
    $address=$_POST['address'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $password=MD5($_POST['password']);
   
    $q="insert into student values('$name','$id','$department','$semester','$address','$phone','$email','$password')";
         
	if(mysqli_query($conn,$q))
	{
		echo "Successfully Register";
	
    }
	else
	{
		echo "error".mysqli_error($conn);
	}
}
?>