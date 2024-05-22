<?php 

include('../Models/connect.php');

session_start();


$email = $_POST["email"];
$senha = $_POST["senha"];

$query_email = "SELECT * FROM `usuarios` WHERE email = '$email'";

$emails = mysqli_query($conn, $query_email);

$results_mail = mysqli_fetch_assoc($emails);

if($results_mail == NULL){
	header('location: ../Views/login.php?senhaIncorreta=False');
	die();
}

if(hash_equals(hash('sha256',$senha), $results_mail['senha'])){
	header("location: ../Views/index.php?nome=" . $results_mail['nome']);
	$_SESSION['logado'] = True;
	die();

}
	else{
	header("location: ../Views/login.php?senhaIncorreta=True");
	}




	