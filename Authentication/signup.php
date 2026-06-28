<?php
include 'config.php';
$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST['u_name'];
    $email = $_POST['u_email'];
    $password = $_POST['u_pass'];
    $user_c = $_POST['u_confirm'];

    if ($password != $user_c) {
        $error = "password do not match";
    }
    elseif (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `authentication_2` WHERE email='$email'")) > 0) {
        $error = "email already exists";
    }
    else {
        $insert = "INSERT INTO `authentication_2`(`user_name`, `email`, `password`) VALUES ('$username','$email','$password')";
        $run = mysqli_query($conn, $insert);

        if ($run) {
            header('location:signup.php');
            exit();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f7fa;
        }

        .register-card {
            max-width: 500px;
            margin: 60px auto;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        .error {
            color: #dc3545;
            font-size: 14px;
        }
    </style>
</head>
<body>
<?php
if($error){
 echo '<div class="alert alert-info" role="alert">'
   .$error.
'</div>';
}

?>

<div class="container">
    <div class="card register-card p-4">
        <h2 class="text-center mb-4">Register</h2>

        <form id="registerForm" method="post" action="#">

            <!-- Username -->
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input
                    type="text"
                    class="form-control"
                    id="username"
                    name="u_name"
                    placeholder="Enter username">
                <div class="error" id="usernameError"></div>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input
                    type="email"
                    class="form-control"
                    id="email"
                    name="u_email"
                    placeholder="Enter email">
                <div class="error" id="emailError"></div>
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input
                    type="password"
                    class="form-control"
                    id="password"
                    name="u_pass"
                    placeholder="Enter password">
                <div class="error" id="passwordError"></div>
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <input
                    type="password"
                    class="form-control"
                    id="confirmPassword"
                    name="u_confirm"
                    placeholder="Confirm password">
                <div class="error" id="confirmPasswordError"></div>
            </div>

            <!-- Show Password -->
            <div class="form-check mb-3">
                <input
                    class="form-check-input"
                    type="checkbox"
                    id="showPassword">
                <label class="form-check-label" for="showPassword">
                    Show Passwords
                </label>
            </div>

            <button type="submit" class="btn btn-success w-100">
                Register
            </button>

            <div id="successMessage" class="text-success text-center mt-3"></div>

        </form>
    </div>
</div>
</body>
</html>