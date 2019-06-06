<?php
include_once('classes/Autoloader.php');
Session::start();
// Get current date for filter.
$current_date_filter = date("Y-m-d");
// Set locale to dutch for date.
setlocale(LC_TIME, 'NL_nl');
?>
<html lang="nl">
<head>
    <title>Project Huiswerk</title>
    <link rel="stylesheet" type="text/css" href="style/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="style/main.css">
</head>
<body>
<ul class="nav nav-pills nav-fill">
    <li class="nav-item">
        <a class="nav-link active" href="index.php">Homepage</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="feedback.php">Feedback</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="inloggen.php">Admin Dashboard</a>
    </li>
</ul>
<br>
<div class="container">
    <div class="row">
        <?php Homework::displayHomework(Homework::fetch($current_date_filter)); ?>
    </div>
</div>
</body>
</html>
