<?php
/**
 * Plugin Name: Eventos
 */

add_action("admin_enqueue_scripts","eventos_carrega_script");

function inicializa_plugin_eventos() {
    $args = array(
		'public' => true,
		'labels'  => array(

      		'name'               =>  'Eventos',
			'singular_name'      =>  'Evento',
			'menu_name'          =>  'Eventos',
			'name_admin_bar'     =>  'Evento' ,
			'add_new'            =>  'Adicionar novo' ,
			'add_new_item'       =>  'Adicionar novo Evento' ,
			'new_item'           =>  'Novo Evento' ,
			'edit_item'          =>  'Editar Evento',
			'view_item'          =>  'Ver Evento',
			'all_items'          =>  'Listagem de Eventos' ,
			'search_items'       =>  'Buscar Eventos',
			'parent_item_colon'  =>  'Evento pai:',
			'not_found'          =>  'Nenhum evento encontrado.',
			'not_found_in_trash' =>  'Nenhum evento encontrado na lixeira.',

      	),
      	"register_meta_box_cb" => function ($post) {
      		add_meta_box( "dataseventos", "Datas", "eventos_carrega_metabox_datas", "evento", "advanced", "high");
      		add_meta_box( "localeventos", "Localização", "eventos_carrega_metabox_local", "evento", "advanced", "high");
      		add_meta_box( "observacoeseventos", "Observações", "eventos_carrega_metabox_observacao", "evento", "advanced", "high");
      	}
    );


    register_post_type( 'evento', $args ); // aqui sempre singular
}

function eventos_salva_dados_no_banco($post_id){

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}
	if (!current_user_can('edit_post' )) {
		return;
	}

	$campos = array (
		"dhinicial",
		"dhfinal",
		"endereco",
		"bairro",
		"numero",
		"complemento",
		"cidade",
		"estado",
		"observacoes"
	);


	foreach ($campos as $campo) {
		if (isset($_POST[$campo]) && $_POST[$campo]) {
			update_post_meta($post_id,$campo,esc_attr($_POST[$campo]));
		}
	}
}

add_action( 'init', 'inicializa_plugin_eventos' ); // gancho de inicialização -- inserindo nosso código no wordpress

add_action('save_post','eventos_salva_dados_no_banco'); //gancho do banco de dados

function eventos_carrega_metabox_datas($post) {
	$dhinicial = get_post_meta( $post->ID, "dhinicial",true );
	$dhfinal = get_post_meta( $post->ID, "dhfinal",true );
	echo <<<HTML
<table class="form-table">
	<tr>
		<td><label>Data e hora inicial</label></td>
		<td><input class="large-text datahora" type="text" name="dhinicial" id="dhinicial" value="{$dhinicial}" /></td>
	</tr>
	<tr>
		<td><label>Data e hora final</label></td>
		<td><input class="large-text datahora" type="text" name="dhfinal" id="dhfinal" value="{$dhfinal}" /></td>
	</tr>
</table>
HTML;

}

function eventos_carrega_metabox_local($post) {

	/*populando os inputs*/
	$endereco = get_post_meta($post->ID, "endereco", true );
	$bairro = get_post_meta($post->ID, "bairro", true );
	$numero = get_post_meta($post->ID, "numero", true );
	$complemento = get_post_meta($post->ID, "complemento", true );
	$cidade = get_post_meta($post->ID, "cidade", true );
	$estado = get_post_meta($post->ID, "estado", true );
	echo <<<HTML
<table class="form-table">
	<tr>
		<td><label>Endereço</label></td>
		<td><input class="large-text" type="text" name="endereco" id="endereco" value="{$endereco}" /></td>
	</tr>
	<tr>

		<td><label>Bairro</label></td>
		<td><input class="large-text" type="text" name="bairro" id="bairro" value="{$bairro}" /></td>
	</tr>
	<tr>

		<td><label>Número</label></td>
		<td><input class="large-text" type="text" name="numero" id="numero" value="{$numero}" /></td>
	</tr>
	<tr>
		<td><label>Complemento</label></td>
		<td><input class="large-text" type="text" name="complemento" id="complemento" value="{$complemento}" /></td>
	</tr>
	<tr>

		<td><label>Cidade</label></td>
		<td><input class="large-text" type="text" name="cidade" id="cidade" value="{$cidade}" /></td>
	</tr>
	<tr>

		<td><label>Estado</label></td>
		<td><input class="large-text" type="text" name="estado" id="estado" value="{$estado}" /></td>
	</tr>
</table>
HTML;

}

function eventos_carrega_metabox_observacao($post) {
	$observacoes = get_post_meta($post->ID, "observacoes",true );
	echo <<<HTML
<table class="form-table">
	<tr>
		<td><label>Observações</label></td>
		<td><input class="large-text" type="text" name="observacoes" id="observacoes" value="{$observacoes}"/></td>
	</tr>
</table>
HTML;

}

function eventos_carrega_script() {
	
	wp_enqueue_script( "maskedinput",plugins_url( "/js/jquery.maskedinput.min.js", __FILE__ ));
	wp_enqueue_script( "eventos_scripts",plugins_url( "/js/scripts.js", __FILE__ ));
}