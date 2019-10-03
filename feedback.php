<?php
	include_once('classes/Autoloader.php');
	if (isset($_POST['submit'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$feedback = $_POST['feedback_text'];
		
		Feedback::send($feedback, $name, $email);
        RedirectHandler::HTTP_301('index.php');
	}
?>
<html lang="nl">
<head>
    <title>Feedback</title>
    <link rel="stylesheet" type="text/css" href="style/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="style/main.css">
</head>
<body>
<ul class="nav nav-pills nav-fill">
    <li class="nav-item">
        <a class="nav-link" href="index.php">Homepage</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="feedback.php">Feedback</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="dashboard/dashboard.php">Admin Dashboard</a>
    </li>
</ul>
<div class="container contact">
    <div class="row">
        <div class="col-md-3">
            <div class="contact-info text-center">
                <img src="https://image.ibb.co/kUASdV/contact-image.png" alt="image"/>
                <h2>Feedback</h2>
            </div>
        </div>
        <div class="col-md-9">
            <form method="post">
                <div class="contact-form">
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="name">naam:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" placeholder="Uw naam" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="email">Email:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" placeholder="Uw email" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="comment">Feedback:</label>
                        <div class="col-md-10">
                            <textarea type="text" name="feedback_text" class="form-control" rows="5" id="comment"
                                      required></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10">
                            <button type="submit" name="submit" class="btn btn-primary">Feedback verzenden</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
