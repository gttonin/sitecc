<?php
function docentes_update () {
global $wpdb;
$id = $_GET["id"];

$array =array();
$array['nome'] = $_POST['nome'];
$array['cargo'] = $_POST['cargo'];
$array['email'] = $_POST['email'];
$array['lattes'] = $_POST['lattes'];
$array['historico'] = $_POST['historico'];
$array['especialidade'] = $_POST['especialidade'];

$where = array( 'id_docente' => $id );
$where_format = array( 'id_docente' => '%d');

$format = array(); // possiveis formatos %s (string), %d (decimal) e %f (float). 
$format['nome'] = '%s';
$format['cargo'] = '%s';
$format['email'] = '%s';
$format['lattes'] = '%s';
$format['historico'] = '%s';
$format['especialidade'] = '%s';
//update
if(isset($_POST['update'])){	
	$wpdb->update(
		'wp_docentes', //table
		$array,//data
		$where, //where
		$format, //data format
		$where_format //where format
	);	
}
//delete
else if(isset($_POST['delete'])){	
	$wpdb->query($wpdb->prepare("DELETE FROM wp_docentes WHERE id_docente = %d",$id));
}
else{//selecting value to update	
	$schools = $wpdb->get_results($wpdb->prepare("SELECT *from wp_docentes where id_docente  = %d",$id));
	foreach ($schools as $s ){
		$nome=$s->nome;
		$cargo=$s->cargo;
		$email=$s->email;
		$lattes=$s->lattes;
		$historico=$s->historico;
		$especialidade=$s->especialidade;
	}
}
?>
<link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/docentes/style-admin.css" rel="stylesheet" />
<div class="wrap">
<h2>Atualizar/Remover</h2>

<?php if($_POST['delete']){?>
<div class="updated"><p>Docente deletado com sucesso</p></div>
<a href="<?php echo admin_url('admin.php?page=docentes_listar')?>">&laquo; Voltar</a>

<?php } else if($_POST['update']) {?>
<div class="updated"><p>Cadastro de Docente atualizado</p></div>
<a href="<?php echo admin_url('admin.php?page=docentes_listar')?>">&laquo; Voltar</a>

<?php } else {?>
<div id="docentes">
<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">

<dt>
    <dd>
		Nome<br>
		<input type="text" name="nome" placeholder="" required="required" value="<?php echo $nome; ?>"/><br>
		Cargo<br>
		<input type="text" name="cargo" placeholder="" required="required" value="<?php echo $cargo; ?>"/><br>
		Email<br>
		<input type="email" name="email" placeholder="" required="required" value="<?php echo $email; ?>"/><br>
		Lattes<br>
		<input type="text" name="lattes" placeholder="" required="required" value="<?php echo $lattes; ?>"/><br>
		Histórico<br>
		<textarea rows="5" cols="20" name="historico" value=""><?php echo $historico; ?></textarea><br>
		Especialidade<br>
		<input type="text" name="especialidade" placeholder="" required="required" value="<?php echo $especialidade; ?>"/><br>
		Foto<br>
		<input type="file" value="" name="foto"/><br>
    </dd>
</dt>



<input type='submit' name="update" value='Salvar' class='button'> &nbsp;&nbsp;
<input type='submit' name="delete" value='Deletar' class='button' onclick="return confirm('Tem certeza que deseja deletar?')">
</form>
</div>
<?php }?>

</div>
<?php
}