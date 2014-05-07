<?php
/**
 * Plugin Name: Cadastro de Empregos
 * Description: Plugin para cadastro e gerenciamento dos Empregos
 * Version: 1.0
 * Author: Guilherme Bizzani, Bruno Furtado
 */



function inicializa_plugin_empregos() {
    $args = array(
		'public' => true,
		"menu_position" => 5,
		"menu_icon" => "dashicons-businessman",
		'labels'  => array(

      		'name'               =>  'Empregos',
			'singular_name'      =>  'Emprego',
			'menu_name'          =>  'Empregos',
			'name_admin_bar'     =>  'Emprego' ,
			'add_new'            =>  'Adicionar novo' ,
			'add_new_item'       =>  'Adicionar novo Emprego' ,
			'new_item'           =>  'Novo Emprego' ,
			'edit_item'          =>  'Editar Emprego',
			'view_item'          =>  'Ver Emprego',
			'all_items'          =>  'Listagem de Empregos' ,
			'search_items'       =>  'Buscar Empregos',
			'parent_item_colon'  =>  'Emprego pai:',
			'not_found'          =>  'Nenhum emprego encontrado.',
			'not_found_in_trash' =>  'Nenhum emprego encontrado na lixeira.',

      	)
    );

    register_post_type( 'emprego', $args ); // aqui sempre singular
    
}

add_action( 'init', 'inicializa_plugin_empregos' ); // gancho de inicialização -- inserindo nosso código no wordpress









