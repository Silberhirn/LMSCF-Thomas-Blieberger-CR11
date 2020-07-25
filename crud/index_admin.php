<?php ob_start();
session_start();
require_once 'actions/db_connect.php'; 
if( !isset($_SESSION['admin' ]) ) {
 header("Location: login.php");
 exit;
}
// select logged-in users details
$res=mysqli_query($connect, "SELECT * FROM users WHERE userId=".$_SESSION['admin']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
?>

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
      <li class="nav-item active">
        <a class="nav-link" href="index_admin.php">All Pets<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="general_admin.php">Small & Large Pets</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="senior_admin.php">Senior Pets</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="create.php">Insert New Pet</a>
      </li>
       <?php if ($userRow['super']=="true"){
      echo "<li class='nav-item'>
        <a class='nav-link' href='users.php'>Show Users</a>
      </li>";}
        ?>
    </ul>
          <a  href="logout.php?logout"><button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button></a>
  </div>
</nav>

<div class="hero d-flex justify-content-center w-100"><p class="m-auto"><b>Your pet adoption around the corner!</b></p></div>

  <h1 class="w-100 my-5 text-center">Pets</h1>

            <?php
           $sql = "select id, image, name, description, TIMESTAMPDIFF(year, birthdate, current_date()) as age, type, hobbys, ZIP, city, address from pets join location on location=location_id";
           $result = $connect->query($sql);

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                   echo  "<div class='d-flex container box my-4 p-2'>
                       <div class='col-3 img_cont d-flex justify-content-center'><img class='img-fluid w-100 h-auto rounded' src='../".$row['image']."'></div><div class='col-6'><h3>" .$row['name']."</h3><p><b>Description: </b>".$row['description']."</p><p><b>Hobbys: </b>".$row['hobbys']."</p><p><b>Age: </b>".$row['age']."</p><p><b>Address: </b>".$row['ZIP']." ".$row['city'].", ".$row['address']."</p></div><div class='d-flex flex-column justify-content-center'><a href='update.php?id=".$row['id']."'><button type='button' class='btn btn-outline-warning w-100'>Edit</button></a><a href='delete.php?id=" .$row['id']."'><button type='button' class='btn btn-outline-danger w-100'>Delete</button></a></div></div>
                       </div>";
               }
           } else  {
               echo  "<p>No Data Avaliable</p>";
           }
           ob_end_flush();  ?>

  
</body>
</html>