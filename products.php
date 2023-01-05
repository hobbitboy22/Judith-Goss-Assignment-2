<?php require __DIR__ . "/inc/header.php"; ?>
<?php session_start(); ?>
<?php require "./inc/functions.php"; ?>

<style><?php include "css/StyleSheet" ?></style>

<h1>Products!</h1>

<?php

   $products = $member = $controllers->products()->get_all_products(); ?>
   
<table>
   <tr>
   <?php foreach ($products as $product){ ?>
      <td>
         <div class="container text-center">
            <div class="row align-items-start">

               <div class="col-3" >
                  <div class = "row">
                     <p id = "productshow"><?= $product['name'] ?></p>
                  </div>
                  <div class = "row">
                     <p id = "productshow"><?= $product['price'] ?></p>
                  </div>
                  <div class = "row">
                     <p id = "productshow"><?= $product['description'] ?></p>
                  </div>
               </div>

            </div>
         </td>
      </div>
   <?php } ?>
   </tr>
</table>


<?php require __DIR__ . "/inc/footer.php"; ?>