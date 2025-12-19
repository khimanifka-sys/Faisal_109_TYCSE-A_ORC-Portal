<?php
session_start();
if (!isset($_SESSION['roll_no'])) {
    header("Location: index.html");
    exit;
}

include "db_connect.php";

// Fetch cutoff details
$q = "SELECT code, name, cutoff_percentile FROM categories ORDER BY cutoff_percentile DESC";
$r = mysqli_query($conn, $q);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cutoff Details</title>
    <link rel="stylesheet" href="style.css">

    <style>
        body.cutoff-page {
            background: #eef1f7;
            font-family: Arial, sans-serif;
        }

        .cutoff-container {
            width: 70%;
            margin: 35px auto;
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.25);
        }

        .cutoff-heading {
            background: #003f8a;
            color: white;
            padding: 14px;
            font-size: 22px;
            border-radius: 8px;
            text-align: center;
            margin-bottom: 20px;
        }

        .cutoff-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            font-size: 15px;
        }

        .cutoff-table th, .cutoff-table td {
            border: 1px solid #c5d4e5;
            padding: 10px;
            text-align: center;
        }

        .cutoff-table th {
            background: #e1ecff;
            font-weight: bold;
        }

        .note {
            margin-top: 20px;
            font-size: 13px;
            color: gray;
            text-align: center;
        }

        .back-btn {
            margin-top: 20px;
            padding: 10px 16px;
            background: #003f8a;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .back-btn:hover {
            background: #002d62;
        }
    </style>
</head>

<body class="cutoff-page">

<div class="cutoff-container">

    <div class="cutoff-heading">Category-wise Cutoff Percentile</div>

    <table class="cutoff-table">
        <tr>
            <th>Category</th>
            <th>Full Category Name</th>
            <th>Cutoff Percentile</th>
        </tr>

        <?php
        if (mysqli_num_rows($r) > 0) {
            while ($row = mysqli_fetch_assoc($r)) {
                echo "<tr>";
                echo "<td>". $row['code'] ."</td>";
                echo "<td>". $row['name'] ."</td>";
                echo "<td>". ($row['cutoff_percentile'] ?? '-') ."</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No cutoff data available.</td></tr>";
        }
        ?>
    </table>

    <button class="back-btn" onclick="window.history.back()">Back</button>

    <div class="note">
        Cutoff values are based on exam authority rules.
    </div>

</div>

</body>
</html>
