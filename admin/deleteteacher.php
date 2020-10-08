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
<?php 
    include '../connection.php';
    $id = $_REQUEST['id']; //receive studentid from query parameter
    $str = "DELETE FROM teacher where id=$id";
    if(mysqli_query($conn, $str)) {
        header('Location: viewstudent.php');
    }

?>