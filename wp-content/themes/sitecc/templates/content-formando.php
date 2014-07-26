<div class="conteudo container-fluid formandos">

<?php 

$anos = get_terms(array("ano_formacao"));

foreach ($anos as $ano) {
  $args = array(
    "post_type" => "formando",
    'tax_query' => array(
      array(
        "taxonomy" => "ano_formacao",
        "field" => "slug",
        "terms" => array($ano->slug)
      )
    )
  );

  $formandos = new WP_Query($args);

  echo "<h3>{$ano->name}</h3>";
  echo "<div class='slider-formandos'>";
  foreach ($formandos->posts as $formando) {
    echo "<div>";
    echo get_the_post_thumbnail($formando->ID, "medium",array('class'=>'imagem-capa'));
    echo "</div>";
  }
  echo "</div>";
}

?>

</div>