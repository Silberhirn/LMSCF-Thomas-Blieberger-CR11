<?php 

ob_start();
session_start();
require_once 'db_connect.php'; 
if( !isset($_SESSION['admin' ]) ) {
 header("Location: login.php");
 exit;
}
// select logged-in users details
$res=mysqli_query($connect, "SELECT * FROM users WHERE userId=".$_SESSION['admin']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);

if ($_POST) {
   $id = $_POST['id'];
   $name = $_POST['name'];
   $description = $_POST['description'];
   $birthdate=$_POST['birthdate'];
   $hobbys=$_POST['hobbys'];
   $type=$_POST['type'];
   $location=$_POST['location'];
   $image=$_POST['image'];

   $sql = "UPDATE pets SET id = '$id', name = '$name', description = '$description', type = '$type', birthdate = '$birthdate', hobbys = '$hobbys', location = '$location', image = '$image' WHERE id = $id" ;

echo "<!DOCTYPE html>
<html>
<head>
   <title>update</title>
<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
</head>
<nav class='navbar navbar-expand-lg navbar-light bg-light'>

  <div class='collapse navbar-collapse' id='navbarSupportedContent'>
    <ul class='navbar-nav mr-auto'>
      <li class='nav-item'>
        <a class='nav-link' href='index.php'>All Pets<span class='sr-only'>(current)</span></a>
      </li>
      <li class='nav-item'>
        <a class='nav-link' href='general.php'>Small & Large Pets</a>
      </li>
      <li class='nav-item active'>
        <a class='nav-link' href='senior.php'>Senior Pets</a>
      </li>
    </ul>
              <a  href='logout.php?logout'><button class='btn btn-outline-success my-2 my-sm-0' type='submit'>Logout</button></a>
  </div>
</nav>";

   if($connect->query($sql) === TRUE) {
       echo  "<p class='text-center m-3'>Successfully Updated</p>";
       echo "<div class='m-auto text-center'><a href='../update.php?id=".$id."'><button type='button' class='btn btn-outline-success'>Back</button></a><a href='../index_admin.php'><button type='button' class='btn btn-outline-success'>Home</button></a></div>";
   } else {
        echo "Error while updating record : ". $connect->error;
   }

   $connect->close();

}

?>