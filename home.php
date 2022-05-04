<?php 

include('protection.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>
</head>
<body>

	<h2>Bem vindo ao painel de login, <?php echo $_SESSION['nome']; ?></h2>
	
	<p>
		<a href="logout.php">Sair</a>
	</p>

</body>
</html>