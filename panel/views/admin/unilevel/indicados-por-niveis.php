<div class="card-body">
    <div class="table-responsive" data-toggle="lists" data-lists-values='["tables-row", "tables-user", "tables-valor", "tables-data"]'>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">
                        <a href="#" class="text-muted sort" data-sort="tables-row">#</a>
                    </th>
                    <th scope="col">
                        <a href="#" class="text-muted sort" data-sort="tables-user">Nome</a>
                    </th>
                    <th scope="col">
                        <a href="#" class="text-muted sort" data-sort="tables-valor">Login</a>
                    </th>
                    <th scope="col">
                        <a href="#" class="text-muted sort" data-sort="tables-data">Indicador</a>
                    </th>
                    <th scope="col">
                        <a href="#" class="text-muted sort" data-sort="tables-data">Email</a>
                    </th>
                    <th scope="col">
                        <a href="#" class="text-muted sort" data-sort="tables-data">Criado em</a>
                    </th>
                    <th><i class="fa fa-cogs"></i></th>

                </tr>
            </thead>
            <tbody class="list">
                <?php
                $ni = Url::getURL(3) != '' ? Url::getURL(3) : 1;
                $total = 0;

                foreach (Dados::getUsersNiveis($_SESSION['idUser'], $ni) as $dados) {
                    extract($dados);
                    ?>
                    <tr>
                        <th scope="row" class="tables-row"><?php echo $id ?></th>
                        <td class="tables-user"><?php echo $nome ?></td>
                        <td class="tables-user"><?php echo $slug ?></td>
                        <td class="tables-user"><?php echo $indicador ?></td>
                        <td class="tables-user"><?php echo $email ?></td>
                        <td class="tables-data"><?php echo date('d/m/Y', strtotime($created)) ?></td>
                        <td class="tables-handle">
                            <button
                            alt="modal-indicado-nivel-<?php echo $ni.'-'.$id ?>"
                            class="btn btn-primary btn-sm exibe-dados-user-nivel"><i class="fa fa-eye"></i></button>
                        </td>
                    </tr>
                    <tr id="modal-indicado-nivel-<?php echo $ni.'-'.$id ?>" style="display:none">
                        <td colspan="8">
                            <?php 
                            if(Url::getURL(1) == 'home' || Url::getURL(1) == 'indicados' || Url::getURL(1) == ''){
                                include 'view-indicado-nivel.php';
                            }
                            ?>
                        </td>
                    </tr>
                <?php 
            } ?>
            </tbody>
        </table>
    </div>
</div>