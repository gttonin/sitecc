<?php
/*
Template Name: Resultado de Busca
*/

$term = esc_attr($_GET['s']);

$query = new WP_Query(array(
  "post_type" => array("noticia", "blog"),
  "post_status" => "publish",
  "s" => $term
));

?>

<h2>Resultados da busca por "<?php echo $term ?>"</h2>

<?php if ($query->posts): ?>
  <?php foreach ($query->posts as $resultado): ?>
    <?php echo var_dump($resultado); ?>
  <?php endforeach ?>
<?php else: ?>
  <h5 class="text-center">Nenhum resultado encontrado...</h5>
<?php endif ?>