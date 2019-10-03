<?php
	include_once('../../classes/Autoloader.php');
	Session::start();
	$subject_data = Utility::fetchSubjects();
	if (isset($_POST['submit'])) {
		$subject = $_POST['subject'];
		$deadline = $_POST['date'];
		$title = $_POST['title'];
		$description = $_POST['description'];
		
		Homework::add($title, $description, $subject, $deadline);
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
            <h2>Huiswerk toevoegen</h2>
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
            <form method="post">
                <div class="card-body">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="name">Titel: </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" placeholder="Typ hier een titel"
                                   name="title" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="description">Beschrijving/link: </label>
                        <div class="col-sm-10">
                            <textarea type="text" name="description" class="form-control" rows="5"
                                      id="description"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="subject">Vak: </label>
                        <select name="subject" required>
                            <option value="" selected disabled> -- Kies een vak --</option>
							<?php
								foreach ($subject_data as $data) :
									?>
                                    <option value="<?= $data['subject_id'] ?>"><?= $data['subject_name'] ?></option>
								<?php
								endforeach;
							?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date">Deadline: </label>
                        <input min="<?= date("Y-m-d") ?>" type="date" name="date" value="date" required>
                        <?PHP
                        // TODO gebruik dit nadat je de filter aanpast.
//                        <small class="form-text">Let op: item zal zichtbaar zijn t/m 1 week na deadline</small>
                        ?>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Bevestig</button>
            </form>
        </div>
    </div>

</div>
</div
</body>
</html>
