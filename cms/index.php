    <?php
        include("topo.php");
    ?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Lista de produtos</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Título do produto
                        </div>
                        <div class="panel-body">
                            <a href="detalhe.php?id=">
                                <div><img src="http://iacom.s8.com.br/produtos/01/00/item/118220/7/118220789G1.jpg" /></div>
                                <p>Descrição do produto</p>
                            </a>
                        </div>
                        <div class="panel-footer">
                            R$ 100,00
                            <form action="carrinho.php" method="post">
                                <input type="hidden" name="id" value="" />
                                <button class="btn btn-danger">Comprar</button>
                            </form>
                        </div>
                    </div>
                </div>                
            </div>
            <!-- /.row -->
        <?php
            include("rodape.php");
        ?>