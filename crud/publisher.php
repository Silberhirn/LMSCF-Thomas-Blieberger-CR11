<?php ob_start();
session_start();
require_once 'actions/db_connect.php'; 
if (!isset($_SESSION['admin'])){
  header("Location: login.php");
  exit;
}

// select logged-in users details
$res=mysqli_query($connect, "SELECT * FROM users WHERE userId=".$_SESSION['admin']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC); ?>

<!DOCTYPE html>
<html>
<head>
   <title>publisher</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="../CSS/index.css">


</head>
<body>
	  <nav class="navbar navbar-expand-lg navbar-light bg-light">

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Media</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="publisher.php">Publisher</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="create.php">Create New</a>
      </li>
    </ul>
  </div>
</nav>

<div class="hero d-flex justify-content-center w-100"><p class="m-auto"><b>Your library around the corner!</b></p></div>

<h1 class="w-100 my-5 text-center">Publisher</h1>
<div class="p-4 box w-75 mx-auto my-5">
                <table class="w-100">
                    <tr>
                      <td><b>Name</b></td>
                      <td><b>Adress</b></td>
                      <td></td>
                    </tr>
  <?php 
           $sql = "select * from publisher";
           $result = $connect->query($sql);

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                   echo "<tr>
                      <td><a href='publishermedia.php?id=".$row['id']."'>".$row['publisher_name']."</a></td>
                      <td>".$row['address']."</td>
                      <td class='text-right'><a href='publishermedia.php?id=".$row['id']."'><button type='button' class='btn btn-outline-primary'>Show media</button></a></td>
                    </tr>";
                  }
                }
  ?>
</table>
</div>
</body>
</html>
