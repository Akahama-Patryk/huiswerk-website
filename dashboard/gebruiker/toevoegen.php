<?php
	include_once('../../classes/Autoloader.php');
	Session::start();
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
            <h2>Gebruiker toevoegen</h2>
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
        <div class="col-md-12" style="margin-top:2em;">
            <div class="card rounded-0">
                <div class="card-body bg-light">
                    <form class="form" role="form" id="formRegister" method="POST">
                        <div class="form-group">
                            <label for="username">Gebruikersnaam</label>
                            <input type="text" class="form-control form-control-lg rounded-0" name="username" id="user"
                                   required
                                   placeholder="">
                        </div>
                        <div class="form-group">
                            <label>Wachtwoord</label>
                            <input type="password" class="form-control form-control-lg rounded-0" id="pass" name="pass"
                                   required
                                   autocomplete="new-password" placeholder="">
                        </div>
                        <button type="submit" name="submit" class="btn btn-success btn-lg float-right" id="btnLogin">
                            Bevestig
                        </button>
                    </form>
                </div>
            </div>
        </div>
</body>
</html>

<?php
	if (isset($_POST['username'], $_POST['pass'])) {
		$username = $_POST['username'];
		$pass = $_POST['pass'];
		
		$user = new User($username, $pass);
		if ($user->register()) {
			RedirectHandler::HTTP_301('../dashboard.php');
		} else {
			echo "<h1>Gebruiker bestaat al.</h1>";
		}
	}
?>
