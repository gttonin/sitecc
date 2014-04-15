<?php
function docentes_listar () {
?>
<link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/sinetiks-schools/style-admin.css" rel="stylesheet" />
<div class="wrap">
<h2>Docentes Cadastrados</h2>
<a href="<?php echo admin_url('admin.php?page=docentes_create'); ?>">Adicionar Novo</a>
<?php
global $wpdb;
$rows = $wpdb->get_results("SELECT *from wp_docentes");
echo "<table class='wp-list-table widefat fixed'>";
echo "<tr><th>Nome</th><th>Cargo</th><th>Ação</th></tr>";
foreach ($rows as $row ){
	echo "<tr>";
	echo "<td>$row->nome</td>";
	echo "<td>$row->cargo</td>";	
	echo "<td><a href='".admin_url('admin.php?page=docentes_update&id='.$row->id_docente)."'>Atualizar</a></td>";
	echo "</tr>";}
echo "</table>";
?>
</div>
<?php
}