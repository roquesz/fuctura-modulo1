    <?php
        include("topo.php");
        if(isset($_GET['id']) && isset($_GET['acao'])){
            $id = $_GET['id'];
            $acao = $_GET['acao'];
            $sql = "UPDATE categorias SET visivel = $acao WHERE cat_id = $id";
            $mysqli->query($sql);
        }

        $sql = "SELECT * FROM categorias";
        $dados = $mysqli->query($sql);
    ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Lista de Categorias
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <a href="form_cad_categoria.php">Incluir Categoria</a>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nome da Categoria</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        while($linha = $dados->fetch_assoc()){
                                    ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $linha['cat_id'];?></td>
                                            <td><?php echo $linha['cat_titulo'];?></td>
                                            <td>
                                                <a href="form_alt_categoria.php?id=<?php echo $linha['cat_id'];?>">Alterar</a>
                                                <?php
                                                    if ($linha['visivel'] == 1){
                                                ?>
                                                <a href="?id=<?php echo $linha['cat_id'];?>&acao=0">Inativar</a>
                                                <?php
                                                    } else {
                                                ?>
                                                <a href="?id=<?php echo $linha['cat_id'];?>&acao=1">Ativar</a>                                                
                                                <?php
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                        </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
            <!-- /.row -->
        <?php
            include("rodape.php");
        ?>