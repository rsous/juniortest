<?php

  class Validator extends Dbh {
    private $data;
    private $table = 'products';
    private $typesTable = 'product_types';
    private $errors = [];
    private $regexOnlyNums = '/^([0-9]+|[0-9]+\.[0-9]+)$/';

    public function __construct($post_data) {
      $this->data = $post_data;
    }

    public function validateForm() {
      $this->validateType();
      $this->validateName();
      $this->validateSKU();
      $this->validatePrice();
      $this->validateCustomAttr();
      
      print_r(json_encode($this->errors));
      return json_encode($this->errors);
    }

    private function validateType() {
      if(empty($this->data['type'])) {
        $this->addError('type', "Please, select a product type");
        return false;
      } 
      return true;
    }

    private function validateName() {
      $name = $this->data['name'];

      if(empty($name)) {
        $this->addError('name', 'Name field cannot be empty');
      } 
      elseif(!preg_match('/^[0-9A-Za-z\s\-]{2,}$/', $name)) {
        $this->addError('name', 'Name must be at least 2 characters long and include only letters and numbers');
      }
    }

    private function validateSKU() {
      $sku = $this->data['sku'];

      $query = "SELECT id FROM $this->table WHERE sku LIKE '%$sku%'";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute();
      $skuExists = $stmt->fetchAll();

      if(empty($sku)) {
        $this->addError('sku', 'Sku field cannot be empty');
      }
      elseif($skuExists) {
        $this->addError('sku', 'SKU already exists');
      } 
      elseif(!ctype_alnum($sku)) {
        $this->addError('sku', 'SKU must contain only letters and numbers');
      }
    }

    private function validatePrice() {
      $price = $this->data['price'];

      if(empty($price)) {
        $this->addError('price', 'Price field cannot be empty');
      }
      elseif(!preg_match($this->regexOnlyNums, $price)) {
        $this->addError('price', 'Price must contain only numbers and one optional decimal point');
      }
    }

    private function validateCustomAttr() {
      // If a type was selected, validate custom attribute
      if($this->validateType()) {
        $customAttr = $this->getTypeCustomAttr();
        $customAttr = explode(' ', $customAttr);

        foreach($customAttr as $entry) {
          $lowerEntry = strtolower($entry);
          $attr = $this->data["$lowerEntry"];

          if(empty($attr)) {
            $this->addError($lowerEntry, $entry . ' field cannot be empty');
          } 
          elseif(!preg_match($this->regexOnlyNums, $attr)) {
            $this->addError($lowerEntry, $entry . ' must contain only numbers and one optional decimal point');
          }
        }
      }
    }
    
    private function addError($key, $value) {
      $this->errors[$key] = $value;
    }

    public function getType() {
      $type = $this->data['type'];

      if ($type) {
        $query = "SELECT name FROM $this->typesTable WHERE id = $type";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $productType = $stmt->fetch();
        
        if($productType) {
          return $productType['name'];
        }
      }
      return false;
    }

    public function getTypeCustomAttr() {
      $type = $this->data['type'];
      $query = "SELECT custom_attr FROM $this->typesTable WHERE id = $type";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute();
      $productCustomAttr = $stmt->fetch();
      
      if($productCustomAttr) {
        return $productCustomAttr['custom_attr'];
      }
    }
  }

?>