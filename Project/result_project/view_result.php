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

if (mysqli_num_rows($r) == 1) {

    $data = mysqli_fetch_assoc($r);

    // Save data to session
    $_SESSION['name']           = $data['name'];
    $_SESSION['percentile']     = $data['percentile'];
    $_SESSION['air']            = $data['air'];
    $_SESSION['category_rank']  = $data['category_rank'];
    $_SESSION['qualified']      = $data['qualified'];

    // Redirect to result page
    header("Location: result_page.php");
    exit;

} else {
    echo "Result not found!";
}
?>
