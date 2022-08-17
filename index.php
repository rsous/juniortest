<?php

  include 'includes/class-autoloader.php';

  $productObj = new Product();
  $products = $productObj->getProducts();
  
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/style.css" />
    <title>Scandiweb test</title>
    <script src="js/script.js" defer></script>
  </head>
  <body>
    <header class="header">
      <h1 class="header__title">Product List</h1>
      <div class="header__actions">
        <a href="addproduct.php" class="btn">ADD</a>
        <a  id="delete-product-btn" class="btn">MASS DELETE</a>
      </div>
    </header>

    <div class="products">
      <form action="includes/delete.php" method="post" class="products__form">
        <?php foreach($products as $product) { ?>
          <div class="product">
              <input type="checkbox" name="productIds[]" class="delete-checkbox" value="<?php echo htmlspecialchars($product['id']); ?>"/>
              <div class="product__info">
                <span class="product__sku"><?php echo htmlspecialchars($product['sku']); ?></span>
                <span class="product__name"><?php echo htmlspecialchars($product['title']); ?></span>
                <span class="product__price"><?php echo htmlspecialchars($product['price']); ?></span>
                <span class="product__size"><?php echo htmlspecialchars($product['custom_attr']); ?></span>
              </div>
          </div>
        <?php } ?>
        <input type="submit" value="submit" hidden>
      </form>
    </div>

    <?php include 'templates/footer.php'; ?>
  </body>
</html>