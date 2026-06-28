<?php
include'config.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="create.php" method="post">
        <input type="text" name="u_name">
        <input type="text" name="u_father">
        <input type="radio" name="u_gen" VALUE="male">male
         <input type="radio" name="u_gen" VALUE="female">female
         <input type="checbox" name="u_sub[]" VALUE="english">
          <input type="checbox" name="u_sub[]" VALUE="Math">
         <input type="checbox" name="u_sub[]" VALUE="Urdu">
         <form action="upload.php" method="POST" enctype="multipart/form-data">
         <!-- image -->
          <form action="upload.php.php" method="POST" enctype="multipart/form-data">
         <input type="file" name="image">  
          <button type="submit">Upload</button>
          </form>
           <!-- button -->
            <input type="submit" name="btn_sub">        

    </form>
    
</body>
</html>