<div class="header">
  <div class="header-body">

    <h6 class="header-pretitle">
      Indicados
    </h6>
    
    <h1 class="header-title">
     Diretamente
    </h1>

  </div>
</div>
<div class="table-responsive" data-toggle="lists" data-lists-values='["tables-row", "tables-first", "tables-last", "tables-handle"]'>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">
                    <a href="#" class="text-muted sort" data-sort="tables-row">ID</a>
                </th>
                <th scope="col">
                    <a href="#" class="text-muted sort" data-sort="tables-first">Nome</a>
                </th>
                <th scope="col">
                    <a href="#" class="text-muted sort" data-sort="tables-last">Status</a>
                </th>
                <th scope="col">
                    <a href="#" class="text-muted sort" data-sort="tables-last">Data do cadastro</a>
                </th>
                <th scope="col">
                    <a href="#" class="text-muted sort" data-sort="tables-handle"><i class="fa fa-cogs"></i></a>
                </th>
            </tr>
        </thead>
        <tbody class="list">
            <?php 
            $read = new Read();
            $read->ExeRead('users','where indicador = '.$_SESSION['idUser']);
            foreach($read->getResult() as $user){
                extract($user);
            ?>
            <tr>
                <th scope="row" class="tables-row"><?php echo $id ?></th>
                <td class="tables-first"><?php echo $nome ?></td>
                <td class="tables-last">
                    <?php 
                    $st = ucfirst($status);
                    echo 
                    $status  == 'inativo' ? 
                    "<span class='badge badge-soft-danger'>$st</span>" :
                    "<span class='badge badge-soft-success'>$st</span>"
                    ?>
                </td>
                <td class="tables-last"><?php echo date('d/m/Y', strtotime($created)) ?></td>
                <td class="tables-handle">
                    <button type="button" data-toggle="modal" data-target="#modal-view<?php echo $id ?>" class="btn btn-outline-primary btn-sm"><i class="fa fa-eye"></i></button>
                </td>
            </tr>
            
            <div class="modal fade" id="modal-view<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-exclamation-triangle"></i> ATENÇÃO</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-center">
                            
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </tbody>
    </table>
</div>