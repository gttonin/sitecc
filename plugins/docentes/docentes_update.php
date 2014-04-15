<?php
function docentes_update () {
global $wpdb;
$id = $_GET["id"];
$name=$_POST["name"];
//update
if(isset($_POST['update'])){	
	$wpdb->update(
		'school', //table
		array('name' => $name), //data
		array( 'ID' => $id ), //where
		array('%s'), //data format
		array('%s') //where format
	);	
}
//delete
else if(isset($_POST['delete'])){	
	$wpdb->query($wpdb->prepare("DELETE FROM wp_docentes WHERE id_docente = %d",$id));
}
else{//selecting value to update	
	$schools = $wpdb->get_results($wpdb->prepare("SELECT nome from wp_docentes where id_docente  = %d",$id));
	foreach ($schools as $s ){
		$name=$s->nome;
	}
}
?>
<link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/sinetiks-schools/style-admin.css" rel="stylesheet" />
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
		<select>
			<option value="0"> Escolha um nome...</option>
			<?php 
			$res = $wpdb->get_results($wpdb->prepare("SELECT nome from wp_docentes"));
				foreach($res as $s){
				$nome=$s->nome;
			?>
			<option value="1"><?php echo $nome; ?></option>
			<?php
			}
			?>
		</select><br>
		Cargo<br>
		<input type="text" name="Cargo" placeholder="" required="required" value="<?php echo get_option('meu_wp');?>"/><br>
		Email<br>
		<input type="email" name="email" placeholder="" required="required" value="<?php echo get_option('meu_wp');?>"/><br>
		Lattes<br>
		<input type="text" name="lattes" placeholder="" required="required" value="<?php echo get_option('meu_wp');?>"/><br>
		Histórico<br>
		<textarea rows="5" cols="20" name="historico"></textarea><br>
		Especialidade<br>
		<input type="text" name="especialista" placeholder="" required="required" value="<?php echo get_option('meu_wp');?>"/><br>
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