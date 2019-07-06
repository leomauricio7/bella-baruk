$(function () {

    function getBaseUrl() {
        // Nome do host
        var hostName = location.hostname;
        if (hostName === "localhost") {
            // Endereço após o domínio do site
            pathname = window.location.pathname;
            // Separa o pathname com uma barra transformando o resultado em um array
            splitPath = pathname.split('/');
            // Obtém o segundo valor do array, que é o nome da pasta do servidor local
            path = splitPath[1];
            baseUrl = "http://" + hostName + "/" + path;
        } else {
            baseUrl = "https://" + hostName;
        }
        return baseUrl;
    }

    function startSession() {
        $.ajax({
            type: 'POST',
            url: getBaseUrl() + '/controllers/class/carrinho.php',
            data: 'type=1',
            dataType: "json",
        }).done(function (res) {
            if (res.status == 200 || res.status == 409) {
                $('#icon-carrinho').removeClass('fa-shopping-cart');
                $('#icon-carrinho').addClass('fa-cart-plus');
            }
            console.log('sessão iniciada');
        }).fail(function (xhr, desc, err) {
            alert('Uups! Ocorreu algum erro!');
            console.log(xhr);
            console.log("Detalhes: " + desc + "nErro:" + err);
        }).always(function () {
            console.log('closed');
        });
    }

    function addProduct(idProduct) {
        startSession();
        $.ajax({
            type: 'POST',
            url: getBaseUrl() + '/controllers/class/carrinho.php',
            data: 'type=2&idProduct=' + idProduct,
            dataType: "json",
        }).done(function (res) {
            $("#loading").delay(100).fadeOut('slow');
            $('#msg-modal').text(res.msg);
            $('#modal-product').modal({
                show: true,
                keyboard: false
            });
            console.log('produto adicionado', 'total', res.carrinho);
        }).fail(function (xhr, desc, err) {
            alert('Uups! Ocorreu algum erro!');
            console.log(xhr);
            console.log("Detalhes: " + desc + "nErro:" + err);
        }).always(function () {
            console.log('closed');
        });
    }

    function destroySession() {
        $.ajax({
            type: 'POST',
            url: getBaseUrl() + '/controllers/class/carrinho.php',
            data: 'type=4',
            dataType: "json",
        }).done(function (res) {
            $('#msg-modal').text(res.msg);
            $('#modal-product').modal({
                show: true,
                keyboard: false
            });
            window.location.reload();
            console.log('carrinho removido');
        }).fail(function (xhr, desc, err) {
            alert('Uups! Ocorreu algum erro!');
            console.log(xhr);
            console.log("Detalhes: " + desc + "nErro:" + err);
        }).always(function () {
            console.log('closed');
        });
    }

    function removeProduct(idProduct, type) {
        $.ajax({
            type: 'POST',
            url: getBaseUrl() + '/controllers/class/carrinho.php',
            data: 'type=' + type + '&idProduct=' + idProduct,
            dataType: "json",
        }).done(function (res) {
            $('#msg-modal').text(res.msg);
            $('#modal-product').modal({
                show: true,
                keyboard: false
            });
            console.log('produto removido', 'total', res.carrinho);
        }).fail(function (xhr, desc, err) {
            alert('Uups! Ocorreu algum erro!');
            console.log(xhr);
            console.log("Detalhes: " + desc + "nErro:" + err);
        }).always(function () {
            console.log('closed');
        });
    }

    function closePedido(idPedido, totalPedido, frete, prazo) {
        $.ajax({
            type: 'POST',
            url: getBaseUrl() + '/controllers/class/carrinho.php',
            data: 'type=6&idPedido=' + idPedido + '&totalPedido=' + totalPedido + '&frete=' + frete + '&prazo=' + prazo,
            dataType: "json",
        }).done(function (res) {
            localStorage.removeItem("frete");
            localStorage.removeItem("prazo");
            if (res.status == 200) {
                $('#msg-toast').text(res.msg);
                $('#modal-close-pedido').modal('hide');
                $('#alert-toast').toast('show')

            } else if (res.status == 500) {
                $('#msg-toast').text(res.msg);
                $('#alert-toast').toast('show')
            }
            console.log(res);
        }).fail(function (xhr, desc, err) {
            alert('Uups! Ocorreu algum erro!');
            console.log(xhr);
            console.log("Detalhes: " + desc + "nErro:" + err);
        }).always(function () {
            console.log('closed');
        });
    }

    function ativaDesconto() {
        $.ajax({
            type: 'POST',
            url: getBaseUrl() + '/controllers/class/carrinho.php',
            data: 'type=8',
            dataType: "json",
        }).done(function (res) {
            console.log('desconto ativado com sucesso');
        }).fail(function (xhr, desc, err) {
            alert('Uups! Ocorreu algum erro ao ativar o desconto!');
            console.log(xhr);
            console.log("Detalhes: " + desc + "nErro:" + err);
        }).always(function () {
            console.log('closed');
        });
    }

    function daBaixa(idPedido, payment = null) {
        $.ajax({
            type: 'POST',
            url: getBaseUrl() + '/controllers/class/carrinho.php',
            data: 'type=7&idPedido=' + idPedido + "&payment=" + payment,
            dataType: "json",
        }).done(function (res) {
            if (res.status == 200) {
                $('#msg-toast').html(res.msg);
                $('#alert-toast').toast('show')
                //window.location.reload();
            } else if (res.status == 500) {
                $('#msg-toast').html(res.msg);
                $('#alert-toast').toast('show')
            }
            console.log(res);
        }).fail(function (xhr, desc, err) {
            alert('Uups! Ocorreu algum erro!');
            console.log(xhr);
            console.log("Detalhes: " + desc + "nErro:" + err);
        }).always(function () {
            console.log('closed');
        });
    }

    function frete(cep, valor) {
        $.ajax({
            type: 'POST',
            url: getBaseUrl() + '/controllers/class/frete.php',
            data: 'cep=' + cep + "&valor=" + valor,
            dataType: "json",
        }).done(function (res) {
            console.log(res);
            localStorage.setItem("frete", res.Valor);
            localStorage.setItem("prazo", res.PrazoEntrega);
            let valorPedido = parseFloat($('#total-pedido-sem-frete').val());
            let frete = parseFloat(res.Valor.replace(",", "."));
            let valorTotal = frete+valorPedido;
            $('#total-pedido').val(valorTotal);
            $('#total-pedido-frete').text('R$ '+valorTotal);
            $('#frete').val('Frete: R$ ' + res.Valor);
            $('#frete-extrato').text('R$ ' + res.Valor);
            $('#prazo').text(res.PrazoEntrega + ' dias.');
            $('#retorno').fadeIn('slow');
        }).fail(function (xhr, desc, err) {
            alert('Uups! Ocorreu algum erro!');
            console.log(xhr);
            console.log("Detalhes: " + desc + "nErro:" + err);
        }).always(function () {
            console.log('closed');
        });
    }

    $('.add-produto').click(function () {
        var idProduct = $(this).attr('alt');
        addProduct(idProduct);
    });

    $('.remove-product').click(function () {
        var idProduct = $(this).attr('alt');
        removeProduct(idProduct, 3);
    });

    $('.remove-one-product').click(function () {
        var idProduct = $(this).attr('alt');
        removeProduct(idProduct, 5);
    });

    $('#closeSession').click(function () {
        destroySession();
    });

    $('#close-pedido').click(function () {
        $('#modal-close-pedido').modal({
            show: true,
            keyboard: false
        });
    });

    $('#submit-pedido').click(function () {
        var idPedido = $('#id-pedido').val();
        var totalPedido = $('#total-pedido').val();
        var frete = localStorage.getItem("frete");
        var prazo = localStorage.getItem("prazo");
        closePedido(idPedido, totalPedido, frete, prazo);
    });

    $('.da-baixa').click(function () {
        var idPedido = $(this).attr('alt');
        daBaixa(idPedido);
    });
    $('.pg-bonus').click(function () {
        var idPedido = $(this).attr('alt');
        daBaixa(idPedido, 'bonus');
    });

    // $('#modal-close-pedido').on('hide.bs.modal', function (event) {
    //     window.location.reload();
    // });

    $('#alert-toast').on('hidden.bs.toast', function () {
        window.location.reload();
    });
    $('#modal-product').on('hide.bs.modal', function (event) {
        window.location.reload();
    });

    $('.add-ativacao').click(function () {
        var idProduct = $(this).attr('alt');
        addProduct(idProduct);
        ativaDesconto();
        window.location.href = "./carrinho";
    });

    $('.calcular-frete').click(function () {
        var cep = $("#cep-frete").val();
        if (cep == '') {
            $('#info-frete-alert').text('O campo cep não pode esta vazio.');
            $('#info-frete-alert').addClass('alert-danger');
            $('#alert-frete').show('slow');
            $('#retorno').hide('slow');
        } else if (cep.length < 8) {
            $('#info-frete-alert').text('CEP inválido.');
            $('#info-frete-alert').addClass('alert-danger');
            $('#alert-frete').show('slow');
            $('#retorno').hide('slow');
        } else if (cep.length > 8) {
            $('#info-frete-alert').text('CEP inválido.');
            $('#info-frete-alert').addClass('alert-danger');
            $('#alert-frete').show('slow');
            $('#retorno').hide('slow');
        } else {
            $('#alert-frete').hide('slow');
            frete(cep, 200);
        }
    });

    $('.confirma-frete').click(function () {
        $('.frete').hide('slow');
        $('.extrato').show('slow');
        $('#submit-pedido').show('slow');
    });

});