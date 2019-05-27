<div class="modal fade" id="modal-view<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-info"></i> <?php echo $nome . ' ID: ' . $id ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <!-- Avatar -->
                            <a href="profile-posts.html" class="avatar avatar-lg">
                                <img src="<?php echo $avatar != null ? Url::getBase() . 'docs/users/' . $id . '/' . $avatar : Url::getBase() . '../assets/img/icons/user.png' ?>" alt="..." class="avatar-img rounded-circle">
                            </a>
                        </div>
                        <div class="col ml-n2">
                            <!-- Title -->
                            <h4 class="card-title mb-1">
                                Nome: <?php echo $nome ?>
                            </h4>
                            <!-- Text -->
                            <p class="card-text small text-muted mb-1">
                                E-mail: <?php echo $email ?>
                            </p>
                            <p class="card-text small text-muted mb-1">
                                Login: <?php echo $slug ?>
                            </p>
                            <p class="card-text small text-muted mb-1">
                                ID: <?php echo $id ?>
                            </p>
                            <!-- Status -->
                            <p class="card-text small">
                                Status: <?php
                                        $st = ucfirst($status);
                                        echo
                                            $status  == 'inativo' ?
                                                "<span class='badge badge-soft-danger'>$st</span>" : "<span class='badge badge-soft-success'>$st</span>"
                                        ?>
                            </p>
                        </div>
                    </div> <!-- / .row -->
                    <!-- comissoes individual -->
                    <br>
                    <div class="table-responsive" data-toggle="lists" data-lists-values='["tables-row", "tables-user", "tables-valor", "tables-data"]'>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        <a href="#" class="text-muted sort" data-sort="tables-row">#</a>
                                    </th>
                                    <th scope="col">
                                        <a href="#" class="text-muted sort" data-sort="tables-user">Nome</a>
                                    </th>
                                    <th scope="col">
                                        <a href="#" class="text-muted sort" data-sort="tables-valor">Valor</a>
                                    </th>
                                    <th scope="col">
                                        <a href="#" class="text-muted sort" data-sort="tables-data">Data</a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                <?php
                                $idComprador = $id;
                                $total = 0;
                                foreach (Dados::getComissoesComprador($_SESSION['idUser'], $id) as $dados) {
                                    extract($dados);
                                    $total += $valor;
                                    ?>
                                    <tr>
                                        <th scope="row" class="tables-row"><?php echo $id ?></th>
                                        <td class="tables-user"><?php echo Validation::getIndicador($id_user_comprador) ?></td>
                                        <td class="tables-valor"><span class="badge badge-success"><i class="fa fa-money-check-alt"></i>R$ <?php echo number_format($valor, 2, ",", "") ?></span></td>
                                        <td class="tables-data"><?php echo date('d/m/Y', strtotime($created)) ?></td>
                                    </tr>
                                <?php } ?>
                                <tr scope="col">
                                    <th colspan="3" scope="col">TOTAL DE COMISSÕES</th>
                                    <th colspan="1"><span class="badge badge-info"><i class="fa fa-money-check-alt"></i>R$ <?php echo Dados::getComissaoComprador($_SESSION['idUser'], $idComprador) ?></span></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>