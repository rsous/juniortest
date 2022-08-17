<?php

  class Product extends Dbh {

    protected $table = 'products';
    protected $type_id;
    protected $title;
    protected $sku;
    protected $price;
    protected $custom_attr;

    public function getProducts() {
      $query = 'SELECT
          t.name as type_name,
          p.id,
          p.type_id,
          p.title,
          p.sku,
          p.price,
          p.custom_attr,
          p.created_at
        FROM
          ' . $this->table . ' p
        LEFT JOIN
          product_types t ON p.type_id = t.id
        ORDER BY
          p.id
      ';

      $stmt = $this->connect()->prepare($query);
      $stmt->execute();
      $products = $stmt->fetchAll();

      // Get product types attributes
      $queryTypeInfo = "SELECT * FROM product_types ORDER BY id";
      $stmtTypeInfo = $this->connect()->prepare($queryTypeInfo);
      $stmtTypeInfo->execute();
      $typeInfo = $stmtTypeInfo->fetchAll();

      $formattedProducts = array();
    
      // Format price values & add prefixes to custom attribute
      foreach($products as $product) {
        $product['custom_attr'] = $typeInfo[$product['type_id'] - 1]['prefix'] . ': ' . $product['custom_attr'] . $typeInfo[$product['type_id'] - 1]['unit'];
        $product['price'] = '$' . number_format($product['price'], 2); 
        array_push($formattedProducts, $product);
      }

      return $formattedProducts;
    }

    public function create() {
      $query = 'INSERT INTO ' . $this->table . ' 
      SET
      title = :title,
      sku = :sku,
      price = :price,
      custom_attr = :custom_attr,
      type_id = :type_id';
      
      $stmt = $this->connect()->prepare($query);

      // Clean data
      $this->title = htmlspecialchars(strip_tags($this->title));
      $this->sku = htmlspecialchars(strip_tags($this->sku));
      $this->price = htmlspecialchars(strip_tags($this->price));
      $this->custom_attr = htmlspecialchars(strip_tags($this->custom_attr));
      $this->type_id = htmlspecialchars(strip_tags($this->type_id));

      // Bind data
      $stmt->bindParam(':title', $this->title);
      $stmt->bindParam(':sku', $this->sku);
      $stmt->bindParam(':price', $this->price);
      $stmt->bindParam(':custom_attr', $this->custom_attr);
      $stmt->bindParam(':type_id', $this->type_id);

      if($stmt->execute()) {
        return true;
      }

      printf("Error: %s.\n", $stmt->error);
    }

    public function delete($data) {
      $query = 'DELETE FROM ' . $this->table . " WHERE id IN($data)";
      $stmt = $this->connect()->prepare($query);
      
      if($stmt->execute()) {
        return true;
      }

      printf("Error: %s.\n", $stmt->error);
    }
  }

?>