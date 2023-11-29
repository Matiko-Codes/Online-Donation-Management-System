<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Report</title>
    <link rel="stylesheet" href="css/userreport.css">
</head>

<body>
<?php
require 'database.php';

// Fetch all user registrations
$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);

// Check if there are any registrations
if (mysqli_num_rows($result) > 0) {
    echo "<div class='container'>";
    echo "<h2>User Registration Report</h2>";
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
            </tr>";

    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['full_name']}</td>
                <td>{$row['email']}</td>
            </tr>";
    }

    echo "</table>";

    // Add a button to print the report
    echo "<form action='' method='post'>
            <button type='submit' name='printBtn'>Print Report</button>
          </form>";

    // Handle the print button action
    if (isset($_POST['printBtn'])) {
        // Add any specific logic for printing here
        echo "<script>window.print();</script>";
    }

    // Add a back button
    echo "<a href='admindisplay.php' class='back-button'>Back</a>";

    echo "</div>";
} else {
    echo "No user registrations found";
}

mysqli_close($conn);
?>
</body>

</html>
