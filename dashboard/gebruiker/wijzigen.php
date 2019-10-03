<?php
	include_once('../../classes/Autoloader.php');
	Session::start();
	if (isset($_POST['username'], $_POST['pass'])) {
		$username = $_POST['username'];
		$pass = $_POST['pass'];
		
		$user = new User($username, $pass);
		$user->register();
		RedirectHandler::HTTP_301('../dashboard.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="../../style/dashboard.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
</head>
<body>
<div class="container">
    <div class="row" style="margin-top:0.5em;">
        <div class="col-md-8">
            <h2>Gebruiker wijzigen</h2>
        </div>
        <div class="col-md-4 text-right">
            <?php
            if (Session::loginStatus()) {
                ?> <a href="../../logout.php" class="btn btn-primary">Uitloggen</a> <?php
                ?> <a href="../../index.php" class="btn btn-primary">Home</a> <?php
            } else {
                RedirectHandler::HTTP_301('../../dashboard.php');
            }
            ?>
        </div>
        <?php
        //when getting id from user table in dashboad admin it gonna fetch data about this user.
        if (isset($_GET['user_id']) && !empty($_GET['user_id'])) {
            User::displayUserUpdate(user::fetchUser($_GET['user_id']));
        } ?>
</body>
</html>
