<?php
session_start();
require 'database.php';

// Check if the admin is not logged in, redirect to admin.php
if (!isset($_SESSION["admin"])) {
    header("Location: admin.php");
    exit();
}

// Check if the logout form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout_admin'])) {
    session_destroy();
    header("Location: admin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Admin CRUD Site</title>
</head>

<body>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>User Details
                            <a href="register.php" class="btn btn-primary float-end">Add User</a>
                            <a href="donationreport.php" class="btn btn-success float-end">Generate Report</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <!-- Removed the Password column -->
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT id, full_name, email FROM users";
                                $query_run = mysqli_query($conn, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $register) {
                                ?>
                                        <tr>
                                            <td><?= $register['id']; ?></td>
                                            <td><?= $register['full_name']; ?></td>
                                            <td><?= $register['email']; ?></td>
                                            <td>
                                                <a href="userreport.php?id=<?= $register['id']; ?>" class="btn btn-info btn-sm">View</a>
                                                <a href="useredit.php?id=<?= $register['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                <form action="code.php" method="POST" class="d-inline">
                                                    <button type="submit" name="delete_user" value="<?= $register['id']; ?>" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    echo "<h5> No Record Found </h5>";
                                }
                                ?>
                            </tbody>
                        </table>

                    </div>
                    <div class="card-footer">
                        <form action="admin.php" method="post">
                            <button type="submit" class="btn btn-danger float-end" name="logout_admin">Logout</button>
                        </form>
                        <a href="adminregister.php" class="btn btn-primary float-end">Register Admin</a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>