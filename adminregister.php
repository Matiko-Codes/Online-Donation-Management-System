<?php
require_once "database.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register_admin'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = password_hash($_POST['admin_password'], PASSWORD_DEFAULT);

    // Insert admin data into the database
    $query = "INSERT INTO admins (name, username, password) VALUES ('$name', '$username', '$password')";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        echo "<script>alert('Admin registered successfully.');</script>";
    } else {
        echo "<script>alert('Failed to register admin.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Add your custom styles if needed -->
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2>Admin Registration</h2>
                <form action="adminregister.php" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="admin_password" class="form-label">Admin Password</label>
                        <input type="password" class="form-control" id="admin_password" name="admin_password" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="register_admin">Register</button>
                    <a href="admindisplay.php" class="btn btn-secondary">Back to Admin Display</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
