<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>duduz</title>
</head>
<body>
<?php
session_start(); // Inicia a sessão

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

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['logar'])) {
    $email = htmlspecialchars($_POST['email']);
    $senha = $_POST['senha'];

    $sql = "SELECT id, email, senha FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($senha, $row['senha'])) {
            // Inicia a sessão e define variáveis de sessão
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['logged_in'] = true;

            // Redireciona para a página de perfil ou outra página desejada
            header(".\ecommerce\Views\pagina.php");
            exit;
        } else {
            $mensagem = "Senha incorreta";
        }
    } else {
        $mensagem = "Email não encontrado";
    }

    $stmt->close();
}

$conn->close();
?>

<form action="" method="post">
    Email: <input type="text" name="email" value="" required>
    <br>
    Senha: <input type="password" name="senha" value="" required>
    <br>
    <button type="submit" name="logar">Entrar</button>
</form>
<p>Não tem uma conta? <a href=".\Views\Usuario\cadastro_usuario.php">Cadastrar</a></p>

<?php
if (isset($mensagem)) {
    echo "<p>$mensagem</p>";
}
?>
</body>
</html>
