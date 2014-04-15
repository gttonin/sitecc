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
	global $wpdb;
	
	if (!empty($foto["name"])) {
 
		// Largura máxima em pixels
		$largura = 1500;
		// Altura máxima em pixels
		$altura = 1800;
		// Tamanho máximo do arquivo em bytes
		$tamanho = 100000;
 
    	// Verifica se o arquivo é uma imagem
		$padrao = "^image/(pjpeg|jpeg|png|gif|bmp)$";
    	if(!ereg($padrao, $foto["type"])){
     	   $error[1] = "Isso não é uma imagem.";
   	 	} 
 
		// Pega as dimensões da imagem
		$dimensoes = getimagesize($foto["tmp_name"]);
 
		// Verifica se a largura da imagem é maior que a largura permitida
		if($dimensoes[0] > $largura) {
			$error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
		}
 
		// Verifica se a altura da imagem é maior que a altura permitida
		if($dimensoes[1] > $altura) {
			$error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
		}
 
		// Verifica se o tamanho da imagem é maior que o tamanho permitido
		if($foto["size"] > $tamanho) {
   		 	$error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
		}
 
		// Se não houver nenhum erro
		if (count($error) == 0) {
 
			// Pega extensão da imagem
			preg_match("/.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
			
        	// Gera um nome único para a imagem
        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
			
			
        	// Caminho de onde ficará a imagem
        	$caminho_imagem = 'fotos/'.$foto["name"];
			
			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($foto["tmp_name"], $caminho_imagem);
			
 
		}
		
		// Se houver mensagens de erro, exibe-as
		if (count($error) != 0) {
			foreach ($error as $erro) {
				$message = $erro . " ";
				echo $message;
			}
		}
		else{
			$wpdb->insert(
				$wpdb->prefix."docentes", //table
				array('nome' => $nome,'cargo' => $cargo,'email'=>$email, 'lattes'=>$lattes, 'historico'=>$historico, 'especialidade' =>$especialidade ,'foto' => $nome_imagem), //data
				array('%s','%s','%s','%s','%s','%s','%s') //data format			
			);
			$message.="Docente adicionado com sucesso";
		}
	}
}
?>
<style>

</style>
<link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/sinetiks-schools/style-admin.css" rel="stylesheet" />
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
		<input type="file" name="foto"/><br>
    </dd>
		<input type='submit' name="insert" value='Salvar' class='button'>
</dt>

</form>
</div>
</div>
<?php
}