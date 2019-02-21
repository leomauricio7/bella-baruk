<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>ATENÇÃO:</strong>
    <?php 
    if ($update->getRowCount() === 0):
        echo 'Nenhuma';
    else: 
        echo $update->getRowCount();
    endif
    ?>
    alteração realizada. Aguarde... redirecionando em <b id="show-time">2</b> segundos.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>