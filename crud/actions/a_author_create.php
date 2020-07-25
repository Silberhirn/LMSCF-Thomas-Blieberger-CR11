<?php 

require_once 'db_connect.php';
?>

<!DOCTYPE html>
<html>
<head>
   <title>Add Author</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<?php 

if ($_POST) {
   $name = $_POST['name'];
   $surname = $_POST['surname'];


   $sql = "INSERT INTO author (name, surname) VALUES ('$name', '$surname')";       

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