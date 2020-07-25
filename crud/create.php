<?php ob_start();
session_start();
require_once 'actions/db_connect.php'; 
if( !isset($_SESSION['admin' ]) ) {
 header("Location: login.php");
 exit;
}
// select logged-in users details
$res=mysqli_query($connect, "SELECT * FROM users WHERE userId=".$_SESSION['admin']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC); ?>

<!DOCTYPE html>
<html>
<head>
   <title>add pet</title>

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
      <li class="nav-item active">
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

<fieldset>
   <legend>New pet</legend>

   <form  action="actions/a_create.php" method= "post">
       <table cellspacing= "0" cellpadding="0">  
           <tr>
               <th>Name</th>
               <td><input  type="text" name= "name" placeholder="name"></td>
           </tr>
           <tr>
               <th>Image</th>
               <td><input type="text"  name="image" placeholder ="image (path)"></td>
           </tr>
           <tr>
               <th>Size</th>
               <td>
                 <select name="type">
                    <option value="small">small</option>
                    <option value="large">large</option>
                  </select>
               </td>
             </tr>           

          <tr>
            <th>Date of Birth</th>
            <td><input type="text"  name="birthdate" placeholder ="birthdate" /></td>
          </tr>

            <tr>
              <th>Location</th>
              <td>
                 <select name="location">
                    <?php
                      $sql="select * from location";
                      $result = $connect->query($sql);
                      if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                   echo "<option value='".$row['location_id']."'>".$row['ZIP']." ".$row['city'].", ".$row['address']."</option>";
               }
           }
                    ?>
                  </select>
               </td>
           </tr>
           <tr>
            <th>Description</th>
            <td><textarea name="description" placeholder="description" rows=6 cols=70></textarea></td>
          </tr>
          <tr>
            <th>Hobbys</th>
            <td><textarea name="hobbys" placeholder="hobbys" rows=6 cols=70></textarea></td>
          </tr>
           <tr>
               <th><button type ="submit" class='btn btn-outline-success'>Insert pet</button></td>
           </tr>
       </table>
   </form>
</fieldset>
<hr>



</body>
</html>