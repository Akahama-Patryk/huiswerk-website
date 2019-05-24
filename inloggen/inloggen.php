<?php
	include_once('../classes/Autoloader.php');
	Session::start();
	
	// Redirect back to home if already logged in.
	if(Session::loginStatus()) {
	    RedirectHandler::HTTP_301('../dashboard/dashboard.php');
    }
?>
    <html lang="nl">
    <head>
        <title>Huiswerk Website --Login--</title>
        <link rel="stylesheet" href="../style/Main.css">
        <link rel="stylesheet" type="text/css" href="../style/bootstrap.css">
    </head>
    <body>
    <div class="card rounded-0">
        <div class="card-header">
            <h3 class="mb-0">Login</h3>
        </div>
        <div class="card-body bg-light">
            <form class="form" role="form" id="formLogin" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control form-control-lg rounded-0" name="username" id="user" required
                           placeholder="">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control form-control-lg rounded-0" id="pass" name="pass" required
                           autocomplete="new-password" placeholder="">
                </div>
                <button type="submit" name="submit" class="btn btn-success btn-lg float-right" id="btnLogin">Inloggen
                </button>
            </form>
        </div>
    </div>
    </body>
    </html>

<?php
	if (isset($_POST['username'], $_POST['pass'])) {
	    $username = $_POST['username'];
	    $pass = $_POST['pass'];

	    // de wachtwoorden moeten opgeslagen zijn in de database met password_hash()
	    
        $user = new User($username, $pass);
        $user->login();
	}

