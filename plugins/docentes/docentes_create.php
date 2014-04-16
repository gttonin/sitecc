<?php
function docentes_create () {
$nome = $_POST['nome'];
$cargo = $_POST['cargo'];
$email = $_POST['email'];
$lattes = $_POST['lattes'];
$historico = $_POST['historico'];
$especialidade = $_POST['especialidade'];
$foto = $_FILES['foto'];


//insert
if(isset($_POST['insert'])){

			include_once ("funcao/Redimensiona.php");	
			chmod ("images/", 0777);
			$redim = new Redimensiona();
			$src=$redim->Redimensionar($foto, 700, "images");
			global $wpdb;	
			$wpdb->insert(
				$wpdb->prefix."docentes", //table
				array('nome' => $nome,'cargo' => $cargo,'email'=>$email, 'lattes'=>$lattes, 'historico'=>$historico, 'especialidade' =>$especialidade ,'foto' => $src), //data
				array('%s','%s','%s','%s','%s','%s','%s') //data format			
			);
			$message.="Docente adicionado com sucesso";

	
}
?>
<style>

</style>
<link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/docentes/style-admin.css" rel="stylesheet" />
<div class="wrap">
<h2>Adicionar um novo docente</h2>
<?php if (isset($message)): ?><div class="updated"><p><?php echo $message;?></p></div><?php endif;?>
<div id="docentes">
<form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
<p>Preencha o formulário</p>
<dt>
    <dd>
		Nome<br>
		<input type="text" name="nome" placeholder="" required="required" value="<?php echo $nome;?>"/><br>
		Cargo<br>
		<input type="text" name="cargo" placeholder="" required="required" value="<?php echo $cargo;?>"/><br>
		Email<br>
		<input type="email" name="email" placeholder="" required="required" value="<?php echo $email;?>"/><br>
		Lattes<br>
		<input type="text" name="lattes" placeholder="" required="required" value="<?php echo $lattes;?>"/><br>
		Histórico<br>
		<textarea rows="5" cols="20" name="historico" value="<?php echo $historico; ?>"></textarea><br>
		Especialidade<br>
		<input type="text" name="especialidade" placeholder="" required="required" value="<?php echo $especialidade;?>"/><br>
		Foto<br>
		<input type="file" name="foto" /><br>
    </dd>
		<input type='submit' name="insert" value='Salvar' class='button'>
</dt>

</form>
</div>
</div>
<?php
}