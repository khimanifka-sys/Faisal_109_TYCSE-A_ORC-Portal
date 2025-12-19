<?php
session_start();
if (!isset($_SESSION['roll_no'])) {
    header("Location: index.html");
    exit;
}

include "db_connect.php";

$roll = $_SESSION['roll_no'];
$q = "SELECT * FROM students WHERE roll_no='$roll'";
$r = mysqli_query($conn, $q);

if (mysqli_num_rows($r) != 1) {
    die("Unable to load scorecard.");
}

$data = mysqli_fetch_assoc($r);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Score Card - <?= $data['name'] ?></title>
    <link rel="stylesheet" href="style.css">

    <style>
        body.scorecard-page {
            background: #f5f5f5;
            font-family: Arial, sans-serif;
        }
        .scorecard-container {
            width: 70%;
            margin: 30px auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 0px 12px rgba(0,0,0,0.3);
        }
        .scorecard-header {
            text-align: center;
            border-bottom: 3px solid #003f8a;
            padding-bottom: 15px;
            margin-bottom: 25px;
        }
        .scorecard-header h2 {
            margin: 0;
            color: #003f8a;
            font-size: 26px;
        }
        .scorecard-header h4 {
            margin: 4px 0;
            font-weight: normal;
            color: #555;
        }

        .info-section {
            margin-bottom: 20px;
        }
        .info-title {
            font-size: 18px;
            color: #003f8a;
            margin-bottom: 8px;
            font-weight: bold;
        }
        .info-box {
            background: #eef5ff;
            padding: 15px;
            border-radius: 8px;
        }
        .info-row {
            margin-bottom: 8px;
            font-size: 15px;
        }

        .score-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            margin-bottom: 25px;
        }
        .score-table th, .score-table td {
            border: 1px solid #b5c8e6;
            padding: 10px;
            text-align: center;
        }
        .score-table th {
            background: #003f8a;
            color: white;
        }

        .footer-section {
            margin-top: 20px;
        }
        .signature-box {
            margin-top: 30px;
            text-align: right;
            font-size: 15px;
        }
        .print-btn {
            margin-top: 20px;
            padding: 12px 18px;
            background: #003f8a;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 6px;
            font-size: 15px;
        }
        .print-btn:hover {
            background: #002a61;
        }

        @media print {
            .print-btn {
                display: none;
            }
            body {
                margin: 0;
                background: white;
            }
        }
    </style>
</head>

<body class="scorecard-page">

<div class="scorecard-container">

    <div class="scorecard-header">
        <h2>Entrance Examination Score Card – 2025</h2>
        <h4>Government Examination Authority</h4>
    </div>

    <!-- Candidate Information -->
    <div class="info-section">
        <div class="info-title">Candidate Details</div>
        <div class="info-box">
            <div class="info-row"><b>Name:</b> <?= $data['name'] ?></div>
            <div class="info-row"><b>Roll Number:</b> <?= $data['roll_no'] ?></div>
            <div class="info-row"><b>Category:</b> <?= $data['category'] ?></div>
            <div class="info-row"><b>Date of Birth:</b> <?= $data['dob'] ?></div>
        </div>
    </div>

    <!-- Exam Performance -->
    <div class="info-section">
        <div class="info-title">Performance Summary</div>
        <table class="score-table">
            <tr>
                <th>Percentile</th>
                <th>All India Rank</th>
                <th>Category Rank</th>
                <th>Total Marks</th>
            </tr>
            <tr>
                <td><?= $data['percentile'] ?>%</td>
                <td><?= $data['air'] ?></td>
                <td><?= $data['category_rank'] ?></td>
                <td><?= $data['total_marks'] ?></td>
            </tr>
        </table>
    </div>

    <!-- Footer -->
    <div class="footer-section">
        <div class="info-row"><b>Result Status:</b> <?= $data['qualified'] ?></div>
        <div class="info-row"><b>Score Card Generated On:</b> <?= date("d-M-Y") ?></div>
    </div>

    <div class="signature-box">
        <b>Controller of Examinations</b><br>
        Government Examination Authority
    </div>

    <button class="print-btn" onclick="window.print()">Download / Print Score Card</button>

</div>

</body>
</html>
