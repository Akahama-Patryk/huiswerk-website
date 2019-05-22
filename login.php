<?php
include_once('class/Autoloader.php');
?>
<html lang="nl">
<head>
    <title>Huiswerk Website --Login--</title>
<!--    <link rel="icon" href="img/logo.ico">-->
    <link rel="stylesheet" type="text/css" href="style/bootstrap.css">
</head>
<body>
<div class="card rounded-0">
    <div class="card-header">
        <h3 class="mb-0">Login</h3>
    </div>
    <div class="card-body bg-light">
        <form class="form" role="form" autocomplete="off" id="formLogin" novalidate="" method="POST">
            <div class="form-group">
                <label for="user">Username</label>
                <input type="text" class="form-control form-control-lg rounded-0" name="user" id="user" required
                       placeholder="Type your username.">
                <div class="invalid-feedback">Oops, you missed this one.</div>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control form-control-lg rounded-0" id="pass" name="pass" required
                       autocomplete="new-password" placeholder="Type your password.">
                <div class="invalid-feedback">Enter your password too!</div>
            </div>
            <a href="register.php" class="btn btn-primary btn-lg float-left" id="btnLogin">Register</a>
            <button type="submit" name="submit" class="btn btn-success btn-lg float-right" id="btnLogin">Login</button>
        </form>
    </div>
</div>
</body>
</html>
