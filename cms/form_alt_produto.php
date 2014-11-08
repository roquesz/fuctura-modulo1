    <?php
        include("topo.php");
        $sql = "SELECT * FROM categorias";
        $dados = $mysqli->query($sql);
    ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3>Cadastro de Produto</h3>
                            <div class="form-group">
                                <form role="form" method="post" name="addcatgoria" id="addcatgoria" action="inserir_produto.php">
                                    <label>Nome do Produto</label>
                                    <input type="text" id="nome" name="nome" class="form-control" required placeholder="Informe o nome do Produto" maxlength="">
                                    <label>Descrição</label>
                                    <textarea class="form-control" name="descricao" id="descricao" required rows="3"></textarea>
                                    <label>Valor</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">R$</span>
                                        <input type="text" name="valor" id="valor" class="form-control" required>
                                    </div>
                                    <label>Estoque</label>
                                    <input type="text" id="estoque" name="estoque" class="form-control" required placeholder="" maxlength="">
                                    <div class="form-group">
                                        <label>Categoria</label>
                                        <select class="form-control" name="categoria" required>
                                            <option value="">Selecione a Categoria</option>
                                            <?php
                                                while($linha = $dados->fetch_assoc()){
                                            ?>
                                            <option value="<?php echo $linha['cat_id'];?>">
                                                <?php echo $linha['cat_titulo'];?>
                                            </option>
                                            <?php
                                                }
                                            ?>
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