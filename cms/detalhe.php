    <?php
        include("topo.php");
        $id = $_GET['id'];
        if (!is_numeric($id)){
    ?>
            <script type="text/javascript">
                location.href = 'index.php';
            </script>
    <?php
            exit();
        }
        
        $sql = "SELECT produtos.*, imagens.img_nome
                FROM produtos 
                LEFT JOIN imagens ON produtos.pro_id = imagens.pro_id 
                WHERE produtos.pro_id = $id GROUP BY produtos.pro_id";
        $dados = $mysqli->query($sql);
        $produto = $dados->fetch_assoc();
        if ($produto['img_nome'] == ''){
            $imagem = 'sem-imagem.png';
        } else {
            $imagem = $produto['img_nome'];
        }
    ?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $produto['pro_titulo'];?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- .panel-heading -->
                        <div class="panel-body">
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="panel-body">                                        
                                    <div class="box-img">
                                        <img src="img/<?php echo $imagem;?>" width="300" />
                                    </div>
                                    
                                    <div>
                                        <?php echo nl2br($produto['pro_descricao']);?>
                                    </div>
                                    <br class="clear" />
                                    <br class="clear" />
                                    <form action="carrinho.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $produto['pro_id'];?>" />
                                        <div class="panel-footer">
                                            R$ <?php echo $produto['pro_valor'];?>                                        
                                            <button class="btn btn-danger">Comprar</button>
                                        </div>
                                    </form>
                                </div>                       
                            </div>
                        </div>
                        <div class="panel-heading">
                            Informações do Produto
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#galeria" data-toggle="tab">Galeria de Imagens</a>
                                </li>
                                <li>
                                    <a href="#produtos" data-toggle="tab">Produtos da Categoria</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="galeria">
                                    <?php
                                     $sql = "select * from imagens WHERE pro_id = $id
                                                ORDER BY RAND() 
                                                 LIMIT 9";
                                        $dados = $mysqli->query($sql);
                                        while($imagens = $dados->fetch_assoc()){
                                            if ($imagens['img_nome'] == ''){
                                                $imagem = 'sem-imagem.png';
                                            } else {
                                                $imagem = $imagens['img_nome'];
                                            }
                                    ?>      
                                            <div class="col-lg-1">
                                                <div class="panel panel-default">
                                                    <div>
                                                        <a href="javascript:;" onclick="alteraImagem('<?php echo $imagem;?>')">
                                                            <img src="img/<?php echo $imagem;?>" width="50" />
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php
                                        }
                                    ?>
                                </div>
                                <div class="tab-pane fade" id="produtos">
                                    <h4></h4>
                                    <?php
                                        $sql = "SELECT * FROM produtos WHERE cat_id = ".$produto['cat_id']." AND pro_id <> ".$id." ORDER BY RAND() LIMIT 3";
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
                                                    <div><img src="img/<?php echo $imagem;?>" witdh="150" /></div>
                                                    <p><?php echo $produto['pro_descricao'];?></p>
                                                </a>
                                            </div>
                                            <div class="panel-footer">
                                                R$ <?php echo $produto['pro_valor'];?>
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
                                        ?>
                                </div>
                            </div>
                        
                        <!-- .panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
            <!-- /.row -->
        <?php
            include("rodape.php");
        ?>
        <script type="text/javascript">
            function alteraImagem(imagem)
            {
                $(".box-img").find("img").attr("src", "img/"+imagem);
            }
        </script>