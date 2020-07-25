<?php 
ob_start();
session_start();
require_once 'actions/db_connect.php';
if( !isset($_SESSION['admin' ]) ) {
 header("Location: login.php");
 exit;
}
// select logged-in users details
$res=mysqli_query($connect, "SELECT * FROM admin WHERE userId=".$_SESSION['admin']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);

if ($_GET['id']) {
   $id = $_GET['id'];

   $sql = "SELECT * FROM pets WHERE id = $id" ;
   $result = $connect->query($sql);
   $data = $result->fetch_assoc();

   $connect->close();
?>

<!DOCTYPE html>
<html>
<head>
   <title >Delete pet</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">All Pets<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="general.php">Small & Large Pets</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="senior.php">Senior Pets</a>
      </li>
    </ul>
              <a  href="logout.php?logout"><button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button></a>
  </div>
</nav>

<h3 class="text-center m-3">Do you really want to delete this pet?</h3>
<p class="text-center"><?php echo $data['name'] ?></p>
<form action ="actions/a_delete.php" method="post" class="d-flex justify-content-center">

   <input type="hidden" name= "id" value="<?php echo $data['id'] ?>" />
   <button type="submit" class='btn btn-outline-danger'>Yes, delete it!</button >
   <a href="index_admin.php"><button type="button" class='btn btn-outline-success'>No, go back!</button ></a>
</form>

</body>
</html>

<?php
}
?>