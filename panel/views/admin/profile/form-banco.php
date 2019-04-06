<!--endereço-->
<div class="form-row">
    <div class="col-12 col-md-6 mb-3">
        <label for="validationServer03">Titular</label>
        <input type="text" class="form-control"  name="titular" value="<?php echo isset($titular) ? $titular : '' ?>" disabled required>
    </div>
    <div class="col-12 col-md-6 mb-3">
        <label for="validationServer04">CPF Titular</label>
        <input type="text" class="form-control" data-mask="000.000.000-00" name="cpf_titular" value="<?php echo isset($cpf_titular) ? $cpf_titular : '' ?>" disabled required>
    </div>
</div>
<div class="form-row">
    <div class="col-12 col-md-3 mb-3">
        <label for="validationServer03">Banco</label>
        <input type="text" class="form-control" name="banco" value="<?php echo isset($banco) ? $banco : '' ?>" disabled required>
    </div>
    <div class="col-12 col-md-2 mb-3">
        <label for="validationServer04">Agência</label>
        <input type="number" class="form-control" name="agencia"  value="<?php echo isset($agencia) ? $agencia : '' ?>" disabled required>
    </div>
    <div class="col-12 col-md-3 mb-3">
        <label for="validationServer04">Tipo da Conta</label>
        <input type="text" class="form-control" name="tipo_conta" value="<?php echo isset($tipo_conta) ? $tipo_conta : '' ?>" disabled required>
    </div>
    <div class="col-12 col-md-4 mb-3">
        <label for="validationServer04">Conta</label>
        <input type="text" class="form-control" name="conta" value="<?php echo isset($conta) ? $conta : '' ?>" disabled required>
    </div>
</div>