<?php 

ob_start();
session_start();
require_once 'db_connect.php'; 
if( !isset($_SESSION['admin' ]) ) {
 header("Location: login.php");
 exit;
}
// select logged-in users details
$res=mysqli_query($connect, "SELECT * FROM admin WHERE userId=".$_SESSION['admin']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);

if ($_POST) {
   $id = $_POST['id'];

   $sql = "DELETE FROM pets WHERE id = $id";

     echo "<!DOCTYPE html>
<html>
<head>
   <title>delete</title>
<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
</head>
<nav class='navbar navbar-expand-lg navbar-light bg-light'>

  <div class='collapse navbar-collapse' id='navbarSupportedContent'>
    <ul class='navbar-nav mr-auto'>
      <li class='nav-item active'>
        <a class='nav-link' href='../index.php'>Media</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link' href='../publisher.php'>Publisher</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link' href='../create.php'>Create New</a>
      </li>
    </ul>
  </div>
</nav>";
    if($connect->query($sql) === TRUE) {
       echo "<p class='text-center m-3'>Successfully deleted!!</p>" ;
       echo "<div class='m-auto text-center'><a href='../index_admin.php'><button type='button' class='btn btn-outline-success'>Back</button></a></div>";
   } else {
       echo "Error updating record : " . $connect->error;
   }

   $connect->close();
}

?>