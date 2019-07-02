<div class="col">
    <div class="card">
        <div class="card-header">
            <div class="header-body">
                <div class="row align-items-center">
                    <div class="col">
                        <h6 class="header-pretitle">
                            Saques
                        </h6>
                        <h1 class="header-title">
                            Meus Saques
                        </h1>
                    </div>
                    <div class="col-auto">
                        <?php
                        if (Unilevel::isValidBonus($_SESSION['idUser'])) {
                            ?>
                            <!-- Button -->
                            <a href="#!" data-toggle="modal" data-target="#modal-saque" class="btn btn-sm btn-white">
                                <i class="fa fa-money-check-alt"></i> Solicitar Saque
                            </a>
                        <?php } else { ?>
                            <br><div class="alert alert-danger" role="alert">
                                <strong>Atenção!</strong> Para poder ter acesso a saques, você precisa possuir, no minimo 2 usuários ativos na sua rede unilevel.
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-condensed table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Usuário</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Data</th>
                            <th scope="col">Situação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach (Dados::getBySaques($_SESSION['idUser']) as $dados) {
                            extract($dados);
                            ?>
                            <tr>
                                <th scope="row"><?php echo $id ?></th>
                                <td><?php echo $user ?></td>
                                <td><?php echo $valor ?></td>
                                <td><?php echo $data ?></td>
                                <td>
                                    <span class="badge badge-pill badge-<?php echo $status == 'em analise' ? 'warning' : $status == 'reprovado' ? 'danger' : 'success' ?>"><?php echo $status ?></span>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>