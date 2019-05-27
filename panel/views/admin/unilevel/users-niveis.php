<br>
<div class="table-responsive" data-toggle="lists" data-lists-values='["tables-row", "tables-user", "tables-valor", "tables-data"]'>
    <table class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">
                    <a href="#" class="text-muted sort" data-sort="tables-user">Nivel</a>
                </th>
                <th scope="col">
                    <a href="#" class="text-muted sort" data-sort="tables-valor">Total</a>
                </th>
                <th scope="col">
                    <a href="#" class="text-muted sort" data-sort="tables-data">Comissões</a>
                </th>
            </tr>
        </thead>
        <tbody class="list">
            <?php
            $totalComissao = 0;
            foreach (Dados::getComissaoNiveis($_SESSION['idUser']) as $dados) {
                extract($dados);
                $totalComissao += $comissao;
                ?>
                <tr>
                    <td class="tables-user"><?php echo $nivel ?>º Nível</td>
                    <td class="tables-valor">
                        <i class="fa fa-user-circle"></i> <?php echo $total ?>
                    </td>
                    <td class="tables-data"><span class="badge badge-primary"><i class="fa fa-money-check-alt"></i> R$ <?php echo $comissao ?></span></td>
                </tr>
            <?php
        }
        ?>
            <tr scope="col">
                <th colspan="2">TOTAL DE COMISSÕES</th>
                <th colspan="1"><span class="badge badge-primary"><i class="fa fa-money-check-alt"></i> R$ <?php echo number_format($totalComissao, 2, ",", "") ?></span></th>
            </tr>
        </tbody>
    </table>
</div>