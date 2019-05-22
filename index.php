<?php
	include_once('classes/Autoloader.php');
?>
<html lang="nl">
<head>
    <title>Project Huiswerk</title>
<link rel="stylesheet" type="text/css" href="style/bootstrap.css">
</head>
<body>
<?=Homework::displayHomework(Homework::fetchHomework())?>
</body>
</html>
