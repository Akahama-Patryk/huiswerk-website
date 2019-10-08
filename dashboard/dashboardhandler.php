<?php
	include_once('../classes/Autoloader.php');
	Session::start();
	
	if (isset($_GET['homework_del_id']) && !empty($_GET['homework_del_id'])) {
		Database::deleteRow("homework", "id", $_GET['homework_del_id']);
		echo "Successful Delete";
		RedirectHandler::HTTP_301("dashboard.php");
	} else {
		http_response_code(405);
	}
	
	if (isset($_GET['user_del_id']) && !empty($_GET['user_del_id'])) {
        Database::deleteRow("user", "id", $_GET['user_del_id']);
		echo "Successful Delete";
		RedirectHandler::HTTP_301("dashboard.php");
	} else {
		http_response_code(405);
	}
	
	if (isset($_GET['feedback_del_id']) && !empty($_GET['feedback_del_id'])) {
        Database::deleteRow("feedback", "id", $_GET['feedback_del_id']);
		echo "Successful Delete";
		RedirectHandler::HTTP_301("dashboard.php");
	} else {
		http_response_code(405);
	}