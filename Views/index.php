<?php
session_start();
if(!isset($_SESSION['logado'])){
	header("location: ../Views/login.php");
	die();
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		aaaaaaaaaaaaaaa
	</title>
</head>
<body>

<p>Entrou</p>

<a href="../session_abort.php">sair</a>

</body>
</html>