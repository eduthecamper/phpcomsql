<!DOCTYPE html>
<html lang="en">
<head>
	
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">


	<link rel="stylesheet" href="../style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>




</head>
<body>
    
	<?php

		if(isset($_GET['hasLogin'])){
			?> <p>Esse email já existe!</p>
			<?php
		}

	?>

		<?php

		if(isset($_GET['newUser'])){
			?> <p>Cadastro realizado!</p>
			<?php
		}

	?>

		<?php

		if(isset($_GET['senhaIncorreta'])){
			?> <p>Senha ou email incorreto</p>
			<?php
		}

	?>
<div id="outer">


	<div id="login">
		<form action="../Controller/FazerLogin.php" method="post">
			
		<div class = "poet">
				<label for="email">Email:</label>
		</div>
		<div>	
				<input type="text" name="email">
		</div> 
		<div class = "poet">
				<label for="senha">Senha:</label>
		</div>
		<div>	
				<input type="password" name="senha">
		</div>
		<div>    
				<input type="submit" value="Enviar" class="poet">
		</div>
		<br><br><br>		<br><br><br><br>
<br><br><br><br>

		</form>
		<a href="./cadastro.php" id="cadastrelink">Não tem Login? Cadastre-se</a>
	</div>


</div>


</body>
</html>