<?php
/** 
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */ 

var_dump($_SERVER);
var_dump($OPENSHIFT_MYSQL_DB_HOST, $OPENSHIFT_MYSQL_DB_PORT);

$ambientes = array (
  'desenvolvimento' => array (
    'host'     => 'http://sitecc.dev', 
    'dbhost'   => 'localhost',
    'database' => 'sitecc',
    'user'     => 'root',
    'pass'     => ''
  ),
  'producao' => array (
    'host'     => 'http://staging-esuffs.rhcloud.com', 
    'dbhost'   => "$OPENSHIFT_MYSQL_DB_HOST:$OPENSHIFT_MYSQL_DB_PORT",
    'database' => 'staging',
    'user'     => 'admingzeGqH5',
    'pass'     => 'ClzU1F-9419B'
  )
);

$ambiente = $ambientes['desenvolvimento'];
$env = "desenvolvimento";

if (isset($OPENSHIFT_MYSQL_DB_PORT)){
  $ambiente = $ambientes['producao'];
  $env = "producao";
}
 
// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', $ambiente['database']);

/** Usuário do banco de dados MySQL */
define('DB_USER', $ambiente['user']);

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', $ambiente['pass']);

/** nome do host do MySQL */
define('DB_HOST', $ambiente['dbhost']);

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '$EM&t|e#0^843J++kG $J|XHh7Zxp0AWCZroD(=0;:n-Zh@h9V45CjRKRT]RT,<;');
define('SECURE_AUTH_KEY',  '-RkljV)3V9m^ Eo:&DLn*[0>3t9X|X91xPAMx*[IGRy=QB@[Y>1O9wL(-tr?18rw');
define('LOGGED_IN_KEY',    'O3LtKVmkE[)E yq0Q$ C+,[c.N-N4RZ73{]g2.Js|0@C-12WZ(9Q9AyW.&M)}I*]');
define('NONCE_KEY',        '>(gcyU|sG%eLhtC[j`8Mt,L(d..4I`y2e&b>P7sMBq?%qP8A7!Ge-$KQ;Ws}<[aB');
define('AUTH_SALT',        'ja-O@{:<]uQ]8~gETY8?xiR3&Z_M?mXKsxD]q-scZcBs}Mk,x>xl)p>xMW%!`feZ');
define('SECURE_AUTH_SALT', 'VD@bkAq2|=?&Z_,>=}9+H- /-A?OWleSxn72-Jn*{XK|kB$}+R5hXTd<.I/^nE)o');
define('LOGGED_IN_SALT',   'zY_uGw$@dR5cMQ9`d!fm4$v0-_H[93zw7XlhoknY:xyb2?#-Mjy!$bO#ZC<1iGk+');
define('NONCE_SALT',       'LU-W<IW?Jhl![aqtd/=#LW:~$!TpwMi+Fy^jNC>HG8u~-SQALwy@i?A*ObZ<>wFJ');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';

/**
 * O idioma localizado do WordPress é o inglês por padrão.
 *
 * Altere esta definição para localizar o WordPress. Um arquivo MO correspondente ao
 * idioma escolhido deve ser instalado em wp-content/languages. Por exemplo, instale
 * pt_BR.mo em wp-content/languages e altere WPLANG para 'pt_BR' para habilitar o suporte
 * ao português do Brasil.
 */
define('WPLANG', 'pt_BR');

/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', $env == "producao" ? false : true);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');
