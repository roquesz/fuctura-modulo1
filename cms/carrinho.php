    <?php
        include("topo.php");
    ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3>Meu Carrinho</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>
                                                Produto(s)
                                            </th>
                                            <th class="center">
                                                Quantidade
                                            </th>
                                            <th class="center">
                                                Valor Unitário
                                            </th>
                                            <th class="center">
                                                Valor Total
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Nome do Produto</th>
                                            <td class="center">
                                                <button class="btn btn-default" type="button">-</button>
                                                1
                                                <button class="btn btn-default" type="button">+</button><br />
                                                <button class="btn btn-link" type="button">Retirar da Cesta</button>
                                            </td>
                                            <td class="center">
                                                R$ 100,00
                                            </td>
                                            <td class="center">
                                                R$ 100,00
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <form role="form">
                                        <label>Calcular Frete</label>
                                        <input type="number" class="form-control" required pattern="[0-9]{5}-[0-9]{3}" step="1" placeholder="Informe o CEP" maxlength="8">
                                        <button class="btn btn-default">Calcular</button><br />
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