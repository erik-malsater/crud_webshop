<?php
for($i = 0; $i < count($productList); $i++){
    $productCard = $productList[$i];
    $quantityString = "quantity_of_" . $productCard['code'];
    if ($fetchedCart[$quantityString] > 0) {
        ?>
    
            <div class="productCard">

                <p class="productDataColumn">
                    <?=$productCard['title']?>
                </p>

                <p class="productDataColumn">
                    á
                    
                    <?=$productCard['price']?>kr
                </p>

                <p class="productDataColumn">
                    x
                    <?=$fetchedCart[$quantityString]; ?>
                    
                </p>

                <p class="productDataColumn">
                    =
                    <?=($fetchedCart[$quantityString] * $productCard['price'])?>kr
                </p>
                

                <form action="../includes/removeFromCart.php" method="post" id="removeFromCartForm<?=$productCard['code']?>"></form>
                <div class="productDataColumn removeFromCartButtonBox">
                        <input type="submit" value="Ta bort" form="removeFromCartForm<?=$productCard['code']?>">
                        <input id="hiddenProductCode" name="hiddenProductCode" type="hidden" value="<?=$productCard['code']?>" form="removeFromCartForm<?=$productCard['code']?>">
                </div>


            </div>

            <hr>

            <?php
    }
    
    $sum += ($productCard['price'] * $fetchedCart[$quantityString]);
}

?>