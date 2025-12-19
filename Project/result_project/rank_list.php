<?php
session_start();
if (!isset($_SESSION['roll_no'])) {
    header("Location: index.html");
    exit;
}

include "db_connect.php";

// Fetch ranking list
$q = "SELECT roll_no, name, category, air, percentile, total_marks 
      FROM students 
      WHERE air IS NOT NULL 
      ORDER BY air ASC";

$r = mysqli_query($conn, $q);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Merit / Rank List</title>
    <link rel="stylesheet" href="style.css">

    <style>
        body.rank-page {
            background: #eef1f5;
            font-family: Arial, sans-serif;
        }

        .rank-container {
            width: 80%;
            margin: 35px auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0px 0px 12px rgba(0,0,0,0.25);
        }

        .rank-heading {
            background: #004aad;
            color: white;
            padding: 15px;
            font-size: 22px;
            text-align: center;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .rank-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            font-size: 15px;
        }

        .rank-table th, .rank-table td {
            border: 1px solid #c8d4e3;
            padding: 10px;
            text-align: center;
        }

        .rank-table th {
            background: #e0ebff;
            font-weight: bold;
        }

        .back-btn {
            margin-top: 20px;
            padding: 10px 16px;
            background: #004aad;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 6px;
        }

        .back-btn:hover {
            background: #003170;
        }
    </style>
</head>

<body class="rank-page">

<div class="rank-container">

    <div class="rank-heading">Merit / Rank List</div>

    <table class="rank-table">
        <tr>
            <th>Rank</th>
            <th>Roll Number</th>
            <th>Name</th>
            <th>Category</th>
            <th>Percentile</th>
            <th>Total Marks</th>
        </tr>

        <?php
        if (mysqli_num_rows($r) > 0) {
            while ($row = mysqli_fetch_assoc($r)) {
                echo "<tr>";
                echo "<td>". $row['air'] ."</td>";
                echo "<td>". $row['roll_no'] ."</td>";
                echo "<td>". $row['name'] ."</td>";
                echo "<td>". ($row['category'] ?? '-') ."</td>";
                echo "<td>". ($row['percentile'] ?? '-') ."</td>";
                echo "<td>". ($row['total_marks'] ?? '-') ."</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No data available</td></tr>";
        }
        ?>
    </table>

    <button class="back-btn" onclick="window.history.back()">Back</button>

</div>

</body>
</html>
