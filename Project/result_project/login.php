<?php
session_start();
include "db_connect.php";

$roll = trim($_POST['roll']);
$dob  = date("Y-m-d", strtotime($_POST['dob']));

$q = "SELECT * FROM students WHERE roll_no='$roll' AND dob='$dob'";
$r = mysqli_query($conn, $q);

if (mysqli_num_rows($r) == 1) {
    $_SESSION['roll_no'] = $roll;
    header("Location: dashboard.php");
    exit;
} else {
    echo "Invalid Login!";
}
?>
