<div class="conteudo container-fluid formandos">

<?php 

$anos = get_terms(array("ano_formacao"));

foreach ($anos as $ano) {
  $args = array(
    'tax_query' => array(
      $ano->slug
    )
  );

  $formandos = new WP_Query($args);

  echo "<h3>{$ano->name}</h3>";
  echo "<div class='slider-formandos'>";
  foreach ($formandos->posts as $formando) {
    for ($i=0; $i < 4; $i++) { 
      
    echo "<div><img src='http://fakeimg.pl/200x200' /></div>";
    }
  }
  echo "</div>";
}

?>

</div>