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
    <script src="js/script.js" defer></script>
    <script src="js/validate.js" defer></script>
    <title>Scandiweb test</title>
  </head>
  <body>
    <header class="header">
      <h1 class="header__title">Product Add</h1>
      <div class="header__actions">
        <a name="submit" class="btn btn-save">Save</a>
        <a href="index.php" class="btn">Cancel</a>
      </div>
    </header>

    <div class="form__wrapper">
      <form action="includes/create.php" method="POST" class="form" id="product_form">
        <div class="form__group">
          <label for="sku">SKU</label>
          <input type="text" id="sku" name="sku" class="form__input">
          <div class="form__warning">
           
          </div>
        </div>
        <div class="form__group">
          <label for="name">Name</label>
          <input type="text" id="name" name="name" class="form__input">
          <div class="form__warning">
          
          </div>
        </div>
        <div class="form__group">
          <label for="price">Price</label>
          <input type="text" id="price" name="price" class="form__input">
          <div class="form__warning">
          
          </div>
        </div>
        <div class="form__group">
          <label for="type">Type</label>
          <select name="type" class="form__input" id="productType">
            <option value="">--</option>
            <option value="1">DVD</option>
            <option value="2">Book</option>
            <option value="3">Furniture</option>
          </select>
          <div class="form__warning">
            
          </div>
        </div>
        <div class="form__group custom-attr custom-attr-1">
          <label for="size">Size (MB)</label>
          <input type="text" id="size" name="size" class="form__input" disabled>
          <div class="form__warning">
            
          </div>
          <p>Please, specify the size of the product in megabytes.</p>
        </div>
        <div class="form__group custom-attr custom-attr-2">
          <label for="weight">Weight (KG)</label>
          <input type="text" id="weight" name="weight" class="form__input" disabled>
          <div class="form__warning">
            
          </div>
          <p>Please, specify the weight of the product in kilograms.</p>
        </div>
        <div class="form__group custom-attr custom-attr-3">
          <div class="form__group">
            <label for="height">Height (CM)</label>
            <input type="text" id="height" name="height" class="form__input" disabled>
            <div class="form__warning">
             
            </div>
          </div>
          <div class="form__group">
            <label for="width">Width (CM)</label>
            <input type="text" id="width" name="width" class="form__input" disabled>
            <div class="form__warning">
            
            </div>
          </div>
          <div class="form__group">
            <label for="length">Length (CM)</label>
            <input type="text" id="length" name="length" class="form__input" disabled>
            <div class="form__warning">
             
            </div>
          </div>
          <p>Please, specify the dimensions of the product in HxWxL format.</p>
        </div>
        <input type="submit" value="submit" name="submit">
      </form>
    </div>

    <?php include 'templates/footer.php'; ?>
  </body>
</html>