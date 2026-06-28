<?php
include "config.php";

if(isset($_POST['btn_sub'])){
    $username = $_POST['u_name'];
    $fname = $_POST['u_father'];
    $gender = $_POST['u_gen'];
    $sub = $_POST['u_sub'];
    $subject = implode(", " , $sub);

    $insert = "INSERT INTO `kainatsaif_1`( `user_name`, `Father name`, `subject`, `gender`) VALUES ('$username','$fname','$subject','$gender')";

    $run = mysqli_query($conn,$insert);

    if($run){
        // echo "data inserted";
     header('location:read.php');
    }
   
    
}

?>