$(function () {

    $('[data-toggle="tooltip"]').tooltip();

    $("#text").stringToSlug({
        setEvents: 'keyup keydown blur',
        getPut: '#slug',
        space: '-'
    });

    var settimmer = 0;

    window.setInterval(function () {
        var timeCounter = $("b[id=show-time]").html();
        var updateTime = eval(timeCounter) - eval(1);
        $("[id=show-time]").html(updateTime);

        if (updateTime === 0) {
            location.href = document.referrer;
        }
    }, 1000);

    $('#cnpj').hide();
    $("#tipo_pessoa").on('change', function (e) {
        if ($(this).val() == 'juridica') {//pessoa juridica
            $('#cnpj').show();
            $('#cpf').hide();
        } else {//pessoa fisica
            $('#cnpj').hide();
            $('#cpf').show();
        }
        return false;
    });

    //habilita/desabilita a edição de dados pessoais
    $.fn.toggleDisabled = function () {
        return this.each(function () {
            var $this = $(this);
            if ($this.attr('disabled')) $this.removeAttr('disabled');
            else $this.attr('disabled', 'disabled');
        });
    };

    $('#on-edit').click(() => {
        $('input').toggleDisabled();
        $('select').toggleDisabled();
        $('#switchOne').prop('disabled', false);
    });

    $('.exibe-dados-user-nivel').click(function (e) {
        var idTr = $(this).attr('alt');
        $("#" + idTr).toggle('show');
    });

    $('#form-escritorio').submit(function (event) {
        event.preventDefault();
        var dados = $(this).serialize();
        validaEscritorio(dados);
    });

    $('#error').click(function () {
        closeModal();
    });

    $('#success').click(function () {
        window.location.href = "./escritorio-virtual/home";
    });

    function closeModal() {
        $('.modal-loading').modal({ hidden: true });
    }

    function getBaseUrl() {
        var hostName = location.hostname;
        if (hostName === "localhost") {
            pathname = window.location.pathname;
            splitPath = pathname.split('/');
            path = splitPath[1];
            baseUrl = "http://" + hostName + "/" + path;
        } else {
            baseUrl = "https://" + hostName + "/escritorio/";
        }
        return baseUrl;
    }

    function moeda(a, e, r, t) {
        let n = ""
            , h = j = 0
            , u = tamanho2 = 0
            , l = ajd2 = ""
            , o = window.Event ? t.which : t.keyCode;
        if (13 == o || 8 == o)
            return !0;
        if (n = String.fromCharCode(o),
            -1 == "0123456789".indexOf(n))
            return !1;
        for (u = a.value.length,
            h = 0; h < u && ("0" == a.value.charAt(h) || a.value.charAt(h) == r); h++)
            ;
        for (l = ""; h < u; h++)
            -1 != "0123456789".indexOf(a.value.charAt(h)) && (l += a.value.charAt(h));
        if (l += n,
            0 == (u = l.length) && (a.value = ""),
            1 == u && (a.value = "0" + r + "0" + l),
            2 == u && (a.value = "0" + r + l),
            u > 2) {
            for (ajd2 = "",
                j = 0,
                h = u - 3; h >= 0; h--)
                3 == j && (ajd2 += e,
                    j = 0),
                    ajd2 += l.charAt(h),
                    j++;
            for (a.value = "",
                tamanho2 = ajd2.length,
                h = tamanho2 - 1; h >= 0; h--)
                a.value += ajd2.charAt(h);
            a.value += r + l.substr(u - 2, u)
        }
        return !1
    }

    function validaEscritorio(dados) {
        $.ajax({
            method: 'POST',
            url: getBaseUrl() + '/controllers/class/valida-login-escritorio-virtual.php',
            data: dados,
            dataType: 'json',
            success: function (res) {
                console.log(res);
                if (res.status == 200) {
                    $('h2.text-status').text(res.msg);
                    $('button#success').show('slow');
                    $('button#error').hide('slow');
                    setLoadLogin();
                    $('.modal-loading').modal({
                        show: true,
                        keyboard: true,
                        backdrop: 'static'
                    });
                } else {
                    $('h2.text-status').text(res.msg);
                    $('button#success').hide('slow');
                    $('button#error').show('slow');
                    setLoadLogin();
                    $('.modal-loading').modal({
                        show: true,
                        keyboard: true,
                        backdrop: 'static'
                    });
                }

            }, error: function (err) {
                console.log(err);
                $('h2.text-status').text('Error na validação da senha de acesso.');
                $('button#success').hide('slow');
                $('button#error').show('slow');
                setLoadLogin();
                $('.modal-loading').modal({
                    show: true,
                    keyboard: true,
                    backdrop: 'static'
                });
            }
        })
    };

    function validaSaque(dados) {
        $.ajax({
            method: 'POST',
            url: getBaseUrl() + '/controllers/class/saque.php',
            data: dados,
            dataType: 'json',
            success: function (res) {
                console.log(res);
                $('#form-saque').hide('slow');
                $('#div-load-saque').hide('slow');
                if (res.status == 200) {
                    $('#div-saque').append(
                        '<div class="alert alert-success alert-dismissible fade show" role="alert">' +
                        '<strong>Atenção!</strong> ' + res.msg +
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                        '<span aria-hidden="true">×</span>' +
                        '</button>' +
                        '</div>');
                } else if (res.status == 500) {
                    $('#div-saque').append(
                        '<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                        '<strong>Atenção!</strong> ' + res.msg +
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                        '<span aria-hidden="true">×</span>' +
                        '</button>' +
                        '</div>');
                    $('#form-saque').show('slow');
                    $('#div-load-saque').hide('slow');
                }
                $("#form-saque").insertAfter(".alert");
            }, error: function (err) {
                console.log(err);
                $('#form-saque').show('slow');
                $('#div-load-saque').hide('slow');
                $('#div-saque').append(
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                    '<strong>Atenção!</strong> Error no processamento do saque.' +
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                    '<span aria-hidden="true">×</span>' +
                    '</button>' +
                    '</div>');
                $("#form-saque").insertAfter(".alert");
            }
        })
    };

    function validaTransferencia(dados) {
        $.ajax({
            method: 'POST',
            url: getBaseUrl() + '/controllers/class/transferencia.php',
            data: dados,
            dataType: 'json',
            success: function (res) {
                console.log(res);
                $('#form-transferencia').hide('slow');
                $('#div-load-transferencia').hide('slow');
                if (res.status == 200) {
                    $('#div-transferencia').append(
                        '<div class="alert alert-success alert-dismissible fade show" role="alert">' +
                        '<strong>Atenção!</strong> ' + res.msg +
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                        '<span aria-hidden="true">×</span>' +
                        '</button>' +
                        '</div>');
                } else if (res.status == 500) {
                    $('#div-transferencia').append(
                        '<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                        '<strong>Atenção!</strong> ' + res.msg +
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                        '<span aria-hidden="true">×</span>' +
                        '</button>' +
                        '</div>');
                    $('#form-transferencia').show('slow');
                    $('#div-load-transferencia').hide('slow');
                }
                $("#form-transferencia").insertAfter(".alert");
            }, error: function (err) {
                console.log(err);
                $('#form-transferencia').show('slow');
                $('#div-load-transferencia').hide('slow');
                $('#div-transferencia').append(
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                    '<strong>Atenção!</strong> Error no processamento do transferencia.' +
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                    '<span aria-hidden="true">×</span>' +
                    '</button>' +
                    '</div>');
                $("#form-saque").insertAfter(".alert");
            }
        })
    };

    function validaUser(dados, type = 'tf') {
        $.ajax({
            method: 'POST',
            url: getBaseUrl() + '/controllers/class/valida-user.php',
            data: dados,
            dataType: 'json',
            success: function (res) {
                console.log(res);
                //getEstoque(res.id);
                if (res.status == 200) {
                    if (type == 'tf') {
                        $('#id_user_destino').removeClass('is-invalid');
                        $('#id_user_destino').addClass('is-valid');
                        $('#status-user').removeClass('invalid-feedback');
                        $('#status-user').addClass('valid-feedback');
                        $('#status-user').text(res.msg);
                        $('#btn-transferencia').attr('disabled', false);
                        $('#valor_transferencia').attr('disabled', false);
                        $('input[name=id_user_recebedor]').val(res.id);
                    } else if (type == 'vd') {
                        $('#user-cliente-pedido').removeClass('is-invalid');
                        $('#user-cliente-pedido').addClass('is-valid');
                        $('#status-user-cliente').removeClass('invalid-feedback');
                        $('#status-user-cliente').addClass('valid-feedback');
                        $('#status-user-cliente').text(res.msg);
                        $('#btn-modal-new-user').attr('disabled', false);
                        $('input[name=id_cliente]').val(res.id);
                        $('#cliente-info').text(res.msg);
                        localStorage.setItem('nome-cliente', res.msg);
                        localStorage.setItem('id-cliente', res.id);
                    }
                } else if (res.status == 500) {
                    if (type == 'tf') {
                        $('#id_user_destino').removeClass('is-valid');
                        $('#id_user_destino').addClass('is-invalid');
                        $('#status-user').removeClass('valid-feedback');
                        $('#status-user').addClass('invalid-feedback');
                        $('#status-user').text(res.msg);
                        $('#btn-transferencia').attr('disabled', true);
                        $('#valor_transferencia').attr('disabled', true);
                        $('input[name=id_user_recebedor]').val(undefined);
                    } else if (type == 'vd') {
                        $('#user-cliente-pedido').removeClass('is-valid');
                        $('#user-cliente-pedido').addClass('is-invalid');
                        $('#status-user-cliente').removeClass('valid-feedback');
                        $('#status-user-cliente').addClass('invalid-feedback');
                        $('#status-user-cliente').text(res.msg);
                        $('#btn-modal-new-user').attr('disabled', true);
                        $('input[name=id_cliente]').val(undefined);
                        localStorage.removeItem('nome-cliente');
                        localStorage.removeItem('id-cliente');
                    }
                }
            }, error: function (err) {
                console.log(err);
                $('#div-saque').append(
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                    '<strong>Atenção!</strong> Error no processamento da transferencia.' +
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                    '<span aria-hidden="true">×</span>' +
                    '</button>' +
                    '</div>');
                $("#form-transferencia").insertAfter(".alert");
            }
        })
    };

    function getEstoque(cliente=null) {
        $.ajax({
            method: 'POST',
            url: getBaseUrl() + '/controllers/class/produtos.php',
            data: 'cliente='+cliente,
            dataType: 'json',
            success: function (res) {
                console.log(res)
                //$("#tbody-produtos").empty();
                //$("#tbody-produtos").html(res.data);
            }, error: function (err) {
                console.error(err);
            }
        })
    };

    function setLoadLogin() {
        setTimeout(showPage, 3000);
    };
    function showPage() {
        $("#load").hide('slow');;
        $("#text-load").show('slow');
    };
    //MODAL SAQUE
    $('#modal-saque').on('show.bs.modal', function (event) {
        $('#div-img-top-saque').hide('slow');
        setTimeout(function () {
            $('#div-img-top-saque').show('slow');
            $('#div-load-saque').hide('slow');
            $('#form-saque').show('slow');
        }, 3000);
    });

    $('#modal-saque').on('hidden.bs.modal', function (event) {
        window.location.reload();
    });
    //MODAL TRANSFERÊNCIA
    $('#modal-transferencia').on('show.bs.modal', function (event) {
        $('#div-img-top-transferencia').hide('slow');
        setTimeout(function () {
            $('#div-img-top-transferencia').show('slow');
            $('#div-load-transferencia').hide('slow');
            $('#form-transferencia').show('slow');
        }, 3000);
    });

    $('#modal-transferencia').on('hidden.bs.modal', function (event) {
        window.location.reload();
    });

    //form saque
    $('#form-saque').submit(function (event) {
        event.preventDefault();
        var data = $(this).serialize();
        $('#form-saque').hide('slow');
        $('#div-load-saque').show('slow');
        $(".alert").remove();
        validaSaque(data);
    });
    //form transferencia
    $('#form-transferencia').submit(function (event) {
        event.preventDefault();
        var data = $(this).serialize();
        $('#form-transferencia').hide('slow');
        $('#div-load-transferencia').show('slow');
        $(".alert").remove();
        validaTransferencia(data);
    });

    $('.moeda').keypress(function (event) {
        return (moeda(this, '.', '.', event));
    });

    $("#id_user_destino").keyup(function (event) {
        let res = $('#id_user_destino').val();
        let data = { id_user_destino: res };
        validaUser(data, 'tf');
    });

    $("#user-cliente-pedido").keyup(function (event) {
        let res = $('#user-cliente-pedido').val();
        let data = { id_user_destino: res };
        validaUser(data, 'vd');
    });

    $('#btn-modal-new-user').click(function () {
        $('#form-mod-user').toggle('right');
        $('#produtos').toggle('left');
        window.location.reload();
    });

    $('#cancel-pedido').click(function () {
        $('#form-mod-user').toggle('right');
        $('#produtos').toggle('left');
        localStorage.clear();
        getEstoque()
    });

    function existPedidoAtivo() {
        if(localStorage.getItem('id-cliente') != null){
            $('#form-mod-user').toggle('right');
            $('#produtos').toggle('left');
            $('#cliente-info').text(localStorage.getItem('nome-cliente'));
            //getEstoque(localStorage.getItem('id-cliente'));
        }
    };
    existPedidoAtivo();
});
