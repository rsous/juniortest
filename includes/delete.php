<?php

  include 'class-autoloader.php';

  $product = new Product();

  if (!empty($_POST)) {
    $productIds = $_POST['productIds'];
    $ids = implode(',', $productIds);
    $product->delete($ids);
  }

  header('Location: ../index.php');

?>