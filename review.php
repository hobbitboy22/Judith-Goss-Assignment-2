<?php require __DIR__ . "/inc/header.php"; ?>
<?php session_start() ?>
<?php require __DIR__ . "/components/review-form.php"; ?>

<style><?php include "css/StyleSheet" ?></style>

<?php

    if(isset($_SESSION['loggedIn']) == true){
        echo "Welcome " . $_SESSION['user']['firstname'];
    }
    else{
        echo "Please log in to write a review"; 
        echo ('<form action = "./login.php">
            <input type = "submit" class = "button" id = "reviewbutton" value = "Login"/>
        </form>');
    }


?>

<?php require __DIR__ . "/inc/footer.php"; ?>