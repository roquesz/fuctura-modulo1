<?php
        include("topo.php");
        $id = $_GET['id'];
        $sql = "SELECT * FROM categorias WHERE cat_id = $id";
        $dados = $mysqli->query($sql);
        $linha = $dados->fetch_assoc();
    ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3>Cadastro de Categoria</h3>
                            <div class="form-group">
                                <form role="form" method="post" name="addcatgoria" id="addcatgoria" action="alterar_categoria.php?id=<?php echo $id;?>">
                                    <label>Nome da Categoria</label>
                                    <input type="text" value="<?php echo $linha['cat_titulo'];?>" id="nome" name="nome" class="form-control" required placeholder="Informe o nome da Categoria" maxlength="">
                                    <button class="btn btn-default">Alterar</button><br />
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