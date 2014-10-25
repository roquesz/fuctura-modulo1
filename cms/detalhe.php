    <?php
        include("topo.php");
    ?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Nome do Produto</h1>
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
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                    </div>
                                    <br class="clear" />
                                    <br class="clear" />
                                    <form action="carrinho.php" method="post">
                                        <input type="hidden" name="id" value="" />
                                        <div class="panel-footer">
                                            R$ 100,00                                        
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
                                    <h4>Profile Tab</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
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