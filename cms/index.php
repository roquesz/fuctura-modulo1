    <?php
        include("topo.php");
        $sqlAdd = '';
        $busca = '';
        if (isset($_GET['cat_id']) && is_numeric($_GET['cat_id'])){
            $cat_id = $_GET['cat_id'];
            $sqlAdd = " AND cat_id = ".$cat_id;
        }
        if (isset($_GET['busca']) && !empty($_GET['busca'])){
            $busca = $_GET['busca'];
            $sqlAdd .= " AND pro_titulo LIKE '%$busca%'";
        }
    ?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Lista de produtos
                        <?php
                            if ($busca != ''){
                                echo '- busca por: '.$busca;
                            }
                        ?>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <?php
                    $sql = "select produtos.*, imagens.img_nome from produtos 
                            LEFT JOIN imagens ON produtos.pro_id = imagens.pro_id 
                            WHERE visivel = 1 ".$sqlAdd." 
                            GROUP BY produtos.pro_id
                            ORDER BY RAND() 
                             LIMIT 9";
                    $dados = $mysqli->query($sql);
                    while($produto = $dados->fetch_assoc()){
                        if ($produto['img_nome'] == ''){
                            $imagem = 'sem-imagem.png';
                        } else {
                            $imagem = $produto['img_nome'];
                        }
                ?>
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php echo $produto['pro_titulo'];?>
                        </div>
                        <div class="panel-body">
                            <a href="detalhe.php?id=<?php echo $produto['pro_id'];?>">
                                <div><img src="img/<?php echo $imagem;?>" width="300" /></div>
                                <p><?php echo substr(nl2br($produto['pro_descricao']), 0, 300);?>...</p>
                            </a>
                        </div>
                        <div class="panel-footer">
                            R$ <?php echo formatarValor($produto['pro_valor']);?>
                            <form action="carrinho.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $produto['pro_id'];?>" />
                                <button class="btn btn-danger">Comprar</button>
                            </form>
                        </div>
                    </div>
                </div>
            <!-- /.row -->
                    <?php
                        }
                        if ($dados->num_rows == 0){
                ?>                    
                            <div class="alert alert-warning">
                                Sem produtos para esta categoria.
                            </div>
                <?php
                        }
                    ?>                
            </div>
        <?php
            include("rodape.php");
        ?>