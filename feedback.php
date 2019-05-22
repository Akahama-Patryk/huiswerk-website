<?php
include_once('classes/Autoloader.php');
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $feedback = $_POST['comment'];
    $data = new Homework();
    $send = $data->sendFeedback($name,$email,$feedback);
}
?>
<html lang="nl">
<head>
    <title>Project Huiswerk</title>
    <link rel="stylesheet" type="text/css" href="style/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="style/feedback.css">
</head>
<body>
<div class="container contact">
    <div class="row">
        <div class="col-md-3">
            <div class="contact-info">
                <img src="https://image.ibb.co/kUASdV/contact-image.png" alt="image"/>
                <h2>Feedback</h2>
                <h4>Placeholder</h4>
            </div>
        </div>
        <div class="col-md-9">
            <form method="post">
                <div class="contact-form">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="name">Jouw naam:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" placeholder="Uw naam" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" placeholder="Uw email" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="comment">Comment:</label>
                        <div class="col-sm-10">
                            <textarea type="text" name="comment" class="form-control" rows="5" id="comment"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" name="submit" class="btn btn-default">Stuur</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
