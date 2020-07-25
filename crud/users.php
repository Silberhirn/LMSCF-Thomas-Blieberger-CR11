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
      echo "<li class='nav-item active'>
        <a class='nav-link' href='users.php'>Show Users</a>
      </li>";}
        ?>
    </ul>
          <a  href="logout.php?logout"><button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button></a>
  </div>
</nav>>
</nav>

<div class="hero d-flex justify-content-center w-100"><p class="m-auto"><b>Your petshop around the corner!</b></p></div>

<h1 class="w-100 my-5 text-center">Users</h1>
<div class="p-4 box w-75 mx-auto my-5">
                <table class="w-100">
                    <tr>
                      <td><b>Name</b></td>
                      <td><b>Email</b></td>
                      <td><b>Admin</b></td>
                      <td><b>Super</b></td>
                      <td></td>
                    </tr>
  <?php 
           $sql = "select * from users";
           $result = $connect->query($sql);

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                   echo "<tr>
                   <form action='actions/user_delete.php'  method='post'>
                      <td>".$row['userName']."</a></td>
                      <td>".$row['userEmail']."</td>
                      <td>".$row['admin']."</td>
                      <td>".$row['super']."</td>
                      <td class='text-right'><input type= 'hidden' name= 'id' value= '".$row['userId']."' /><button type='submit' class='btn btn-outline-danger'>Delete</button></a></td>
                      </form>
                    </tr>";
                  }
                }
  ?>
</table>
</div>
</body>
</html>
