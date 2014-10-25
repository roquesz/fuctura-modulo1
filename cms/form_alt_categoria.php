    <?php
        include("topo.php");
    ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3>Cadastro de Categoria</h3>
                            <div class="form-group">
                                <form role="form" method="post" name="addcatgoria" id="addcatgoria" action="inserir_categoria.php">
                                    <label>Nome da Categoria</label>
                                    <input type="text" id="nome" name="nome" class="form-control" required placeholder="Informe o nome da Categoria" maxlength="">
                                    <button class="btn btn-default">Cadastrar</button><br />
                                </form>
                            </div>
                            </div>
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