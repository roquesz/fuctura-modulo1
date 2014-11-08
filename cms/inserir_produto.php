<?php
	
	include("topo.php");

	$nome = $_POST['nome'];
	$nome = $mysqli->real_escape_string($nome);

	$descricao = $_POST['descricao'];
	$descricao = $mysqli->real_escape_string($descricao);

	$valor = $_POST['valor'];
	$valor = $mysqli->real_escape_string($valor);
	$valor = trim($valor);
	$valor = str_replace('.', '', $valor);
	$valor = str_replace(',', '.', $valor);
	$valor = str_replace(" ", "", $valor);

	$estoque = $_POST['estoque'];
	$estoque = $mysqli->real_escape_string($estoque);

	$categoria = $_POST['categoria'];
	$categoria = $mysqli->real_escape_string($categoria);

	$sql = "INSERT INTO produtos 
			(pro_titulo, pro_descricao, pro_valor, pro_estoque, cat_id)
			VALUES
			('$nome', '$descricao', $valor, $estoque, $categoria)";
	$gravou = $mysqli->query($sql);
	if($gravou == true){
		$id = $mysqli->insert_id;
		echo "Produto gravado com sucesso.";
	} else {
		echo "Erro ao gravar produto.";
	}

	include("rodape.php");

?>