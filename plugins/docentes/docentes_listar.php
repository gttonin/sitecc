<?php
function docentes_listar () {
?>
<link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/docentes/style-admin.css" rel="stylesheet" />
<div class="wrap">

<h1>Docentes Cadastrados</h1>

<a class='button' href="<?php echo admin_url('admin.php?page=docentes_create'); ?>">Adicionar Novo</a><br/>
<?php

global $wpdb;
$rows = $wpdb->get_results("SELECT *from wp_docentes");
echo "<br /><table class='linhasAlternadas' >";
echo "<tr><th>Nome</th><th>Cargo</th><th>Email</th><th>Ação</th></tr>";

foreach ($rows as $row ){
	echo "<tr>";
	echo "<td>$row->nome</td>";
	echo "<td>$row->cargo</td>";	
	echo "<td>$row->email</td>";
	echo "<td><a class='button' href='".admin_url('admin.php?page=docentes_update&id='.$row->id_docente)."'>Atualizar/Remover</a></td>";
	echo "</tr>";
}
echo "</table>";
?>
</div>
<?php
} ?>