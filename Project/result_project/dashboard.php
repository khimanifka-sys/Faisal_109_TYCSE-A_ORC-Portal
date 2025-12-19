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
$data = mysqli_fetch_assoc($r);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="topbar">
    <div class="logo">Online Result Portal</div>
    <div class="top-links">
        <span>Student Dashboard</span>
    </div>
</div>

<div class="layout">

    <!-- LEFT SIDEBAR -->
    <div class="sidebar">
        <h3>Menu</h3>
        <ul>
    <li><a href="dashboard.html">Home / Overview</a></li>
    <li><a href="view_result.php">View Result</a></li>
    <li><a href="download_scorecard.php">Download Score Card</a></li>
    <li><a href="rank_list.php">Merit List (Topper List)</a></li>
    <li><a href="cutoff.php">Category wise Cutoff</a></li>
    <li><a href="important_dates.html">Important Dates</a></li>
    <li><a href="instructions.html">Instructions & Rules</a></li>
    <li><a href="help_faq.html">Help / FAQ</a></li>
    <li><a href="contact_support.html">Contact Support</a></li>
</ul>


        <div class="sidebar-note">
            **--shortuct menus--**
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="main">

        <!-- WELCOME SECTION -->
        <div class="section">
            <h2 class="section-title">Welcome, Student</h2>
            <p class="section-text">
                Access your exam result, download your scorecard, view merit lists, and check cutoff details - all from one place.
            </p>
        </div>

        <!-- QUICK ACTION CARDS -->
        <div class="section">
            <h3 class="section-title">Quick Actions</h3>
            <div class="cards-row">
                <div class="card">
                    <h4>View Result</h4>
                    <p>Check your marks, percentage and result status.</p>
<button class="btn-small" onclick="location.href='view_result.php'">Open</button>
                </div>
                <div class="card">
                    <h4>Download Score Card</h4>
                    <p>Download your score card in printable format.</p>
<button class="btn-small" onclick="location.href='download_scorecard.php'">Download</button>
                </div>
                <div class="card">
    <h4>Merit / Rank List</h4>
    <p>View list of top students and ranks.</p>
<button class="btn-small" onclick="location.href='rank_list.php'">View List</button>
</div>

                <div class="card">
                    <h4>Cutoff Details</h4>
                    <p>Check category wise qualifying cutoff.</p>
<button class="btn-small" onclick="location.href='cutoff.php'">View Cutoff</button>
                </div>
            </div>
        </div>

        <!-- EXAM SUMMARY SECTION -->
<div class="section">
    <h3 class="section-title">Your Exam Summary</h3>

    <table class="table-simple">
        <tr>
            <th>Field</th>
            <th>Details</th>
        </tr>
        <tr>
            <td>Candidate Name</td>
            <td><?= $data['name'] ?></td>
        </tr>
        <tr>
            <td>Roll Number</td>
            <td><?= $data['roll_no'] ?></td>
        </tr>
        <tr>
            <td>Exam Name</td>
            <td>Entrance Examination 2025</td>
        </tr>
        <tr>
            <td>Exam Year</td>
            <td>2025</td>
        </tr>
        <tr>
            <td>Status</td>
            <td><?= $data['qualified'] ?></td>
        </tr>
    </table>

</div>


        <!-- ANNOUNCEMENTS AND DATES -->
        <div class="section two-columns">

            <div class="column">
                <h3 class="section-title">Latest Announcements</h3>
                <ul class="simple-list">
                    <li>Result will be published after official notice.</li>
                    <li>Students should keep their Roll Number and DOB safe.</li>
                    <li>Re-checking / Revaluation details will be updated later.</li>
                    <li>Merit list will be prepared as per rules.</li>
                    <li>All information here is for demo purpose now.</li>
                </ul>
            </div>

            <div class="column">
                <h3 class="section-title">Important Dates </h3>
                <table class="table-simple">
                    <tr>
                        <th>Event</th>
                        <th>Date</th>
                    </tr>
                    <tr>
                        <td>Exam Date</td>
                        <td>10 March 2025</td>
                    </tr>
                    <tr>
                        <td>Answer Key Release</td>
                        <td>20 March 2025</td>
                    </tr>
                    <tr>
                        <td>Result Declaration</td>
                        <td>05 April 2025</td>
                    </tr>
                    <tr>
                        <td>Counselling Start</td>
                        <td>15 April 2025</td>
                    </tr>
                </table>
            </div>

        </div>

        <!-- IMPORTANT LINKS -->
        <div class="section"  id="instructions">
            <h3 class="section-title">Important Links</h3>
            <div class="links-row">
                <a href="#" class="link-btn">Official Website</a>
<a href="instructions.html" class="link-btn">Information Brochure</a>
<a href="syllabus.html" class="link-btn">Exam Syllabus</a>
<a href="javascript:void(0)" onclick="alert('Support Email: result.support@example.com')" class="link-btn">
    Support Email
</a>
            </div>
        </div>

        <!-- HELP SECTION -->
        <div class="section">
            <h3 class="section-title">Help / Support</h3>
            <p class="section-text">
                For any query related to result, marks, rank, or login issues,
                students can contact the examination cell.  
                This section can be connected to a contact form later.
            </p>
            <ul class="simple-list">
                <li>Support Email: result.support@example.com</li>
                <li>Helpline Number: 0101-013215</li>
                <li>Support Time: 10:00 AM to 5:00 PM (Working Days)</li>
            </ul>
        </div>

        <!-- FOOTER -->
        <div class="footer">
       All results are generated based on authenticated examination data.        </div>

    </div>

</div>

</body>
</html>
