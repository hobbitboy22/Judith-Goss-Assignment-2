<?php require __DIR__ . "/inc/header.php"; ?>
<?php

   include "./inc/functions.php";
   session_start();

?>


<?php

   if(isset($_SESSION['user'])){
      echo "Welcome " . $_SESSION['user']['firstname'];
   }
   else{
      echo "Welcome!";
   }

   var_dump($_SESSION);

?>

<?php require __DIR__ . "/inc/footer.php"; ?>