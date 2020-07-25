<?php require_once 'actions/db_connect.php'; 
if ($_GET['id']) {
   $id = $_GET['id'];
   $sql = "select * from publisher WHERE id = $id" ;
   $result = $connect->query($sql);

   $data = $result->fetch_assoc();

?>

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

<h1 class="w-100 my-5 text-center"><?php echo $data['publisher_name'] ?></h1>
            <?php
           $sql = "select * from media join author on author.id=fk_author_id join publisher on publisher.id=fk_publisher_id where publisher.id=$id";
           $result = $connect->query($sql);

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                   echo  "<div class='d-flex container my-4 mx-auto p-2'>
                       <div class='col-3 img_cont d-flex justify-content-center'><img class='img-fluid h-100 w-auto rounded' src='../".$row['image']."'></div><div class='col-6'><h3>" .$row['title']."</h3><p><b>Author: </b>".$row['name']." ".$row['surname']."</p><p><b>Published: </b>".$row['publish_date']."</p></div><div class='d-flex flex-column justify-content-center'><a href='medium.php?id=".$row['ISBN']."'><button type='button' class='btn btn-outline-success w-100'>Show More</button></a></div>
                       </div>";
               }
           } else  {
               echo  "<p>No Data Avaliable</p>";
           }
            }?>
<div class="text-center"><a href="publisher.php"><button type="button" class='btn btn-outline-success m-3'>Back</button ></a></div>
</body>
</html>