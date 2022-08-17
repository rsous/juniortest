<?php

  include 'class-autoloader.php';

  $validation = new Validator($_POST);
  $errors = $validation->validateForm();
  $errors = json_decode($errors);
  $errors = (array) $errors;
  $type = $validation->getType();

  if (empty(array_filter($errors))) {
    $postData = json_encode($_POST);
    $data = json_decode($postData);

    $product = new $type($data);
    $product->setAttributes();
    $product->create();
  }

?>