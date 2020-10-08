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
  <title>Courses</title>
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
        .modal{
            color: black;
        }
        b{
            color: red;
        }

    </style>
    <title>All Course</title>
</head>
<body>  
<?php include '../connection.php'; ?>
<!-- nav bar -->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="home.php">Home</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="viewteacher.php">View Teacher</a></li>
      <li><a href="viewcourse.php">View Student</a></li>
      <li><a href="addcourse.php">Add Course</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="?sign=out" target="_blank"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>

<!-- main -->
<div class="container" style="margin-top:80px">
<div>
   <h1 align="center">List all Courses</h1>
</div>
<div class = "col-md-12">
   <table  class="table table-dark table-striped">
      <thead>
         <th>Course Title</th>
         <th>Course Code</th>
         <th>Credit</th>
      </thead>
      <tbody>
         <?php
               
               $query = "SELECT * FROM course";
               $sql = mysqli_query($conn, $query);
               while($row = mysqli_fetch_array($sql))
               { ?>
                  <tr>
                     <td> <?php echo $row['title'] ?>  </td>
                     <td> <?php echo $row['code'] ?>  </td>
                     <td> <?php echo $row['credit'] ?>  </td>
                     <td>
                        <a class="btn btn-primary" href="editcourse.php?id=<?php echo $row['code']?> ">Edit</a>
                        <a class="btn btn-danger" data-toggle="modal" data-target="#myModal<?php echo $row['code']?>">Delete</a>
                        <div class="modal" id="myModal<?php echo $row['code']?>">
                           <div class="modal-dialog">
                              <div class="modal-content">
                              
                                 <div class="modal-header">
                                    <h4 class="modal-title">Confirmation!!</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                 </div>
                           
                                 <div class="modal-body">
                                    Are you sure to delete <i><b><?php echo $row['title'] ?></b></i> ?
                                 </div>
                           
                                 <div class="modal-footer">
                                    <a class="btn btn-success" href="deletecourse.php?id=<?php echo $row['code']?> ">Delete</a>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                 </div>
                                    
                              </div>
                           </div>
                        </div>
                     </td>
                  </tr>
               <?php
               }
         ?>
      </tbody>
   </table>
</div>
</div>    

</body>
</html>
