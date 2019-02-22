<div class="table-responsive" data-toggle="lists" data-lists-values='["tables-row", "tables-first", "tables-last", "tables-handle"]'>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">
                <a href="#" class="text-muted sort" data-sort="tables-first">Nome</a>
                </th>
                <th scope="col">
                <a href="#" class="text-muted sort" data-sort="tables-last">CPF/CNPJ</a>
                </th>
                <th scope="col">
                <a href="#" class="text-muted sort" data-sort="tables-last">Indicador</a>
                </th>
                <th scope="col">
                <a href="#" class="text-muted sort" data-sort="tables-last">Pontuação</a>
                </th>
                <th scope="col">
                <a href="#" class="text-muted sort" data-sort="tables-last">Tipo Pessoa</a>
                </th>
                <th scope="col">
                <a href="#" class="text-muted sort" data-sort="tables-last">Tipo Acesso</a>
                </th>
                <th scope="col">
                <a href="#" class="text-muted sort" data-sort="tables-handle"><i class="fa fa-cogs"></i></a>
                </th>
            </tr>
        </thead>
        <tbody class="list">
            <?php 
            $read = new Read();
            $read->ExeRead('users');
            foreach($read->getResult() as $user){
                extract($user);
            ?>
            <tr>
                <td class="tables-first"><?php echo $nome ?></td>
                <td class="tables-last"><?php echo $cpf.''.$cnpj ?></td>
                <td class="tables-first"><?php echo $indicador ? $indicador : '-' ?></td>
                <td class="tables-first"><?php echo $pontuacao ?></td>
                <td class="tables-first"><?php echo ucfirst($tipo_pessoa) ?></td>
                <td class="tables-first"><?php echo Validation::getTipoUsario($tipo_user) ?></td>
                <td class="tables-handle">
                    <a href="<?php echo Url::getBase().'new-user/'.$id ?>" class="btn btn-outline-warning btn-sm"><i class="fa fa-edit"></i></a>
                    <button type="button" data-toggle="modal" data-target="#modal-del<?php echo $id ?>" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
            <!-- Modal -->
            <div class="modal fade" id="modal-del<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
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
                            <a href="<?php echo Url::getBase().'../controllers/delete.php?pag=vendedores&tb=users&ch=id&value='.$id ?>" class="btn btn-danger">SIM</a>
                        </div>
                    </div>
                </div>
            </div> 
            <?php } ?>
        </tbody>
    </table>
</div>