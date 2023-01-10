<?php

require_once "./inc/functions.php";

$message = isset($_GET['error']) ? htmlspecialchars($_GET['error']) : '';

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $name = InputProcessor::processString($_POST['name'] ?? '');
    $description = InputProcessor::processString($_POST['description'] ?? '');
    $price = InputProcessor::processString($_POST['price'] ?? '');
    $image = ImageProcessor::upload($_FILES['image'] ?? '');

    $valid = $name['valid'] && $description['valid'] && $price['valid'] && $image['valid'];

    if ($valid) {

      $new_prod = ['name' => $name['value'], 'description' => $description['value'], 'price' => $price['value'], 'image' => $image['value']];
      $product = $controllers->products()->create_product($new_prod);

    if (!$product) {
      $message = "Product detail are incorrect.";
    } else {
      redirect('add-product');
    }

    }
    else {
       $message =  "Please fix the above errors. ";
   }

} 
?>


<form method="post" action=" <?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
  <section class="vh-100">
    <div class="container py-5 h-75">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

              <h3 class="mb-2">Upload Image</h3>
              <div class="form-outline mb-4">
                <input required type="text" id="Name" name="Name" class="form-control form-control-lg" placeholder="Name" value="<?= htmlspecialchars($fname['value'] ?? '') ?>"/>
                <small class="text-danger"><?= htmlspecialchars($name['error'] ?? '') ?></small>
              </div>

              <div class="form-outline mb-4">
                <input required type="text" id="Description" name="Description" class="form-control form-control-lg" placeholder="Description" value="<?= htmlspecialchars($sname['value'] ?? '') ?>"/>
                <small class="text-danger"><?= htmlspecialchars($description['error'] ?? '') ?></small>
              </div>

              <div class="form-outline mb-4">
                <input required type="number" id="Price" name="Price" class="form-control form-control-lg" placeholder="Price" value="<?= htmlspecialchars($email['value']?? '') ?>" />
                <small class="text-danger"><?= htmlspecialchars($price['error'] ?? '') ?></small>
              </div>

              <div class="form-outline mb-4">
                <input required type="file" id="Image" name="Image" class="form-control form-control-lg" placeholder="Image" />
                <small class="text-danger"><?= htmlspecialchars($image['error'] ?? '') ?></small>
              </div>

              <button class="btn btn-primary btn-lg w-100 mb-4" type="submit">Upload</button>

              <?php if ($message): ?>
                <div class="alert alert-danger mt-4">
                  <?= $message ?? '' ?>
                </div>
              <?php endif ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</form>