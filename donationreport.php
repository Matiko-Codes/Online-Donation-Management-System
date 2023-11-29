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
    echo "<div class='donation-report-container'>";
    echo "<h2>Donation Report</h2>";
    echo "<table class='donation-table'>
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

    // Display the percentage section
    echo "<div class='percentage-section'>";
    echo "<h3>Percentage of Each Donation</h3>";

    $totalCount = mysqli_num_rows($result);

    // Reset the result set to the beginning
    mysqli_data_seek($result, 0);

    while ($row = mysqli_fetch_assoc($result)) {
        $percentage = ($totalCount > 0) ? (1 / $totalCount) * 100 : 0;
        echo "<p>{$row['donation_type']}: {$percentage}%</p>";
    }

    echo "</div>";

    echo "<button class='print-button' onclick='printReport()'>Print Report</button>";
    echo "<a href='admindisplay.php' class='back-button'>Back</a>";
    echo "</div>";
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
