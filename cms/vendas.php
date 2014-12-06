<?php

	include("topo.php");
    if ($_SESSION['login']['perfil'] != 1){
    ?>
        <script type="text/javascript">
            location.href='login.php';
        </script>
    <?php
            exit();
        }

        $offset = 3;
        $limit = 0;

        if ($_GET['limit']){
        	$limit = $_GET['limit'] * $offset;
        }

        $sql = "SELECT clientes.cli_nome, vendas.ven_data, 
        		sum( vendas.pro_valor * vendas.ved_qtd ) AS valor_venda
				FROM vendas
				INNER JOIN clientes ON vendas.cli_id = clientes.cli_id
				GROUP BY clientes.cli_nome, vendas.ven_data
				ORDER BY vendas.ven_data DESC";
		$total = $mysqli->query($sql);
		
        $sql = "SELECT clientes.cli_nome, vendas.ven_data, 
        		sum( vendas.pro_valor * vendas.ved_qtd ) AS valor_venda
				FROM vendas
				INNER JOIN clientes ON vendas.cli_id = clientes.cli_id
				GROUP BY clientes.cli_nome, vendas.ven_data
				ORDER BY vendas.ven_data DESC
				LIMIT $limit, $offset";

		$dados = $mysqli->query($sql);
		
		$paginacao = ceil($total->num_rows / $offset);
?>
			<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Vendas
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Cliente</th>
                                            <th>Data Compra</th>
                                            <th>Valor</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        while($linha = $dados->fetch_assoc()){
                                    ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $linha['cli_nome'];?></td>
                                            <td><?php echo formatarData($linha['ven_data']);?></td>
                                            <td>
                                                R$ <?php echo formatarValor($linha['valor_venda']);?>
                                            </td>
                                            <td>
                                            	<a href="detalhe_venda.php?data=<?php echo $linha['ven_data'];?>">Detalhe</a>
                                            </td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                        </tbody>
                                </table>
                                <ul class="pagination">
                                <?php
                                	for($pg = 1; $pg <= $paginacao; $pg++){
                                ?>
                                	<li>
                                		<a href="?limit=<?php echo $pg - 1;?>"><?php echo $pg;?></a>
                                	</li>
                                <?php
                                	}
                                ?>
                            	</ul>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
<?php

	include("rodape.php");

?>