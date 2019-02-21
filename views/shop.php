<?php

if(session_id() == '') {
    session_start();
}

//Användaren får endast gå till denna sida om denne är inloggad.
if($_SESSION['username'] === NULL){
    header('Location: login.php');
}

include '../includes/updateQuantitiesInShop.php';

?>

<!DOCTYPE html>
<html lang="sv">

    <head>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Shopping</title>


        <link rel="stylesheet" href="../css/style.css" type="text/css">

        <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">

    </head>

    <body>

        <div class="container">

            <h1>Hej <?=$_SESSION['username']?>!</h1>

            <form action="../views/checkout.php" method="post" id="customerForm"></form>

            <div class="productContainer">

                <?php
        
                include '../includes/productList.php';
                

                for($i = 0; $i < count($productList); $i++){
                
                    $productCard = $productList[$i];
                    
                        
                    include '../includes/productCardShop.php'
                    
                    ?><?php
                    }

                
                ?>

            </div>

            <div class="buttonContainerUnderProducts">

                <form action="../includes/quit.php" method="post" id="quit">
                    <div class="sendFormButtonBox">
                        <input type="submit" value="Logga ut">
                    </div>
                </form>

                <form action="../views/checkout.php" method="post">
                    <div class="sendFormButtonBox">
                        <input type="submit" value="Gå till kundkorg">
                    </div>
                </form>

            </div>
        </div>

    </body>

</html>
