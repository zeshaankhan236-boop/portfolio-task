<?php 
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>student form</h2>
             
  <table class="table table-dark">
    <thead>
      <tr>
        <th>id</th>
        <th>user_name</th>
        <th>father_name</th>
        <th>gender</th>
        <th>subject</th>
        <th>Action</th>
       



      </tr>
    </thead>
    <tbody>
      <?php
      
     $select= "SELECT * FROM `kainatsaif_1` WHERE 1";
    $driver= mysqli_query($conn,$select);
      if(mysqli_num_rows($driver)>0){

        while( $row= mysqli_fetch_assoc($driver)){
            echo '<tr>';
            echo '<td>' . $row ['id'] .'</td>';
            echo '<td>' . $row ['user_name'] .'</td>';
            echo '<td>' . $row ['Father name'] .'</td>';
            echo '<td>' . $row ['gender'] .'</td>';
            echo '<td>' . $row ['subject'] .'</td>';
           echo '<td><a href="update.php.php?id=' . $row['id'] . '">Update</a></td>';
      //      <?php
      //    $files = scandir("uploads/");

      //   foreach($files as $file){

      //  if($file != "." && $file != "..") {
      //   echo "<img src='uploads/$file' width='150'><br>";
      
      //  }
      //  }
      //  
         
            echo '</tr>';
        }
      }
      else{
        echo "is not connected";
      }
      ?>
     
      
    </tbody>
  </table>
</div>

</body>
</html>
