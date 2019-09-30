<?php
	include_once('../classes/Autoloader.php');
	Session::start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" type="text/css" href="../style/dashboard.css">
</head>
<body>
<div class="container">
    <div class="row" style="margin-top:0.5em;">
        <div class="col-md-8">
            <h2>Admin dashboard</h2>
        </div>
        <div class="col-md-4 text-right">
			<?php
				if (Session::loginStatus()) {
					?> <a href="../logout.php" class="btn btn-primary">Uitloggen</a> <?php
					?> <a href="../index.php" class="btn btn-primary">Home</a> <?php
				} else {
					RedirectHandler::HTTP_301('../inloggen.php');
				}
			?>
        </div>
        <div class="col-md-12" style="margin-top:2em;">
            <a href="huiswerk/toevoegen.php" class="btn btn-primary">Huiswerk Toevoegen</a>
            <a href="gebruiker/toevoegen.php" class="btn btn-primary">Gebruiker Toevoegen</a>
        </div>
        <div style="margin:0.5em;">
        
        </div>
        <br>
        <div class="col-md-12">
			<?php User::displayUsers(User::fetchUsers()) ?>
        </div>
        <br>
        <div class="col-md-12">
			<?php Feedback::display(Feedback::fetch()) ?>
            <br>
        </div>
        <div class="col-md-12">
			<?php Homework::displayAdminHomework(Homework::fetch("DESC", true)) ?>
        </div>
    </div>
</div>
</body>
</html>
