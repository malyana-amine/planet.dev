<?php

include '../classes/category.php' ;
include '../classes/article.php' ;

?>


<?php
$id = $_GET['id'];
  $ss1 = new article();
  $ss1->deleteArticle($id);

  header('Location: articles.php');