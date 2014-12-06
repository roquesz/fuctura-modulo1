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

        $data = $_GET['data'];
        $cli_id = $_GET['cli_id'];

        $sql = "SELECT clientes.cli_nome, vendas.ven_data, 
        		vendas.ved_qtd, produtos.pro_titulo
				FROM vendas
				INNER JOIN clientes ON vendas.cli_id = clientes.cli_id
				INNER JOIN produtos ON produtos.pro_id = vendas.pro_id
				WHERE clientes.cli_id = $cli_id
				AND vendas.ven_data = '$data'";

		$dados = $mysqli->query($sql);
?>
			<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Detalhe Vendas
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Cliente</th>
                                            <th>Data Compra</th>
                                            <th>QTD</th>
                                            <th>Produto</th>
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
                                                <?php echo $linha['ved_qtd'];?>
                                            </td>
                                            <td>
                                            	<?php echo $linha['pro_titulo'];?>
                                            </td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                        </tbody>
                                </table>
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