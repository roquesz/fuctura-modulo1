            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <?php
                            if ($_SESSION['login']['perfil'] == 1){
                        ?>
                            <li>
                                <a href="lista_produtos.php">Produtos</a>
                            </li>  
                            <li>
                                <a href="lista_categorias.php">Categorias</a>
                            </li>  
                            <li>
                                <a href="vendas.php">Vendas</a>
                            </li>  
                        <?php
                            } else {
                        ?>
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <form action="index.php" method="get">
                                        <input type="text" class="form-control" name="busca" placeholder="buscar produtos">
                                        <span class="input-group-btn">
                                        <button class="btn btn-default">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </form>
                                </span>
                                </div>
                                <!-- /input-group -->
                            </li>
                            <?php
                                $sql = "SELECT * FROM categorias WHERE visivel = 1";
                                $dados = $mysqli->query($sql);
                                while($linha = $dados->fetch_assoc()){
                            ?>
                            <li>
                                <a href="index.php?cat_id=<?php echo $linha['cat_id'];?>"><i class="fa fa-dashboard fa-fw"></i> <?php echo $linha['cat_titulo'];?></a>
                            </li>
                            <?php
                                }
                            }
                        ?>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>