
<?php 
require_once'./controllers/conf.inc';
require_once'./vendor/autoload.php';
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <link rel="shortcut icon" href="<?php echo Url::getBase(); ?>assets/img/logotipos/favicon-bella-baruk.png" type="image/x-icon">
    <!-- Libs CSS -->
    <link rel="stylesheet" href="<?php echo Url::getBase(); ?>assets/fonts/feather/feather.min.css">
    <link rel="stylesheet" href="<?php echo Url::getBase(); ?>assets/libs/highlight.js/styles/vs2015.css">
    <link rel="stylesheet" href="<?php echo Url::getBase(); ?>assets/libs/quill/dist/quill.core.css">
    <link rel="stylesheet" href="<?php echo Url::getBase(); ?>assets/libs/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo Url::getBase(); ?>assets/libs/flatpickr/dist/flatpickr.min.css">

    <!-- Theme CSS -->
      
    <link rel="stylesheet" href="<?php echo Url::getBase(); ?>assets/css/theme.min.css" id="stylesheetLight">
    <link rel="stylesheet" href="<?php echo Url::getBase(); ?>assets/css/style.css" id="stylesheetLight">

    <link rel="stylesheet" href="<?php echo Url::getBase(); ?>assets/css/theme-dark.min.css" id="stylesheetDark">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <style>body { display: none; }</style>
    

    <title>Bella Baruk - Login</title>
  </head>
    <?php
        $pagina = Url::getURL(0);
        if ($pagina == null):
            $pagina = "login";
        endif;
        if (file_exists("views/site/" . $pagina . ".php")):
            require "views/site/" . $pagina . ".php";
        else:
            require "views/site/404.php";
        endif;
      ?>
    <!-- JAVASCRIPT
    ================================================== -->
    <!-- Libs JS -->
    <script src="<?php echo Url::getBase(); ?>assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo Url::getBase(); ?>assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo Url::getBase(); ?>assets/libs/chart.js/dist/Chart.min.js"></script>
    <script src="<?php echo Url::getBase(); ?>assets/libs/highlightjs/highlight.pack.min.js"></script>
    <script src="<?php echo Url::getBase(); ?>assets/libs/flatpickr/dist/flatpickr.min.js"></script>
    <script src="<?php echo Url::getBase(); ?>assets/libs/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
    <script src="<?php echo Url::getBase(); ?>assets/libs/list.js/dist/list.min.js"></script>
    <script src="<?php echo Url::getBase(); ?>assets/libs/quill/dist/quill.min.js"></script>
    <script src="<?php echo Url::getBase(); ?>assets/libs/dropzone/dist/min/dropzone.min.js"></script>
    <script src="<?php echo Url::getBase(); ?>assets/libs/select2/dist/js/select2.min.js"></script>
    <script src="<?php echo Url::getBase(); ?>assets/libs/chart.js/Chart.extension.min.js"></script>

    <!-- Theme JS -->
    <script src="<?php echo Url::getBase(); ?>assets/js/theme.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <!--JqueryToSlug-->
    <script src="<?php echo Url::getBase(); ?>assets/js/jquery.stringToSlug.js"></script>
    <script src="<?php echo Url::getBase(); ?>assets/js/jquery.stringToSlug.min.js"></script>
    <script>
      $("#text").stringToSlug({
        setEvents: 'keyup keydown blur',
        getPut: '#slug',
        space: '-'
      });
    </script> 
    <!-- verifica password -->
    <script>
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
    </script>
    <!-- verifica sneha -->
    <script>
        $(function(){
            var senha = $('#senha');
            var olho= $("#olho");

            olho.mousedown(function() {
                senha.attr("type", "text");
                $('#olho').removeClass('fa-eye');
                $('#olho').addClass('fa-eye-slash');
            });

            olho.mouseup(function() {
                senha.attr("type", "password");
                $('#olho').removeClass('fa-eye-slash');
                $('#olho').addClass('fa-eye');
            });

            $( "#olho" ).mouseout(function() { 
            $("#senha").attr("type", "password");
            });
        })
    </script>
  </body>
</html>
