<?php
	include("topo.php");
	$id = $_GET['id'];
	$nome  = $_POST['nome'];
	$nome = mysql_real_escape_string($nome);
	$login = $_POST['login'];
	$login = mysql_real_escape_string($login);
	$email = $_POST['email'];
	$email = mysql_real_escape_string($email);
	$senha = $_POST['senha'];
	$senha = mysql_real_escape_string($senha);

	$sql = "UPDATE usuarios SET
			nome = '$nome',
			login = '$login',
			email = '$email',
			senha = '$senha'
			WHERE id = $id";

	$gravou = mysql_query($sql);
	if($gravou == true){
		echo "Usuário alterado com sucesso.";
	} else {
		echo "Falha ao alterar usuário.";
	}
	include("rodape.php");
?>