<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

		<form action="../Controller/NovoUsuario.php" method="post">
		Nome: <input type="text" name="name" value="" required>
		<br>
		Email: <input type="email" name="email" value="" required>
		<br>
		Senha: <input type="password" name="senha" value="" required>
		<br>
		<button type="submit" name="cadastrar">Cadastrar</button>
	</form>

</body>
</html>