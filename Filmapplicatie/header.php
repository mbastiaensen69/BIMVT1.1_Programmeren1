<?php
	$root = "http://" . $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] . "/";
?>
<html>
<head>
	<title>Filmbeheer</title>
	<link rel="stylesheet" href="styles.css">
	<link rel="stylesheet" href="../styles.css">
</head>
<body>
	<div id="content">
        <h1><a href="http://films.localhost/">Filmbeheer</a></h1>
		<div id="left">
		<?php
			include("menu.php");
		?>
		</div>
		<div id="right">
		