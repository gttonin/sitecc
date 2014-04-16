<?php
/*
Plugin Name: Cadastro Docentes
Plugin URI: http://www.cc.uffs.com.br
Description: Modulo de cadastro de Docentes - Listar,Atualizar,Inserir,Deletar
Version: 1.0
Author: Bruno Furtado Fontana
Author URI: http://www.brunodeveloper.com.br
*/

//menu items
add_action('admin_menu','add_docentes');
function add_docentes() {
	
	//this is the main item for the menu
	add_menu_page('Docentes', //page title
	'Docentes', //menu title
	'manage_options', //capabilities
	'docentes_listar', //menu slug
	docentes_listar //function
	);
	
	//this is a submenu
	add_submenu_page('docentes_listar', //parent slug
	'Adicionar Novo', //page title
	'Add New', //menu title
	'manage_options', //capability
	'docentes_create', //menu slug
	'docentes_create'); //function
	
	//this submenu is HIDDEN, however, we need to add it anyways
	add_submenu_page(null, //parent slug
	'Update School', //page title
	'Update', //menu title
	'manage_options', //capability
	'docentes_update', //menu slug
	'docentes_update'); //function
	
	//cria um banco de dados wp_docentes default
	add_option('add_docentes', '');
		global $wpdb; //Variável global do WordPress para conexão com o banco de dados
 
	    //Verificaremos se existe uma certa tabela no banco de dados.
	    if($wpdb->get_var("SHOW TABLE LIKE {$wpdb->prefix}docentes") != "{$wpdb->prefix}docentes"){
	        //Se não existir a tabela, então a criaremos
	        $wpdb->query("CREATE TABLE {$wpdb->prefix}docentes(
				id_docente int not null primary key auto_increment, 
				nome varchar(100),
				cargo varchar(100),
				email varchar(100),
				lattes varchar(100),
				historico text,
				especialidade varchar(100),
				foto varchar(100))");
	    }
}
define('ROOTDIR', plugin_dir_path(__FILE__));
require_once(ROOTDIR . 'docentes_listar.php');
require_once(ROOTDIR . 'docentes_create.php');
require_once(ROOTDIR . 'docentes_update.php');
