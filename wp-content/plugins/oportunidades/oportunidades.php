<?php
/**
 * Plugin Name: Cadastro de oportunidades
 * Description: Plugin para cadastro e gerenciamento dos oportunidades
 * Version: 1.0
 * Author: Guilherme Bizzani, Bruno Furtado
 */



function inicializa_plugin_oportunidades() {
    $args = array(
		'public' => true,
		"menu_position" => 5,
		"menu_icon" => "dashicons-businessman",
		"has_archive"=> true,
		'labels'  => array(

      		'name'               =>  'Oportunidades',
			'singular_name'      =>  'Oportunidade',
			'menu_name'          =>  'Oportunidades',
			'name_admin_bar'     =>  'Oportunidade' ,
			'add_new'            =>  'Adicionar novo' ,
			'add_new_item'       =>  'Adicionar novo Oportunidade' ,
			'new_item'           =>  'Novo Oportunidade' ,
			'edit_item'          =>  'Editar Oportunidade',
			'view_item'          =>  'Ver Oportunidade',
			'all_items'          =>  'Listagem de Oportunidades' ,
			'search_items'       =>  'Buscar Oportunidades',
			'parent_item_colon'  =>  'Oportunidade pai:',
			'not_found'          =>  'Nenhum oportunidade encontrado.',
			'not_found_in_trash' =>  'Nenhum oportunidade encontrado na lixeira.',

      	),
      "rewrite" => array(
        "slug" => "oportunidades"
      )
    );

    register_post_type( 'oportunidade', $args ); // aqui sempre singular
    
}

add_action( 'init', 'inicializa_plugin_oportunidades' ); // gancho de inicialização -- inserindo nosso código no wordpress









