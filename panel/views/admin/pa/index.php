<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <div class="header-body">
                    <h6 class="header-pretitle">
                        PA
                    </h6>
                    <h1 class="header-title">
                        Ponto de apoio
                    </h1>
                </div>
                <div class="col-auto">
                    <a href="<?php echo Url::getBase() . 'pa/create' ?>" class="btn btn-md btn-dark float-right">
                        <i class="fa fa-user-plus"></i> Cadastrar novo PA
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-condensed table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nome/Razão Social</th>
                                    <th scope="col">Login</th>
                                    <th scope="col">Telefone</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">CPF/CNPJ</th>
                                    <th scope="col">Situação</th>
                                    <th scope="col"><i class="fa fa-cogs"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $read = new Read();
                                $read->ExeRead('users', 'where tipo_user = 4');
                                foreach ($read->getResult() as $user) {
                                    extract($user);
                                    ?>
                                    <tr>
                                        <th scope="row" class="tables-row"><?php echo $id ?></th>
                                        <td class="tables-first"><?php echo $nome ?></td>
                                        <td class="tables-first"><?php echo $slug ?></td>
                                        <td class="tables-first"><?php echo $telefone ?></td>
                                        <td class="tables-first"><?php echo $email ?></td>
                                        <td class="tables-first"><?php echo  $cpf . '' . $cnpj ?></td>
                                        <td class="tables-first"><span class="badge badge-success"><?php echo $status ?></span></td>
                                        <td class="tables-first">
                                            <button type="button" data-toggle="modal" data-target="#modal-del<?php echo $id ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <!-- Modal -->
                                    <div class="modal fade" id="modal-del<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-sm" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-exclamation-triangle"></i> ATENÇÃO</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    <div class="header">
                                                        <div class="header-body">
                                                            <h4 class="header-pretitle text-center">
                                                                Tem certeza que deseja remover esse registro?
                                                            </h4>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                                                    <a href="<?php echo Url::getBase() . '../controllers/delete.php?pag=cd&tb=users&ch=id&value=' . $id ?>" class="btn btn-danger">SIM</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>