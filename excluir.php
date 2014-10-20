<?php
	include("topo.php");
	$id = $_GET['id'];

	$sql = "DELETE FROM usuarios WHERE id = $id";

	$excluir = mysql_query($sql);
	if($excluir == true){
		echo "Usuário removido com sucesso.";
	} else {
		echo "Falha ao remover usuário.";
	}
	include("rodape.php");
?>