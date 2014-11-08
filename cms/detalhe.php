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
        
        $sql = "SELECT * FROM produtos WHERE pro_id = ".$id;
        $dados = $mysqli->query($sql);
        $produto = $dados->fetch_assoc();
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
                                        <img src="http://iacom.s8.com.br/produtos/01/00/item/118220/7/118220789G1.jpg" />
                                    </div>
                                    
                                    <div>
                                        <?php echo $produto['pro_descricao'];?>
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
                                    <h4>Home Tab</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div>
                                <div class="tab-pane fade" id="produtos">
                                    <h4></h4>
                                    <?php
                                        $sql = "SELECT * FROM produtos WHERE cat_id = ".$produto['cat_id']." AND pro_id <> ".$id." ORDER BY RAND() LIMIT 3";
                                        $dados = $mysqli->query($sql);
                                        while($produto = $dados->fetch_assoc()){
                    
                                    ?>
                                    <div class="col-lg-4">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <?php echo $produto['pro_titulo'];?>
                                            </div>
                                            <div class="panel-body">
                                                <a href="detalhe.php?id=<?php echo $produto['pro_id'];?>">
                                                    <div><img src="http://iacom.s8.com.br/produtos/01/00/item/118220/7/118220789G1.jpg" /></div>
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