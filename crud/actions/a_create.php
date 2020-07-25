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
?>

<!DOCTYPE html>
<html>
<head>
   <title>Add Medium</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<?php

if ($_POST) {
   $name = $_POST['name'];
   $image = $_POST['image'];
   $type=$_POST['type'];
   $description=$_POST['description'];
   $birthdate=$_POST['birthdate'];
   $hobbys=$_POST['hobbys'];
   $location=$_POST['location'];

   $sql = "INSERT INTO pets (name, image, type, description, birthdate, hobbys, location) VALUES ('$name', '$image', '$type', '$description', '$birthdate', '$hobbys', '$location')";       
   echo "<nav class='navbar navbar-expand-lg navbar-light bg-light'>

  <div class='collapse navbar-collapse' id='navbarSupportedContent'>
    <ul class='navbar-nav mr-auto'>
      <li class='nav-item'>
        <a class='nav-link' href='../index.php'>Media</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link' href='../publisher.php'>Publisher</a>
      </li>
      <li class='nav-item active'>
        <a class='nav-link' href='../create.php'>Create New<span class='sr-only'>(current)</span></a>
      </li>
    </ul>
  </div>
</nav>" ;
    if($connect->query($sql) === TRUE) {
      echo "<p class='text-center m-3'>New Record Successfully Created</p>";
       echo "<div class='m-auto text-center'><a href='../create.php'><button type='button' class='btn btn-outline-success'>Back</button></a></div>";
   } else  {
       echo "Error " . $sql . ' ' . $connect->connect_error;
   }

   $connect->close();
}

?>