<?php

require_once "./inc/functions.php";



if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $name = InputProcessor::processEmail($_POST['name'] ?? '');
    $description = InputProcessor::processPassword($_POST['description'] ?? '');
    $price = InputProcessor::processString($_POST['price'] ?? '');
    $image = InputProcessor::processFile($_FILES['image'] ?? '');

    $valid = $email['valid'] && $password['valid'];

    if ($valid) {
  
        $member = $controllers->members()->login_member($email['value'], $password['value']);

    if (!$member) {
        $message = "User details are incorrect.";
     } else {
        redirect('member');
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
                <small class="text-danger"><?= htmlspecialchars($fname['error'] ?? '') ?></small>
              </div>

              <div class="form-outline mb-4">
                <input required type="text" id="Description" name="Description" class="form-control form-control-lg" placeholder="Description" value="<?= htmlspecialchars($sname['value'] ?? '') ?>"/>
                <small class="text-danger"><?= htmlspecialchars($sname['error'] ?? '') ?></small>
              </div>


              <div class="form-outline mb-4">
                <input required type="number" id="Price" name="Price" class="form-control form-control-lg" placeholder="Price" value="<?= htmlspecialchars($email['value']?? '') ?>" />
                <small class="text-danger"><?= htmlspecialchars($email['error'] ?? '') ?></small>
              </div>

              <div class="form-outline mb-4">
                <input required type="file" id="Image" name="Image" class="form-control form-control-lg" placeholder="Image" />
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