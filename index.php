<?php
include_once('classes/Autoloader.php');
Session::start();
$currentdate = date("Y-m-d");
?>
<html lang="nl">
<head>
    <title>Project Huiswerk</title>
    <link rel="stylesheet" type="text/css" href="style/bootstrap.css">
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
        <a class="nav-link" href="inloggen/inloggen.php">Admin Dashboard</a>
    </li>
</ul>
<?= Homework::displayHomework(Homework::fetchHomework($currentdate)) ?>
</body>
</html>
