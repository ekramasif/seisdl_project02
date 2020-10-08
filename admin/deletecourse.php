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
    $name = $_REQUEST['title']; //receive studentid from query parameter
    $str = "DELETE FROM course where title =$name";
    if(mysqli_query($conn, $str)) {
        header('Location: viewstudent.php');
    }

?>