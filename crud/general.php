<?php ob_start();
session_start();
require_once 'actions/db_connect.php'; 
if (!isset($_SESSION['user'])){
  header("Location: login.php");
  exit;
}

// select logged-in users details
$res=mysqli_query($connect, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC); ?>

<!DOCTYPE html>
<html>
<head>
   <title>index</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../CSS/index.css">

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">All Pets<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="general.php">Small & Large Pets</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="senior.php">Senior Pets</a>
      </li>
    </ul>
  </div>
            <a  href="logout.php?logout"><button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button></a>
</nav>

<div class="hero d-flex justify-content-center w-100"><p class="m-auto"><b>Your pet adoption around the corner!</b></p></div>

  <h1 class="w-100 my-5 text-center">Small Pets</h1>

            <?php
           $sql = "select id, image, name, description, TIMESTAMPDIFF(year, birthdate, current_date()) as age, type, hobbys, ZIP, city, address from pets join location on location=location_id where type='small'";
           $result = $connect->query($sql);

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                   echo  "<div class='d-flex container box my-4 p-2'>
                       <div class='col-3 img_cont d-flex justify-content-center'><img class='img-fluid w-100 h-auto rounded' src='../".$row['image']."'></div><div class='col-6'><h3>" .$row['name']."</h3><p><b>Description: </b>".$row['description']."</p><p><b>Hobbys: </b>".$row['hobbys']."</p><p><b>Age: </b>".$row['age']."</p><p><b>Address: </b>".$row['ZIP']." ".$row['city'].", ".$row['address']."</p></div></div>
                       </div>";
               }
           } else  {
               echo  "<p>No Data Avaliable</p>";
           }
            ?>

    <h1 class="w-100 my-5 text-center">Large Pets</h1>

            <?php
           $sql = "select id, image, name, description, TIMESTAMPDIFF(year, birthdate, current_date()) as age, type, hobbys, ZIP, city, address from pets join location on location=location_id where type='large'";
           $result = $connect->query($sql);

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                   echo  "<div class='d-flex container box my-4 p-2'>
                       <div class='col-3 img_cont d-flex justify-content-center'><img class='img-fluid w-100 h-auto rounded' src='../".$row['image']."'></div><div class='col-6'><h3>" .$row['name']."</h3><p><b>Description: </b>".$row['description']."</p><p><b>Hobbys: </b>".$row['hobbys']."</p><p><b>Age: </b>".$row['age']."</p><p><b>Address: </b>".$row['ZIP']." ".$row['city'].", ".$row['address']."</p></div></div>
                       </div>";
               }
           } else  {
               echo  "<p>No Data Avaliable</p>";
           }
            ?>

</body>
</html>