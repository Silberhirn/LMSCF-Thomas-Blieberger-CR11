<?php require_once 'actions/db_connect.php'; 
if ($_GET['id']) {
   $id = $_GET['id'];
   $sql = "select * from media join author on author.id=fk_author_id join publisher on publisher.id=fk_publisher_id WHERE ISBN = $id" ;
   $result = $connect->query($sql);

   $data = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html>
<head>
   <title>medium</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="../CSS/index.css">


</head>
<body>
	  <nav class="navbar navbar-expand-lg navbar-light bg-light">

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Media<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="publisher.php">Publisher</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="create.php">Create New</a>
      </li>
    </ul>
  </div>
</nav>

<div class="box m-5 d-flex">
<div class="col-3">
	<img src="../<?php echo $data['image'] ?>" class="m-3 w-100">
</div>
<div class="p-3">
	<h3><?php echo $data['title'] ?></h3>
	<p><b>Author/Artist/Regisseur: </b><?php echo $data['name']." ".$data['surname'] ?></p>
	<p><b>Publisher/Studio/Label: </b><?php echo $data['publisher_name'] ?></p>
	<p><b>Date of publish: </b><?php echo $data['publish_date'] ?></p>
	<p><b>Type: </b><?php echo $data['type'] ?></p>
	<p><b>Status: </b><?php echo $data['status'] ?></p>
	<p><b>Description: </b><?php echo $data['short_description'] ?></p>
	<a href="index.php"><button type="button" class='btn btn-outline-success'>Back</button ></a>
</div>
</div>
</body>
</html>
<?php } ?>