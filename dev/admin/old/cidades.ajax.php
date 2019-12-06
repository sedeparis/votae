<?php
	header( 'Cache-Control: no-cache' );
	header( 'Content-type: application/xml; charset="utf-8"', true );

include ("../conecta_banco.php");
header('Content-Type: text/html; charset=utf-8');



	$cod_estados = mysqli_real_escape_string($mysqli, $_REQUEST['cod_estados'] );

	$cidades = array();

	$sql = "SELECT cod_cidades, nome
			FROM cidades
			WHERE estados_cod_estados=$cod_estados
			ORDER BY nome";
	$res = mysqli_query($mysqli, $sql);
	while ( $row = mysqli_fetch_assoc( $res ) ) {
		$cidades[] = array(
			'cod_cidades'	=> $row['cod_cidades'],
			'nome'			=> $row['nome'],
		);
	}

	echo( json_encode( $cidades ) );
	
	?>