<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>duduz</title>
</head>
<body>
	<?php
	$servername = "localhost";
	$username = "dudu";
	$password = "32653565";
	$dbname = "e-commerce";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cadastrar'])) {
		$nome = htmlspecialchars($_POST['nome']);
		$email = htmlspecialchars($_POST['email']);
		$senha = password_hash($_POST['senha'], PASSWORD_BCRYPT); // Secure password hashing

		$sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";

		$stmt = $conn->prepare($sql);
		$stmt->bind_param("sss", $nome, $email, $senha);

		if ($stmt->execute()) {
			$mensagem = "Cadastro realizado com sucesso!";
		} else {
			$mensagem = "Erro: " . $stmt->error;
		}

		$stmt->close();
	}

	$conn->close();
	?>

	<form action="" method="post">
		Nome: <input type="text" name="nome" value="" required>
		<br>
		Email: <input type="email" name="email" value="" required>
		<br>
		Senha: <input type="password" name="senha" value="" required>
		<br>
		<button type="submit" name="cadastrar">Cadastrar</button>
	</form>

	<?php
		if (isset($mensagem)) {
			echo "<p>$mensagem</p>";
		}
	?>
</body>
</html>
