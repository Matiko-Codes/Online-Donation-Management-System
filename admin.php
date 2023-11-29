<?php
session_start();
require_once "database.php";

// Check if the login form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login_admin'])) {
    $username = mysqli_real_escape_string($conn, $_POST['login_username']);
    $password = $_POST['login_password'];

    // Fetch admin data from the database
    $query = "SELECT * FROM admins WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    $admin = mysqli_fetch_assoc($result);

    if ($admin && password_verify($password, $admin['password'])) {
        $_SESSION["admin"] = $admin['id']; // Set the correct admin session variable
        header("Location: admindisplay.php");
        exit();
    } else {
        echo "<script>alert('Invalid username or password.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Add your custom styles if needed -->
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2>Admin Login</h2>
                <form action="admin.php" method="post">
                    <div class="mb-3">
                        <label for="login_username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="login_username" name="login_username" required>
                    </div>
                    <div class="mb-3">
                        <label for="login_password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="login_password" name="login_password" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="login_admin">Login</button>
                </form>
                <a href="login.php" class="btn btn-secondary mt-3">Back to Login</a>
            </div>
        </div>
    </div>
</body>

</html>
