<?php ?>
<div class="productCard">



    <div class="productDataColumn">
        <div class="productImageFrame"><img class="productImage" src="<?= $productCard['image'] ?>" alt="<?= $productCard['title'] ?>" title="<?= $productCard['title'] ?>"></div>
    </div>



    <div class="productDataColumn">
        <p>
            <?= $productCard['title']; ?>
        </p>
    </div>



    <div class="productDataColumn">
        <p>Pris:
            <?= $productCard['price']; ?>kr
        </p>
    </div>


    <form action="../includes/addToCart.php" method="post" id="addProductsForm<?=$productCard['code']?>">

        <div class="productDataColumn">

            
            
            <label for="numberOfProducts" form="addProductsForm<?=$productCard['code']?>">Antal</label>

            <!--Här läggs placeholdern in.-->

            <input id="numberOfProducts" name="numberOfProducts" type="text" form="addProductsForm<?=$productCard['code']?>" value="<?=$productQuantity[$i]?>">
            
            <!--För att i addToCarts.php enkelt kunna se för vilken produkt antals-ändringen gäller skickas en dold variabel med som är unik för produkten.-->

            <input id="hiddenProductCode" name="hiddenProductCode" type="hidden" value="<?=$productCard['code']?>">

        </div>

        <div class="productDataColumn">

            <input type="submit" value="Lägg till" form="addProductsForm<?=$productCard['code']?>">

        </div>

        

        <!--
        Ifall användaren gjort en ändring i antalet produkter så ska skrivs "Tillagt" ut,
        men om anändaren gått vidare till checkout.php och sedan går tillbaka till shop.php så ska denna text försvinna.
        -->
        <div class="productDataColumn">
            <?php
            if (isset($_POST['removeAddedToCartTag'])) {
                if ($_POST['removeAddedToCartTag'] === "true") {
                    $_SESSION['updated'.$productCard['code']] = false;
                }
            }
            if (isset($_GET['updated'])) {
                if ($_GET['updated'] === $productCard['code']) {
                    $_SESSION['updated'.$productCard['code']] = true;
                }
            }
            if (isset($_SESSION['updated'.$productCard['code']])) {
                if ($_SESSION['updated'.$productCard['code']]) {
                    ?><p class="updatedAddToCart">Tillagt</p><?php
                }
            }
            ?>

        </div>

    </form>
  

</div>

<?php

    if((count($productList) - $i) !== 1){

        ?><hr><?php
        }
?>
