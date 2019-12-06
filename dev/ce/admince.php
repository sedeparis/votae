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
    <link href="../css/bootstrap.css" rel="stylesheet">
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
<link rel="icon" type="image/jpg" href="../img/icone_barra.jpg">
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
					<img src="../img/logop.jpg">
                </div>
            </div>	
        </div>
        <!-- /.container -->
    </section>
	<!-- Services -->
    <!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
   <section id="services" class="services bg-primary">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-10 col-lg-offset-1">
						<h2>Painel Comissão Eleitoral</h2>
						<br><br>
						<a href="logoutce.php" class="btn btn-danger">
                        <span class="fa-stack fa-1x">
                        <i class="fa fa-power-off fa-stack-2x"></i>
						</span> Sair</a>
						<hr class="small">
						<br><br>
                    <div class="row">
						<!-- 1 new -->
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-2x">
                                <i class="fa fa-pencil fa-stack-2x"></i>
								</span>
                                <h4>
                                    <strong>Incluir Votantes</strong>
                                </h4>
                             <a href="cd_usuario.php" class="btn btn-light">Acessar</a>
                            </div>
                        </div>
						<!-- 2 new -->
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-2x">
                                <i class="fa fa-check-square fa-stack-2x"></i>
								</span>
                                <h4>
                                    <strong>Selecionar Votantes</strong>
                                </h4>
                                <a href="selecionar_votantes.php" class="btn btn-light">Acessar</a>
                            </div>
                        </div>
						<!-- 3 new -->
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-2x">
                                 <i class="fa fa-pencil fa-stack-2x"></i>
								</span>
                                <h4>  
                                    <strong>Incluir Eleição</strong>
                                </h4>
                                <a href="cd_eleicao.php" class="btn btn-light">Acessar</a>
                            </div>
                        </div>
						<!--4 new -->
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-2x">
                                <i class="fa fa-edit fa-stack-2x"></i>
								</span>
                                <h4>
                                    <strong>Alterar eleição</strong>
                                </h4>
                                <a href="altera_eleicao.php" class="btn btn-light">Acessar</a>
                            </div>
                        </div>
					</div>
                    <!-- /.row (nested) -->
					   <!-- news/.row (nested) -->
					<div class="row">
						<!-- 1 new -->
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-2x">
                                <i class="fa fa-pencil fa-stack-2x"></i>
								</span>
                                <h4>
                                    <strong>Incluir instrução voto</strong>
                                </h4>
                             <a href="ivotacao.php" class="btn btn-light">Acessar</a>
                            </div>
                        </div>
						<!-- 2 new -->
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-2x">
                                <i class="fa fa-edit fa-stack-2x"></i>
								</span>
                                <h4>
                                    <strong>Alterar instrução de votação</strong>
                                </h4>
                                <a href="altera_ivotacao.php" class="btn btn-light">Acessar</a>
                            </div>
                        </div>
						<!-- 3 new -->
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-2x">
                                 <i class="fa fa-pencil fa-stack-2x"></i>
								</span>
                                <h4>  
                                    <strong>Incluir Chapas</strong>
                                </h4>
                                <a href="cd_chapas.php" class="btn btn-light">Acessar</a>
                            </div>
                        </div>
						<!--4 new -->
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-2x">
                                <i class="fa fa-edit fa-stack-2x"></i>
								</span>
                                <h4>
                                    <strong>Alterar Chapas</strong>
                                </h4>
                                <a href="altera_chapa.php" class="btn btn-light">Acessar</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.col-lg-10 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
	</section>
		<!--/section>
		<!-- Services 2-->
		<!--section id="services" class="services bg-primary"--->
	<section id="services" class="services bg-primary-ii">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-10 col-lg-offset-1">
                    <hr class="small">
                    <div class="row">
					<!----1 --->
						<div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-2x">
                                 <i class="fa fa-pencil fa-stack-2x"></i>
								</span>
                                <h4>  
                                    <strong>Incluir comissão e fiscais</strong>
                                </h4>                            
                                <a href="cd_comissao.php" class="btn btn-light">Acessar</a>
                            </div>
                        </div>
						<!----2 --->
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-2x">
                                 <i class="fa fa-edit fa-stack-2x"></i>
								</span>
                                <h4>  
                                    <strong>Altera Senha comissão</strong>
                                </h4>                            
                                <a href="senha/index.php?pagina=recuperar" class="btn btn-light">Acessar</a>
                            </div>
                        </div>
						<!----3 --->
						<div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-2x">
                                 <i class="fa fa-unlock fa-stack-2x"></i>
								</span>
                                <h4>  
                                    <strong>Autoriza votação</strong>
                                </h4>                            
                                <a href="../votacao/liberar_votacao.php" class="btn btn-light">Acessar</a>
                            </div>
                        </div>
						<!----4 --->
						<div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-2x">
                                 <i class="fa fa-lock fa-stack-2x"></i>
								</span>
                                <h4>  
                                    <strong>Encerra votação</strong>
                                </h4>                            
                                <a href="../votacao/encerra_votacao.php" class="btn btn-light">Acessar</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
					<div class="row">
					<!----1 --->
						<div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-2x">
                                 <i class="fa fa-print fa-stack-2x"></i>
                            </span>
                                <h4>  
                                    <strong>Imprimir zerésima</strong>
                                </h4>                            
                                <a href="../apuracao/voto_zero.php" class="btn btn-light">Acessar</a>
                            </div>
                        </div>
						<!----2 --->
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-2x">
                                 <i class="fa fa-percent fa-stack-2x"></i>
								</span>
                                <h4>  
                                    <strong>Imprimir resultado</strong>
                                </h4>                            
                                <a href="../apuracao/resultado.php" class="btn btn-light">Acessar</a>
                            </div>
                        </div>
						<!----3 --->
						<div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-2x">
                                 <i class="fa fa-map fa-stack-2x"></i>
								</span>
                                <h4>  
                                    <strong>Ata da eleição</strong>
                                </h4>                            
                                <a href="ata.php" class="btn btn-light">Acessar</a>
                            </div>
                        </div>
						<!----4 --->
						<div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-2x">
                                 <i class="fa fa-gavel fa-stack-2x"></i>
								</span>
                                <h4>  
                                    <strong>Auditoria</strong>
                                </h4>                            
                                <a href="../apuracao/auditoria.php" class="btn btn-light">Auditoria</a>
                            </div>
                        </div>
					</div>
                    <!-- /.row (nested) -->
				</div> <!-- text-center-->
                <!-- /.col-lg-10 -->
        </div> <!-- /.container -->
    </section>
	<!-- /.section  -->
	<!-- Services 3-->
		<!--section id="services" class="services bg-primary"--->
	<section id="services" class="services bg-primary">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-10 col-lg-offset-1">
                    <hr class="small">
                    <div class="row">
					<!----1 --->
						<div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-2x">
                                 <i class="fa fa-desktop fa-stack-2x"></i>
								</span>
                                <h4>  
                                    <strong>Acompanhar Votação</strong>
                                </h4>                            
                                <a href="tempo_real.php" class="btn btn-light">Acessar</a>
                            </div>
                        </div>
						<!----2 --->
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-2x">
                                 <i class="fa fa-refresh fa-stack-2x"></i>
								</span>
                                <h4>  
                                    <strong>Em construção</strong>
                                </h4>                            
                                <a href="blank.php" class="btn btn-light">Acessar</a>
                            </div>
                        </div>
						<!----3 --->
						<div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-2x">
                                 <i class="fa fa-refresh fa-stack-2x"></i>
								</span>
                                <h4>  
                                    <strong>Em construção</strong>
                                </h4>                            
                                <a href="blank.php" class="btn btn-light">Acessar</a>
                            </div>
                        </div>
						<!----4 --->
						<div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-2x">
                                 <i class="fa fa-refresh fa-stack-2x"></i>
								</span>
                                <h4>  
                                    <strong>Em construção</strong>
                                </h4>                            
                                <a href="blank.php" class="btn btn-light">Acessar</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
				</div> <!-- text-center-->
                <!-- /.col-lg-10 -->
        </div> <!-- /.container -->
    </section>
	 <!-- /.section  -->
    <!-- Footer -->
    <footer>
		<div class="container">
			<br>
			<p align="center"><a href="sobre.php"><img src="../img/sobre.png"></a></p>
			<?php
			include '../conecta_banco.php';
			$sql = mysqli_query($mysqli, "SELECT * FROM parametros WHERE id=2");
			while($proc = mysqli_fetch_array($sql)) {
			echo  '<p align="center">Votae Versão '. $proc['valor']. '</p>'; }
			echo '<p align="center">'.'Banco de Dados: MariaDB '. $banco.'</p>';
			?>
		</div>
		<div class="container">
			<div class="row">
			<div class="col-lg-10 col-lg-offset-1 text-center">
			<h4><strong>Votae</strong>
			</h4>
			<p>R. Pedro Rigotti, 03 - Dourados - MS - 79.810-120 - Brasil
			<br></p>
			<ul class="list-unstyled">
			<li><i class="fa fa-phone fa-fw"></i> fone: 67 99647 0404 </li>
			<li><i class="fa fa-envelope-o fa-fw"></i> <a href="infolemmis@gmail.com">infolemmis@gmail.com</a>
			</li>
			</ul>
			<hr class="small">
			<p class="text-muted">Copyright Lemmis 2020
			<img src="../img/lemmisp.png"></p>
			</div>
			</div>
		</div>
	</footer>
    <!-- jQuery -->
    <script src="../js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>