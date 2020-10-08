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
  <title>Index</title>
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
      <a class="navbar-brand" href="index.php">Home</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="viewstudent.php">View Student</a></li>
      <li><a href="viewteacher.php">View Teacher</a></li>
      <li><a href="viewcourse.php">View Courses</a></li>
      <li><a href="addcourse.php">Add Course</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="?sign=out" target="_blank"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>
<?php include '../connection.php'; ?>
<?php 
    $id = $_REQUEST['id']; 
    $str = "SELECT * from teacher WHERE id=$id";
    $result = mysqli_query($conn, $str);
    $student = mysqli_fetch_array($result);
?>
<body>
    <div class="container">
        <div>
            <h2>Edit Student</h2>
        </div>

        <div class="row">
            <div class="col-md-8">
                <form method="post" action="">
                    <div class="form-group">
                        <label for="">Student Name</label>
                        <input type="text" value="<?php echo $student['name'] ?>" class="form-control" name="name" id="">
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" value="<?php echo $student['email'] ?>" class="form-control" name="email" id="">
                    </div>

                    <div class="form-group">
                        <label for="">Roll</label>
                        <input type="text" value="<?php echo $student['roll'] ?>" class="form-control" name="roll" id="">
                    </div>

                    <div class="form-group">
                        <label for="">Date of Birth</label>
                        <input type="date" value="<?php echo $student['dob'] ?>" class="form-control" name="dob" id="">
                    </div>

                    <div class="form-group">
                        <label for="">Department</label>
                        <select class="form-control" name="department_id" id="">
                        <option value="">SELECT DEPARTMENT</option>
                            <?php 
                                $str = "SELECT id,short_code from departments";
                                $results = mysqli_query($conn, $str);
                                while($row = mysqli_fetch_array($results)) { ?>
                                    <option <?php echo ($row['id']==$student['department_id']) ? 'selected' : '' ?>   value="<?php echo $row['id'] ?>"><?php echo $row['short_code'] ?></option>
                                    <?php }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="submit" value="Update Student">

                        <a class="btn btn-danger" href="students.php">List All Students</a>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
   if(isset($_POST['submit'])) {
    // receive data from the input controls
    $name = $_POST['name'];
    $email = $_POST['email'];
    $roll = $_POST['roll'];
    $dob = $_POST['dob'];
    $department_id = $_POST['department_id'];
    $str = "UPDATE students SET name='".$name."', email='".$email."', roll='".$roll."', dob='$dob', department_id=$department_id 
    WHERE id= $student_id";
    if(mysqli_query($conn, $str)) {
        header('Location: students.php');
        // echo 'Successfully Inserted';
    }
   }

?>
</body>
</html>