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
                        foreach (Dados::getBySaques($idEscritorio) as $dados) {
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