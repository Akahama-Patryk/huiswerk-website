<?php
	include_once('classes/Autoloader.php');
	Session::start();
	
	Session::logOut();
	if (Session::logOut()) {
        RedirectHandler::HTTP_301('index.php');
    } else {
	    echo "Logout failed.";
    }