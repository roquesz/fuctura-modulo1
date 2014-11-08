    <?php
        include("topo.php");
        if(isset($_GET['id']) && isset($_GET['acao'])){
            $id = $_GET['id'];
            $acao = $_GET['acao'];
            $sql = "UPDATE produtos SET visivel = $acao WHERE pro_id = $id";
            $mysqli->query($sql);
        }

        $sql = "SELECT * FROM produtos";
        $dados = $mysqli->query($sql);
    ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Lista de Produtos
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <a href="form_cad_produto.php">Incluir Produto</a>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nome do Produto</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        while($linha = $dados->fetch_assoc()){
                                    ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $linha['pro_id'];?></td>
                                            <td><?php echo $linha['pro_titulo'];?></td>
                                            <td>
                                                <a href="form_alt_produto.php?id=<?php echo $linha['pro_id'];?>">Alterar</a>
                                                <?php
                                                    if ($linha['visivel'] == 1){
                                                ?>
                                                <a href="?id=<?php echo $linha['pro_id'];?>&acao=0">Inativar</a>
                                                <?php
                                                    } else {
                                                ?>
                                                <a href="?id=<?php echo $linha['pro_id'];?>&acao=1">Ativar</a>                                                
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