<?php
include_once('class/Autoloader.php');

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    var_dump($_POST);
//    $register = new User($username,$password);
}

?>
<!DOCTYPE HTML>
<html lang="nl">
<head>
    <title>Huiswerk Website --Register--</title>
    <!--    <link rel="icon" href="img/logo.ico">-->
    <link rel="stylesheet" type="text/css" href="style/bootstrap.css">
</head>
<body>
<div class="card rounded-0">
    <div class="card-header">
        <h3 class="mb-0">Register</h3>
    </div>
    <div class="card-body">
        <form class="form" role="form" autocomplete="off" id="formLogin" novalidate="" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control form-control-lg rounded-0" name="username" id="username"
                       placeholder="Type your username." required>
                <div class="invalid-feedback">Oops, you missed this one.</div>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control form-control-lg rounded-0" id="password" name="password"
                       autocomplete="new-password" placeholder="Type your password." required>
                <div class="invalid-feedback">Enter your password too!</div>
            </div>
            <button type="submit" name="submit" class="btn btn-success btn-lg float-right" id="btnLogin">Register
            </button>
        </form>
    </div>
</div>
</body>
</html>