<!-- Modal -->
<div class="modal fade" id="modal-new-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-info-circle"></i> Cadastro de novo cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center" id="loading-new-user" style="display:none">
                    <img width="100" class="rounded mx-auto d-block" src="https://html5.gamedistribution.com/dab8cc554c7144a9805e30654637a695/images/_preloader.gif?1534497314431" alt="">
                </div>
                <form id="modal-form-new-user">
                    <input type="hidden" name="tipo_user" value="5">
                    <div class="form-group row">
                        <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-rounded" id="nome" name="nome" placeholder="Nome e sobrenome" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cpf" class="col-sm-2 col-form-label">CPF</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-rounded" id="cpf" name="cpf" data-mask="000.000.000-00" placeholder="cpf" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control form-control-rounded" id="email" name="email" placeholder="email@example.com" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="telefone" class="col-sm-2 col-form-label">Telefone</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-rounded" id="telefone" name="telefone" data-mask="(00) 00000-0000" placeholder="Telefone" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="slug" class="col-sm-2 col-form-label">Login</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-rounded" id="slug" name="slug" placeholder="Login" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="senha" class="col-sm-2 col-form-label">Senha</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control form-control-rounded" id="senha" placeholder="Senha" name="senha" placeholder="Senha" required>
                        </div>
                    </div>
                    <button class="btn btn-danger btn-sm"><i class="fa fa-save"></i> Finalizar Cadastro</button>
                </form>
            </div>
        </div>
    </div>
</div>