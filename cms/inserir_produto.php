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
	$id = $mysqli->insert_id;
	$imagens = $_FILES['imagem'];
	if (count($imagens) > 0){
		for ($i=0; $i < count($imagens['name']); $i++) { 
			$ext = end(explode('.', $imagens['name'][$i]));
			$nomeImagem = "ft-$id-$i.$ext";
			move_uploaded_file($imagens['tmp_name'][$i], "img/".$nomeImagem);
			$sqlImagem = "INSERT INTO imagens (pro_id, img_nome) VALUES ($id, '$nomeImagem')";
			$mysqli->query($sqlImagem);
		}
	}

	if($gravou == true){
		$id = $mysqli->insert_id;
		echo "Produto gravado com sucesso.";
	} else {
		echo "Erro ao gravar produto.";
	}

	include("rodape.php");

?>