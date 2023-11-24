<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Report</title>
    <link rel="stylesheet" href="css/donationreport.css">
</head>

<body>

<?php
require 'database.php';

// Fetch all donations
$query = "SELECT * FROM donations";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<h2>Donation Report</h2>";
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Donation Type</th>
                <th>Address</th>
                <th>Message</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['mobile']}</td>
                <td>{$row['donation_type']}</td>
                <td>{$row['address']}</td>
                <td>{$row['message']}</td>
            </tr>";
    }

    echo "</table>";
    echo "<button onclick='printReport()'>Print Report</button>";
} else {
    echo "No donation records found";
}

mysqli_close($conn);
?>

<script>
    function printReport() {
        window.print();
    }
</script>

</body>

</html>
