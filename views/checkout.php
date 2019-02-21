<?php

if(session_id() == '') {
    session_start();
}


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


    <?php


    include '../includes/fetchUserData.php';


    include '../includes/fetchUserCart.php';


    include '../includes/productList.php';

    ?>

       

    <div class="container" id="checkoutContainer">

        <h1>Din kundkorg</h1>

        <div class="productContainer">

            <div class="personalDataBox">
                <p>Personuppgifter:</p>
                <p>
                    <?= $fetchedUser['customer_name']; ?>
                </p>
                <p>
                    <?= $fetchedUser['adress']; ?>
                </p>
                <p>
                    <?= $fetchedUser['phone_number']; ?>
                </p>
                <p>
                    <?= $fetchedUser['email']; ?>
                </p>
            </div>

            <?php

            

            $sum = 0;
            
            include '../includes/productCardCheckout.php';


            if($sum > 0){ ?>

                <p class="productDataColumn">Totalt:
                    <?= $sum ?>kr</p><?php ; 

            } else{ 
                
                ?><p class="productDataColumn">Din varukorg är tom</p><?php

            } ?>

        </div>

        <div class="buttonContainerUnderProducts">


            <form action="../includes/quit.php" method="post" id="quit">
                <div class="sendFormButtonBox">
                    <input type="submit" value="Logga ut">
                </div>
            </form>



            <form action="shop.php" method="post">
                <div class="sendFormButtonBox">
                    <input type="submit" value="Till shop">
                    <input name="removeAddedToCartTag" type="hidden" value="true">
                </div>
            </form>



            <?php
            if($sum > 0){ ?>
                <form action="confirm.php" method="post">
                    <div class="sendFormButtonBox">
                        <input type="submit" value="Genomför köp">
                    </div>
                </form>
            <?php } ?>



        </div>

    </div>

</body>

</html>
