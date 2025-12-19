<?php
session_start();
if (!isset($_SESSION['roll_no'])) {
    header("Location: index.html");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Result</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="result-page">

<div class="result-container">

    <div class="result-heading">
        Entrance Examination Result 2025
    </div>

    <div class="highlight-box">
        <div class="highlight-label">Overall Percentile</div>
        <div class="highlight-value"><?= $_SESSION['percentile'] ?>%</div>
        <div class="highlight-subtext">All India Rank (AIR): <?= $_SESSION['air'] ?></div>
    </div>

    <div class="section-title">Candidate Information</div>
    <div class="info-box">
        <div class="info-row"><b>Name:</b> <?= $_SESSION['name'] ?></div>
        <div class="info-row"><b>Roll Number:</b> <?= $_SESSION['roll_no'] ?></div>
        <div class="info-row"><b>Status:</b> <?= $_SESSION['qualified'] ?></div>
        <div class="info-row"><b>Category Rank:</b> <?= $_SESSION['category_rank'] ?></div>
    </div>

    <div class="section-title">Performance Summary</div>
    <div class="info-box">
        <div class="info-row"><b>Percentile:</b> <?= $_SESSION['percentile'] ?>%</div>
        <div class="info-row"><b>All India Rank:</b> <?= $_SESSION['air'] ?></div>
        <div class="info-row"><b>Category Rank:</b> <?= $_SESSION['category_rank'] ?></div>
        <div class="info-row"><b>Result Generated On:</b> <?= date("d-M-Y") ?></div>
    </div>

    <div class="footer-note">
        This is a system-generated result. For corrections, contact the examination authority.
    </div>

</div>

</body>
</html>
