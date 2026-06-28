<?php
include 'config.php';
session_start();

$error = "";
$success = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['u_email'];
    $pass  = $_POST['u_pass'];

    $select = "SELECT * FROM `authentication_2` WHERE email='$email'";
    $run = mysqli_query($conn, $select);

    // check
    if (mysqli_num_rows($run) > 0) {

        $user = mysqli_fetch_assoc($run);

        if ($pass == $user['password']) {
            $_SESSION['user_id'] = $user['id'];
             $_SESSION['user_name'] = $user['user_name'];

            header('Location:dashboard.php');
            exit();

        } else {
            $error = "invalid data";
        }

    } else {
        $error = "Email is not founded";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .form-container {
            max-width: 450px;
            margin: 80px auto;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .error {
            color: red;
            font-size: 14px;
        }
    </style>
</head>
<body>
<?php
if($error){
 echo '<div class="alert alert-danger" role="alert">'
   .$error.
'</div>';
}
if($success){
 echo '<div class="alert alert-success" role="alert">'
   .$success.
'</div>';
}
?>
<div class="container">
    <div class="form-container">
        <div class="card p-4">
            <h3 class="text-center mb-4">Login</h3>

            <form id="registerForm" action="login.php" method="post">

                <!-- Password -->
                <div class="mb-3">
                    <label for="email" class="form-label">
                        Email
                    </label>
                    <input
                        type="email"
                        class="form-control"
                        id="password"
                        name="u_email"
                        placeholder="Enter email"
                    >
                    <div id="passwordError" class="error"></div>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="confirmPassword" class="form-label">
                     Password
                    </label>
                    <input
                        type="password"
                        class="form-control"
                        id="confirmPassword"
                        placeholder="Password"
                        name="u_pass"
                    >
                    <div id="confirmPasswordError" class="error"></div>
                </div>

                <!-- Show Password -->
                <div class="form-check mb-3">
                    <input
                        class="form-check-input"
                        type="checkbox"
                        id="showPassword"
                    >
                    <label class="form-check-label" for="showPassword">
                        Show Password
                    </label>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    Register
                </button>

                <div id="successMessage" class="text-success text-center mt-3"></div>

            </form>
        </div>
    </div>
</div>

</body>
</html>