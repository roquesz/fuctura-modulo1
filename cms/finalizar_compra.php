<?php

	include("topo.php");

	if(!$_SESSION['login']){
?>
		<script type="text/javascript">
			location.href="login.php";
		</script>
<?php
		exit();
	}
	$somaPedido = 0;
	$inputs = '';
	$i = 1;
	foreach ($_SESSION['carrinho'] as $id => $produto) {
		$sql = "INSERT INTO vendas (cli_id, pro_id, pro_valor, ved_qtd, ven_data)
				VALUES
				(".$_SESSION['login']['id'].", $id, ".$produto['preco'].", ".$produto['qtd'].", 
					'".date("Y-m-d")."')";
		$mysqli->query($sql);
		$somaPedido += $produto['preco'] * $produto['qtd'];
		$inputs .= '  <input type="hidden" name="item_id_'.$i.'" value="'.$id.'" />
					  <input type="hidden" name="item_descr_'.$i.'" value="'.$produto['nome'].'" />
					  <input type="hidden" name="item_quant_'.$i.'" value="'.$produto['qtd'].'" />
					  <input type="hidden" name="item_valor_'.$i.'" value="'.$produto['preco'].'" />
					  <input type="hidden" name="frete_'.$i.'" value="0" />
					  <input type="hidden" name="peso_'.$i.'" value="0" />
					  ';
		$i++;
	}
?>
		<div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="alert alert-success">
                            Compra efetuada com sucesso
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form target="pagseguro" method="post" action="https://pagseguro.uol.com.br/checkout/checkout.jhtml">
		  <input type="hidden" name="email_cobranca" value="suporte@lojamodelo.com.br" />
		  <input type="hidden" name="tipo" value="CP" />
		  <input type="hidden" name="moeda" value="BRL" />
		  <?php
		  	echo $inputs;
		  ?>
		  <input type="image" name="submit" src="https://p.simg.uol.com.br/out/pagseguro/i/botoes/pagamentos/99x61-comprar-assina.gif" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />
		</form>
<?php
	include("rodape.php");

?>
