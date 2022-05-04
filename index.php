<?php 

	$pdo = new PDO('mysql:host=localhost;dbname=usuarios', 'root', '');

if(isset($_POST['login_usuario']) || isset($_POST['login_usuario'])){
	if(strlen($_POST['login_usuario']) == 0){
		echo '<br/>';
		echo 'Preencha seu e-mail!';
	}

	elseif(strlen($_POST['senha_usuario']) == 0){
		echo '<br/>';
		echo 'Preencha sua senha!';

	}

	else{
		$email = $_POST['login_usuario'];
		$senha = $_POST['senha_usuario'];

		$sqlSelect = $pdo->prepare("SELECT * FROM `usuarios` WHERE login='$email' AND senha='$senha'");

		$sqlSelect->execute();

		$qtde = $sqlSelect->rowCount();

		if($qtde == 1){

			$usuario = $sqlSelect->fetch();

			if(!isset($_SESSION)){
				session_start();
			}

			$_SESSION['id'] = $usuario['id'];
			$_SESSION['nome'] = $usuario['nome'];

			header("Location: home.php");
		}

		else{
			echo "Falha ao logar! E-mail ou senha incorreto(s).";
		}
	}
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
</head>
<body>
	<form method="post">
		<h2>Sistema de Login</h2>
		Login: <input type="text" name="login_usuario">
		<br/>
		<br/>
		Senha: <input type="password" name="senha_usuario">
		<br/>
		<br/>
		<button type="submit" name="logar" value="btn-logar">Logar</button>

		<div id="mensagens"></div>
	</form>
</body>
</html>
