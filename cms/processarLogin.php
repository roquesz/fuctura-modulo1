<?php

	include("topo.php");

	$email = $_POST['email'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM clientes 
			WHERE cli_login = '$email' 
			AND cli_senha = md5('$password')";
	$dados = $mysqli->query($sql);

	if($dados->num_rows > 0){
		$usuario = $dados->fetch_assoc();
		$_SESSION['login']['id'] = $usuario['cli_id'];
		$_SESSION['login']['nome'] = $usuario['cli_nome'];
		$_SESSION['login']['email'] = $usuario['cli_login'];
		$_SESSION['login']['perfil'] = $usuario['per_id'];
		if ($_SESSION['login']['perfil'] == 1){
?>
			<script type="text/javascript">
				location.href="lista_produtos.php";
			</script>
<?php
		} else {
?>
			<script type="text/javascript">
				location.href="finalizar_compra.php";
			</script>
<?php
		}
	} else {
		echo "Dados inválidos";
	}
?>


<?php

	include("rodape.php");

?>