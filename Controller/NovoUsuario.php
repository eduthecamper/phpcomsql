<?php 

include('../Models/connect.php');


$email = $_POST["email"];
$nome = $_POST["name"];
$senha = $_POST["senha"];



$query_email = "SELECT `email` FROM `usuarios` WHERE email = '$email'";

$emails = mysqli_query($conn, $query_email);

$results_mail = mysqli_fetch_assoc($emails);

if($results_mail['email']){
	header("location: ../Views/login.php?hasLogin=True");
	die();
}

$senha = hash('sha256', $senha);

$query = "INSERT INTO `usuarios`(`email`, `nome`, `senha`) VALUES ('$email','$nome','$senha')";

mysqli_query($conn, $query);

header('location: ../Views/login.php?newUser=True');

 ?>