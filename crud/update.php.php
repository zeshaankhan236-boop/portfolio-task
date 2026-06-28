<?php
include 'config.php';

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    // FIX: correct table name
    $select = "SELECT * FROM `kainatsaif_1` WHERE id='$id'";
    $driver = mysqli_query($conn, $select);
    $result = mysqli_fetch_assoc($driver);

    // if (!$result) {
    //     die("Record not found");
    // }

} else {
    die("Invalid ID");
}

// UPDATE
if (isset($_POST['btn_update'])) {

    $username = $_POST['u_name'];
    $father   = $_POST['u_father'];
    $gender   = $_POST['u_gen'];

    $subject = "";
    if (isset($_POST['u_sub'])) {
        $subject = implode(",", $_POST['u_sub']);
    }

    // FIX: same table as read.php
    $update = "UPDATE `kainatsaif_1`
               SET `user_name`='$username',
                   `Father name`='$father',
                   `gender`='$gender',
                   `subject`='$subject'
               WHERE id='$id'";

    $driver2 = mysqli_query($conn, $update);

    if ($driver2) {
        header("Location: read.php");
        exit();
    } else {
        die(mysqli_error($conn));
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Form</title>
</head>
<body>

<?php if ($result) { ?>

<form method="post">

    Name:
    <input type="text" name="u_name" value="<?php echo $result['user_name']; ?>">
    <br><br>

    Father Name:
    <input type="text" name="u_father" value="<?php echo $result['Father name']; ?>">
    <br><br>

    Gender:
    <input type="radio" name="u_gen" value="male"
    <?php echo ($result['gender'] == "male") ? "checked" : ""; ?>> Male

    <input type="radio" name="u_gen" value="female"
    <?php echo ($result['gender'] == "female") ? "checked" : ""; ?>> Female

    <br><br>

    <?php
    $sub = explode(",", $result['subject']);
    ?>

    Subjects:<br>

    <input type="checkbox" name="u_sub[]" value="english"
    <?php echo in_array("english", $sub) ? "checked" : ""; ?>> English

    <input type="checkbox" name="u_sub[]" value="math"
    <?php echo in_array("math", $sub) ? "checked" : ""; ?>> Math

    <input type="checkbox" name="u_sub[]" value="urdu"
    <?php echo in_array("urdu", $sub) ? "checked" : ""; ?>> Urdu

    <br><br>

    <input type="submit" name="btn_update" value="Update">

   <!-- image -->
    <?php
  move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/" . $_FILES["image"]["name"]);

  echo "<img src='uploads/" . $_FILES["image"]["name"] . "' width='200'>";
  ?>
   <!-- image end -->

</form>

<?php } else {
    echo "No data found";
} ?>

</body>
</html>