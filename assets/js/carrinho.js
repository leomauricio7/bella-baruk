$(function(){

    function startSession(){
        $.ajax({
            type: 'POST',
            url: '../controllers/class/carrinho.php',
            data: 'type=1',
            dataType: "json",
        }).done(function(res) {
            if(res.status == 200 || res.status == 409){
                $('#icon-carrinho').removeClass('fa-shopping-cart');
                $('#icon-carrinho').addClass('fa-cart-plus');
            }
            console.log('sessão iniciada');
        }).fail(function(jqXHR, textStatus ) {
            console.log('An error occurred. '+textStatus);
        }).always(function() {
            console.log('closed');
        });
    }

    function addProduct(idProduct){
        startSession();
        $.ajax({
            type: 'POST',
            url: '../controllers/class/carrinho.php',
            data: 'type=2&idProduct='+idProduct,
            dataType: "json",
        }).done(function(res) {
            $("#loading").delay(100).fadeOut('slow');
            $('#msg-modal').text(res.msg);
            $('#modal-product').modal({
                show : true,
                keyboard: false
            }); 
            console.log('produto adicionado','total',res.carrinho);
        }).fail(function(jqXHR, textStatus ) {
            console.log('An error occurred. '+textStatus);
        }).always(function() {
            console.log('closed');
        });
    }

    function destroySession(){
        $.ajax({
            type: 'POST',
            url: '../controllers/class/carrinho.php',
            data: 'type=4',
            dataType: "json",
        }).done(function(res) {
            $('#msg-modal').text(res.msg);
            $('#modal-product').modal({
                show : true,
                keyboard: false
            });
            window.location.reload();
            console.log('carrinho removido');
        }).fail(function(jqXHR, textStatus ) {
            console.log('An error occurred. '+textStatus);
        }).always(function() {
            console.log('closed');
        });
    }

    function removeProduct(idProduct, type){
        $.ajax({
            type: 'POST',
            url: '../controllers/class/carrinho.php',
            data: 'type='+type+'&idProduct='+idProduct,
            dataType: "json",
        }).done(function(res) {
            $('#msg-modal').text(res.msg);
            $('#modal-product').modal({
                show : true,
                keyboard: false
            }); 
            console.log('produto removido','total',res.carrinho);
        }).fail(function(jqXHR, textStatus ) {
            console.log('An error occurred. '+textStatus);
        }).always(function() {
            console.log('closed');
        });
    }

    function closePedido(idPedido, totalPedido){
        $.ajax({
            type: 'POST',
            url: '../controllers/class/carrinho.php',
            data: 'type=6&idPedido='+idPedido+'&totalPedido='+totalPedido,
            dataType: "json",
        }).done(function(res) {
            if(res.status == 200){
                $('#msg-toast').text(res.msg);
                $('#modal-close-pedido').modal('hide');
                $('#alert-toast').toast('show')
                
            }else if(res.status == 500){
                $('#msg-toast').text(res.msg);
                $('#alert-toast').toast('show')
            }
            console.log(res);
        }).fail(function(jqXHR, textStatus ) {
            console.log('An error occurred. '+textStatus);
        }).always(function() {
            console.log('closed');
        });
    }

    function daBaixa(idPedido){
        $.ajax({
            type: 'POST',
            url: '../controllers/class/carrinho.php',
            data: 'type=7&idPedido='+idPedido,
            dataType: "json",
        }).done(function(res) {
            if(res.status == 200){
                $('#msg-toast').text(res.msg);
                $('#alert-toast').toast('show')
                window.location.reload();
            }else if(res.status == 500){
                $('#msg-toast').text(res.msg);
                $('#alert-toast').toast('show')
            }
            console.log(res);
        }).fail(function(jqXHR, textStatus ) {
            console.log('An error occurred. '+textStatus);
        }).always(function() {
            console.log('closed');
        });
    }

    $('.add-produto').click(function(){
        var idProduct = $(this).attr('alt');
        addProduct(idProduct);
    });

    $('.remove-product').click(function(){
        var idProduct = $(this).attr('alt');
        removeProduct(idProduct, 3);
    });

    $('.remove-one-product').click(function(){
        var idProduct = $(this).attr('alt');
        removeProduct(idProduct, 5);
    });

    $('#closeSession').click(function(){
        destroySession();
    });

    $('#close-pedido').click(function(){
        $('#modal-close-pedido').modal({
            show : true,
            keyboard: false
        }); 
    });

    $('#submit-pedido').click(function(){
        var idPedido = $('#id-pedido').val();
        var totalPedido = $('#total-pedido').val();
        closePedido(idPedido, totalPedido);
    });

    $('.da-baixa').click(function(){
        var idPedido = $(this).attr('alt');
        daBaixa(idPedido);
    });

    $('#modal-product').on('hide.bs.modal', function (event) {
        window.location.reload();
    });
});