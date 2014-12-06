    <?php
        include("topo.php");
        $somaPedido = 0;
        if (isset($_GET['a'])){
            if ($_GET['a'] == 1){
                $contador = 0;
                $qtd = $_POST['qtd'];
                foreach($_SESSION['carrinho'] as $id => $produto){
                    $_SESSION['carrinho'][$id]['qtd'] = $qtd[$contador];
                    $contador++;
                }
            }
        }

        if (isset($_GET['idp'])){
            unset($_SESSION['carrinho'][$_GET['idp']]);
        }
        $id = '';
        if (isset($_POST['id'])){
            $id = $_POST['id'];
        }

        if(!$_SESSION['carrinho']){
            $_SESSION['carrinho'] = '';
        }
        if ($id != ''){
            $sql = "SELECT * FROM produtos WHERE pro_id = $id";
            $dados = $mysqli->query($sql);
            $produto = $dados->fetch_assoc();
            $qtd = 1;

            $_SESSION['carrinho'][$id] = array('nome' => $produto['pro_titulo'], 
                                               'preco' => $produto['pro_valor'],
                                               'qtd' => $qtd);
        }
    ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3>Meu Carrinho</h3>
                            <?php
                                if (is_array($_SESSION['carrinho'])){
                            ?>
                            <div class="table-responsive">
                                <form action="?a=1" method="post">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Produto(s)
                                                </th>
                                                <th class="center">
                                                    Quantidade
                                                </th>
                                                <th class="center">
                                                    Valor Unitário
                                                </th>
                                                <th class="center">
                                                    Valor Total
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                if (is_array($_SESSION['carrinho'])){
                                                    foreach ($_SESSION['carrinho'] as $id => $produto) {
                                                        $totalProduto = $produto['qtd'] * $produto['preco'];
                                                        $somaPedido += $totalProduto;
                                            ?>
                                            <tr>
                                                <th><?php echo $produto['nome'];?></th>
                                                <td class="center">
                                                    <!--<button class="btn btn-default" type="button">-</button>
                                                    1
                                                    <button class="btn btn-default" type="button">+</button><br />-->
                                                    <input type="number" min="1" name="qtd[]" value="<?php echo $produto['qtd'];?>" class="form-control" />
                                                    <button class="btn btn-link" type="button" onclick="removerProdutoCarrinho(<?php echo $id;?>)">Retirar da Cesta</button>
                                                </td>
                                                <td class="center">
                                                    R$ <?php echo formatarValor($produto['preco']);?>
                                                </td>
                                                <td class="center">
                                                    R$ <?php echo formatarValor($totalProduto);?>
                                                </td>
                                            </tr>
                                            <?php
                                                    }
                                            ?>
                                            <tr>
                                                <td colspan="2"></td>
                                                <td>Total do Pedido</td>
                                                <td class="center">R$ <?php echo formatarValor($somaPedido);?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">
                                                    <button>Atualizar Carrinho</button>
                                                </td>
                                            </tr>
                                            <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <form role="form" method="post" name="calfrete" id="calfrete" onsubmit="return false">
                                        <label>Calcular Frete</label>
                                        <input type="text" id="cep_frete" name="cep_frete" class="form-control" required step="1" placeholder="Informe o CEP" maxlength="10">
                                        <button class="btn btn-default">Calcular</button><br />
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-5" id="retorno_frete"></div>
                            <br clear="all" />
                            <button class="btn btn-default" type="button" onclick="finalizarCompra()">
                            Finalizar compra</button>
                            <?php
                                } else {
                            ?>
                                <div>Carrinho vazio</div>
                            <?php
                                }
                            ?>
                        </div>                        
                    </div>
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
            <!-- /.row -->
        <?php
            include("rodape.php");
        ?>