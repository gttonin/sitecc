<?php

/**
 * Plugin Name: Docentes
*/

function mostra_html_docentes($post)
{
	$cargo = get_post_meta( $post->ID, "docentes_cargo", true );
	$email = get_post_meta( $post->ID, "docentes_email", true );
	$website = get_post_meta( $post->ID, "docentes_website", true );
	$lattes = get_post_meta( $post->ID, "docentes_lattes", true );
	$especialidade = get_post_meta( $post->ID, "docentes_especialidade", true );

	echo <<<HTML

<table class="form-table">
	<tbody>
		<tr>
			<td>Cargo:</td>
			<td>
				<input type="text" class="large-text" name="docentes_cargo" placeholder="Digite o cargo do docente" value="{$cargo}" />
			</td>
		</tr>
		<tr>
			<td>Email:</td>
			<td>
				<input type="email" class="large-text" name="docentes_email" placeholder="Digite o email do docente" value="{$email}" />
			</td>
		</tr>
		<tr>
			<td>Website:</td>
			<td>
				<input type="url" class="large-text" name="docentes_website" placeholder="Digite o website do docente" value="{$website}" />
			</td>
		</tr>
		<tr>
			<td>Lattes:</td>
			<td>
				<input type="url" class="large-text" name="docentes_lattes" placeholder="Digite o lattes do docente" value="{$lattes}" />
			</td>
		</tr>
		<tr>
			<td>Especialidade:</td>
			<td>
				<input type="text" class="large-text" name="docentes_especialidade" placeholder="Digite a especialidade do docente" value="{$especialidade}" />
			</td>
		</tr>
	</tbody>
</table>

HTML;

}

function docentes_inicializa_metabox()
{
	add_meta_box( "metabox_info_docentes", 
				  "Informações adicionais",
				  "mostra_html_docentes",
				  "docente",
				  "advanced",
				  "high");
}

function docentes_salva_dados($post_id)
{
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}

	if (!current_user_can('edit_post' )) {
		return;
	}

	$dadosPossiveis = array(
		"docentes_cargo",
		"docentes_email",
		"docentes_website",
		"docentes_lattes",
		"docentes_especialidade"
	);

	foreach ($dadosPossiveis as $campo) {

		if ( !isset($_POST[$campo]) ) {
			continue;
		}

		$dado = esc_attr( $_POST[$campo] );

		update_post_meta( $post_id, $campo, $dado );
	}
}

function docentes_inicializa()
{
	register_post_type ( "docente", array(
		'labels' => array(

      		'name'               =>  'Docentes',
			'singular_name'      =>  'Docente',
			'menu_name'          =>  'Docentes',
			'name_admin_bar'     =>  'Docente' ,
			'add_new'            =>  'Adicionar novo' ,
			'add_new_item'       =>  'Adicionar novo Docente' ,
			'new_item'           =>  'Novo Docente' ,
			'edit_item'          =>  'Editar Docente',
			'view_item'          =>  'Ver Docente',
			'all_items'          =>  'Listagem de Docentes' ,
			'search_items'       =>  'Buscar Docentes',
			'parent_item_colon'  =>  'Docente pai:',
			'not_found'          =>  'Nenhum docente encontrado.',
			'not_found_in_trash' =>  'Nenhum docente encontrado na lixeira.',

      	),
		"public" => true,
		"show_ui" => true,
		"menu_position" => 5,
		"menu_icon" => "dashicons-admin-users",
		"supports" => array( "title", "editor", "thumbnail" ),
		"has_archive"=> true,
		"rewrite" => array(
			"slug" => "docentes"
		),
		"register_meta_box_cb" => "docentes_inicializa_metabox"
	));

	add_action( 'save_post', "docentes_salva_dados" );
}

add_action("init", "docentes_inicializa");