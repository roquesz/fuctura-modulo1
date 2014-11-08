    <?php
        include("topo.php");
    	$id = $_GET['id'];
    	$nome = $_POST['nome'];
    	$nome = $mysqli->real_escape_string($nome);

    	$sql = "UPDATE categorias SET cat_titulo = '$nome' WHERE cat_id = $id";

    	$gravou = $mysqli->query($sql);
    	if($gravou == true){
    		echo "Categoria gravada com sucesso.";
    	} else {
    		echo "Erro ao gravar categoria.";
    	}

        include("rodape.php");
    ?>