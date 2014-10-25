    <?php
        include("topo.php");
    ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3>Cadastro de Produto</h3>
                            <div class="form-group">
                                <form role="form" method="post" name="addcatgoria" id="addcatgoria" action="inserir_categoria.php">
                                    <label>Nome do Produto</label>
                                    <input type="text" id="nome" name="nome" class="form-control" required placeholder="Informe o nome da Categoria" maxlength="">
                                    <label>Descrição</label>
                                    <textarea class="form-control" name="descricao" id="descricao" required rows="3"></textarea>
                                    <label>Valor</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">R$</span>
                                        <input type="text" class="form-control" required>
                                    </div>
                                    <label>Estoque</label>
                                    <input type="text" id="nome" name="nome" class="form-control" required placeholder="Informe o nome da Categoria" maxlength="">
                                    <div class="form-group">
                                        <label>Categoria</label>
                                        <select class="form-control"required>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
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