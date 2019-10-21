<?php
session_start();
if (!isset ($_SESSION ["email"]) || !isset($_SESSION ["senha"])){
	header("Location: indexc.php");
	exit;
} else {
	echo '<div class="container">';
	echo "Voce está logado como: ";
	echo $_SESSION['email'];
}
include '../conecta_banco.php';
echo '</div>';
?>
<!DOCTYPE html>
<html lang="pt_br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>VOTAe</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/stylish-portfolio.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<link rel="icon" type="image/jpg" href="img/icone_barra.jpg">
<script type="text/javascript">
function validacao() { if(document.loginform.email.value=="")
{
alert("Por favor informe o nome ou email.");
document.loginform.email.focus();
return false;
}
if(document.loginform.senha.value=="")
{
alert("Por favor informe a senha.");
document.loginform.senha.focus();
return false;
}
}
</script>
</head>

<body>

    <!-- Header -->
   

    <!-- About -->
    <section id="about" class="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Votação eletrônica.</h2>
                    <p class="lead">Eleições - assembléias - pesquisas - consultas públicas.</p>
<img src="../img/logo.jpg">               
			   </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

	<!-- Services -->
    <!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
    <section id="services" class="services bg-primary">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-10 col-lg-offset-1">
                    <h2>Painel Fiscais</h2>
                    <hr class="small">
                    					
					   <!-- news/.row (nested) -->
					<div class="row">
					<!-- 1 new -->
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
							 <a href="alterar_senhaacf.php" class="btn btn-light">
                                <span class="fa-stack fa-2x">
                                <i class="fa fa-edit fa-stack-2x"></i>
                                
                            </span>
                                <h4>
                                    <strong>Senha ACF</strong>
                                </h4>
							
                            Acessar</a>
                            </div>
                        </div>
						
						<!-- 2 new -->
						<!-- 
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-2x">
                                <i class="fa fa-edit fa-stack-2x"></i>

                            </span>
                                <h4>
                                    <strong>---</strong>
                                </h4>
                              
                                <a href="painelf.php" class="btn btn-light">Acessar</a>
                            </div>
                        </div>
						-->
						<!-- 3 new -->
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
							 <a href="logoutadm.php" class="btn btn-light">
                                <span class="fa-stack fa-2x">
                                 <i class="fa fa-power-off fa-stack-2x"></i>
                            </span>
                                <h4>  
                                    <strong>Sair</strong>
                                </h4>                            
                               Sair</a>
                            </div>
                        </div>
						<!--4 new -->
							<!--
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-2x">
                                <i class="fa fa-edit fa-stack-2x"></i>
                                
                            </span>
                                <h4>
                                    <strong>---</strong>
                                </h4>
                              
                                <a href="painelf.php" class="btn btn-light">Acessar</a>
                            </div>
                        </div>
						-->
						
                               
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.col-lg-10 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
	
    
				
                   

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <h4><strong>Votae</strong>
                    </h4>
                    <p>R. Beira Rio, 410 - Severiano de Almeida - RS - 99.810-000 - Brazil
                        <br>Endereço provisório</p>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-phone fa-fw"></i> fone:</li>
                        <li><i class="fa fa-envelope-o fa-fw"></i> <a href="mailto:name@example.com">lemmis@gmail.com</a>
                        </li>
                    </ul>
                                     
                    <hr class="small">
                    <p class="text-muted">Copyright Smd 2017</p>
                </div>
            </div>
        </div>
       
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script>
    // Closes the sidebar menu
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });
    // Opens the sidebar menu
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });
    // Scrolls to the selected menu item on the page
    $(function() {
        $('a[href*=#]:not([href=#],[data-toggle],[data-target],[data-slide])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    //#to-top button appears after scrolling
    var fixed = false;
    $(document).scroll(function() {
        if ($(this).scrollTop() > 250) {
            if (!fixed) {
                fixed = true;
                // $('#to-top').css({position:'fixed', display:'block'});
                $('#to-top').show("slow", function() {
                    $('#to-top').css({
                        position: 'fixed',
                        display: 'block'
                    });
                });
            }
        } else {
            if (fixed) {
                fixed = false;
                $('#to-top').hide("slow", function() {
                    $('#to-top').css({
                        display: 'none'
                    });
                });
            }
        }
    });
    // Disable Google Maps scrolling
    // See http://stackoverflow.com/a/25904582/1607849
    // Disable scroll zooming and bind back the click event
    var onMapMouseleaveHandler = function(event) {
        var that = $(this);
        that.on('click', onMapClickHandler);
        that.off('mouseleave', onMapMouseleaveHandler);
        that.find('iframe').css("pointer-events", "none");
    }
    var onMapClickHandler = function(event) {
            var that = $(this);
            // Disable the click handler until the user leaves the map area
            that.off('click', onMapClickHandler);
            // Enable scrolling zoom
            that.find('iframe').css("pointer-events", "auto");
            // Handle the mouse leave event
            that.on('mouseleave', onMapMouseleaveHandler);
        }
        // Enable map zooming with mouse scroll when the user clicks the map
    $('.map').on('click', onMapClickHandler);
    </script>

</body>

</html>
