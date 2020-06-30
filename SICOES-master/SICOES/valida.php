<?php
	session_start();
	include('conexao.php');

	if(empty($_POST['login']) || empty($_POST['senha'])) {
		header('Location: login.html');
		exit();
	}

	$login = mysqli_real_escape_string($con, $_POST['login']);
	$senha = mysqli_real_escape_string($con, $_POST['senha']);

	$query = "SELECT id_usuario, usuario FROM `usuario` WHERE `login` = '{$login}' and `senha` = '{$senha}'";

	$result = mysqli_query($con, $query);

	$row = mysqli_num_rows($result);

	if($row == 1) {
		$usuario_bd = mysqli_fetch_assoc($result);
		$_SESSION['nome'] = $usuario_bd['nome'];
		header('Location: login.html');
		exit();
	} else {
		$_SESSION['nao_autenticado'] = true;
		header('Location: index.html');
		exit();
	}
?>