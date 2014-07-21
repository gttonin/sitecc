<?php

add_action('init', 'do_output_buffer');
function do_output_buffer() {
  @ob_start();
}
function login_sitecc() {
    wp_enqueue_style( 'custom-login', get_template_directory_uri() . '/assets/css/login.css' );
}
add_action( 'login_enqueue_scripts', 'login_sitecc' );

function formata_data($data) {

	$meses = array( 
		1 =>'Janeiro',
		'Fevereiro',
		'Março',
		'Abril',
		'Maio',
		'Junho',
		'Julho',
		'Agosto',
		'Setembro',
		'Outubro',
		'Novembro',
		'Dezembro'
		);

	$mes = $meses[intval(date('m',$data))];
	return date('d', $data)." de ".$mes." de ".date('Y',$data);
}

function custom_paged_404_fix( ) {

    global $wp_query;
    if ( !is_404()  || 0 != count( $wp_query->posts ) ) {
        return;
    }

    header('HTTP/1.0 404 Not Found');
    exit;
}
add_action( 'wp', 'custom_paged_404_fix' );