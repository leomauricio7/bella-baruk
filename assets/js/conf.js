$(function(){

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
            window.location = ("<?php echo URL::getBase() . '' . URL::getURL(0); ?>");
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

});