$(function(){

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
    $("#tipo_pessoa").on('change', function(e){
        if($(this).val() == 'juridica'){//pessoa juridica
            $('#cnpj').show();
            $('#cpf').hide();
        }else{//pessoa fisica
            $('#cnpj').hide();
            $('#cpf').show();
        }
        return false;
    });

    //habilita/desabilita a edição de dados pessoais
    $.fn.toggleDisabled = function() {
        return this.each(function() {
            var $this = $(this);
            if ($this.attr('disabled')) $this.removeAttr('disabled');
            else $this.attr('disabled', 'disabled');
        });
    };

    $('#on-edit').click(()=>{
        $('input').toggleDisabled();
        $('select').toggleDisabled();
        $('#switchOne').prop('disabled', false);
    });

    $('.exibe-dados-user-nivel').click(function(e){
        var idTr = $(this).attr('alt'); 
        $( "#"+idTr).toggle('show');
    });
});