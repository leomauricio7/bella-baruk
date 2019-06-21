    <!-- não fez a primeira compra -->
    <?php if (!Dados::verificaAdesão($idEscritorio)) { ?>
        <div class="row">
            <div class="col-12">
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading"><i class="fa fa-exclamation-triangle"></i> ATENÇÃO</h4>
                    <p>Para ativar seu cadastro efetue uma comprar no valor de RS 150,00 ou acima.</p>
                    <hr>
                    <p class="mb-0">Seu cadastro se encontra temporariamente <span class="badger badger-danger">inativo</span>.</p>
                </div>
            </div>
        </div>
        <!-- ja fez a primeira compra mas ja se passou 30 dias e não compro ativação -->
    <?php } elseif (!Dados::existePlanoAtivo($idEscritorio)) { ?>
        <div class="row">
            <div class="col-12">
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading"><i class="fa fa-exclamation-triangle"></i> ATENÇÃO!</h4>
                    <hr>
                    <p class="badge badge-pill" style="font-size: 15px">Seu plano de ativação expirou, compre outro plano para continuar ganhando as comissões da sua equipe.</p>
                </div>
            </div>
        </div>
        <!-- ja fez a primeira compra e possui plano ativo -->
    <?php } elseif (Dados::existePlanoAtivo($idEscritorio)) { ?>
        <div class="row">
            <div class="col-12">
                <div class="alert alert-ativacao" role="alert">
                    <h1 class="alert-heading"><i class="fa fa-exclamation-triangle"></i> Ola, <?php echo Validation::getIndicador($idEscritorio) ?> seu cadastrado se encontra <span class="badge badge-success">ATIVADO</span></h1>
                    <hr>
                    <p class="badge badge-pill badge-info" style="font-size: 15px">Seu plano de ativação vence em <?php echo Dados::diasRestantesAtivacao($idEscritorio) ?> dias.</p>
                </div>
            </div>
        </div>
    <?php } ?>

    <div class="row">
        <div class="col-12">
            <div class="alert alert-dark" role="alert">
                <p><i class="fa fa-exclamation-circle"></i> Seja bem vindo a área administratva do sistema, para indicar copie o link abaixo.</p>
                <hr>
                <h2 class="mb-0"><i class="fa fa-anchor">
                    </i><a href="https://bellabaruk.com.br/<?php echo Validation::getURI($idEscritorio) ?>" id="url"><span class="badge badge-pill badge-primary">https://bellabaruk.com.br/<?php echo Validation::getURI($idEscritorio) ?></span></a>
                    <button class="btn btn-sm btn-success" id="copiar" data-clipboard-text="" data-toggle="tooltip-copy" data-placement="top" title="Copiado com sucesso!">Copiar</button>
                </h2>
            </div>
        </div>
    </div>