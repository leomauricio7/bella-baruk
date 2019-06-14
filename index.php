
<?php 
require_once './controllers/conf.php';
require_once './vendor/autoload.php';
//Validation::forceHTTPS();
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
    <!-- Loading -->
    <link rel="stylesheet" href="<?php echo Url::getBase(); ?>assets/css/loading.css">
    <!-- reacptcha -->
    <script src="https://www.google.com/recaptcha/api.js?render=6LdsxpcUAAAAAJFAakC7MSZqmMaHVI4t7omDkO2b"></script>
    
    <style>body { display: none; }</style>
    

    <title>Bella Baruk</title>
  </head>
    <?php
        $pagina = Url::getURL(0);
        if ($pagina == null):
            $pagina = "login";
        endif;
        if(Dados::validaURLPageUser($pagina)){
          require "views/site/new-user.php";
        }else{
          if (file_exists("views/site/" . $pagina . ".php")): 
            require "views/site/" . $pagina . ".php";
          else:
            require "views/site/404.php";
          endif;
        }
      ?>
    <div class="loading" id="loading">Loading&#8230;</div>
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
    <!--JqueryToSlug-->
    <script src="<?php echo Url::getBase(); ?>assets/js/jquery.stringToSlug.js"></script>
    <script src="<?php echo Url::getBase(); ?>assets/js/jquery.stringToSlug.min.js"></script>
    <script src="<?php echo Url::getBase(); ?>assets/js/route-login.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#loading").delay(1000).fadeOut("slow");  
        })
	</script>
  </body>
</html>
