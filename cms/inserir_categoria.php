    <?php
        include("topo.php");
    	
    	$nome = $_POST['nome'];
    	$nome = $mysqli->real_escape_string($nome);

    	$sql = "INSERT INTO categorias (cat_titulo) VALUES ('$nome')";

    	$gravou = $mysqli->query($sql);
    	if($gravou == true){
    		echo "Categoria gravada com sucesso.";
    	} else {
    		echo "Erro ao gravar categoria.";
    	}

        include("rodape.php");
    ?>