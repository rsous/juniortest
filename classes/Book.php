<?php

  class Book extends Product {

    private $postData;

    public function __construct($postData) {
      $this->postData = $postData;
    }

    public function setAttributes() {
      $this->title = $this->postData->name;
      $this->sku = $this->postData->sku;
      $this->price = $this->postData->price;
      $this->custom_attr = $this->postData->weight;
      $this->type_id = $this->postData->type;
    }
  }

?>