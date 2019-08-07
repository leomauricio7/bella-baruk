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
    //login
    var frm = $('#form-login');
    frm.submit(function (e) {
        e.preventDefault();
        console.log('submit');
        // $('#loading').show();
        $("#loading").delay(100).fadeIn('slow')
        var user = $('#user').val();
        var senha = $('#senha').val();
        grecaptcha.ready(function () {
            grecaptcha.execute('6LdsxpcUAAAAAJFAakC7MSZqmMaHVI4t7omDkO2b', { action: 'homepage' }).then(function (token) {
                console.log(getBaseUrl());
                $.ajax({
                    type: 'POST',
                    url: getBaseUrl() + '/views/site/validate.php',
                    data: 'user=' + user + '&senha=' + senha + '&token=' + token,
                    dataType: "JSON",
                }).done(function (resposta) {
                    if (resposta.status == 200) {
                        $('.msg').text(resposta.msg);
                        $('#error').hide();
                        $('#success').show();
                        console.log('success');
                        window.location = './' + resposta.paste;
                    } else if (resposta.status == 404 || resposta.status == 500) {
                        $('.msg').text(resposta.msg);
                        $('#error').show();
                        $('#success').hide();
                        console.log('error');
                    } else {
                        $('.msg').text('Erro no processamento dos dados. Tente novamente.');
                        $('#error').show();
                        $('#success').hide();
                    }
                    console.log(resposta);
                }).fail(function (jqXHR, textStatus) {
                    $('.msg').text('Erro no processamento dos dados. Tente novamente.');
                    $("#loading").delay(1000).fadeOut("slow");
                    $('#error').show();
                    $('#success').hide();
                    console.log('An error occurred.');
                    console.log(textStatus);
                }).always(function () {
                    $("#loading").delay(1000).fadeOut("slow");
                    console.log("finalizou requisição");
                });

            });
        });
    });

    //generate slug
    $("#text").stringToSlug({
        setEvents: 'keyup keydown blur',
        getPut: '#slug',
        space: '-'
    });

    //view senha login
    var senha = $('#senha');
    var olho = $("#olho");

    olho.mousedown(function () {
        senha.attr("type", "text");
        $('#olho').removeClass('fa-eye');
        $('#olho').addClass('fa-eye-slash');
    });

    olho.mouseup(function () {
        senha.attr("type", "password");
        $('#olho').removeClass('fa-eye-slash');
        $('#olho').addClass('fa-eye');
    });

    $("#olho").mouseout(function () {
        $("#senha").attr("type", "password");
    });

    //valida senha login
    var password = document.getElementById("senha"), confirm_password = document.getElementById("confirm_senha");
    function validatePassword() {
        if (password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Senhas não coincidem!");
        } else {
            confirm_password.setCustomValidity('');
        }
    }
    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;

    $('#name-login').keyup(function () {
        value = $(this).val();
        value = value.replace(/^\s+|\s+$/g, "");
        $(this).val(retira_acentos(value.toLowerCase()))
    });

    function retira_acentos(palavra) {

        com_acento = 'áàãâäéèêëíìîïóòõôöúùûüçÁÀÃÂÄÉÈÊËÍÌÎÏÓÒÕÖÔÚÙÛÜÇ';
        sem_acento = 'aaaaaeeeeiiiiooooouuuucAAAAAEEEEIIIIOOOOOUUUUC';
        nova = '';
        for (i = 0; i < palavra.length; i++) {
            if (com_acento.search(palavra.substr(i, 1)) >= 0) {
                nova += sem_acento.substr(com_acento.search(palavra.substr(i, 1)), 1);
            }
            else {
                nova += palavra.substr(i, 1);
            }
        }
        return nova.replace(/^\s+|\s+$/g, "");
    }
});
