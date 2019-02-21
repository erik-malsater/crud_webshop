<?php 

if(session_id() == '') {
    session_start();
}

//Användaren loggas ut genom att gå till denna sida genom att username blir NULL. 
$_SESSION['username'] = NULL;

include 'includes/functions.php';

?>

<!DOCTYPE html>
<html lang="sv">

    <head>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Registrera dig</title>


        <link rel="stylesheet" href="css/style.css" type="text/css">

        <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">

    </head>

    <body>

        <div class="container" id="indexContainer">

            <form action="includes/registerProcess.php" method="post" id="registerForm">

                <h1>Registrera dig</h1>

                <div class="formRow">
                    <label for="registerUsername" class="hiddenFormLabel">Användarnamn</label>
                    <input class="textWindow" id="registerUsername" name="registerUsername" type="text" placeholder="Användarnamn" 
                    value="<?php if(isset($_SESSION['placeholderUsername'])){
                        echo $_SESSION['placeholderUsername'];
                        }?>">
                </div>


                <?php 
                if(isset($_SESSION['missingUsername'])){
                    printWarningIfFromDataIsMissing($_SESSION['missingUsername']);
                }
                ?>

                <div class="formRow">
                    <label for="registerPassword" class="hiddenFormLabel">Lösenord</label>
                    <input class="textWindow" id="registerPassword" name="registerPassword" type="password" placeholder="Lösenord">
                </div>


                <?php 
                if(isset($_SESSION['missingPassword'])){
                    printWarningIfFromDataIsMissing($_SESSION['missingPassword']);
                }
                ?>


                <div class="formRow">
                    <label for="customerName" class="hiddenFormLabel">Namn</label>
                    <input class="textWindow" id="customerName" name="customerName" type="text" placeholder="Namn" 
                    value="<?php if(isset($_SESSION['placeholderCustomerName'])){
                        echo $_SESSION['placeholderCustomerName'];
                        }?>">
                </div>

                <?php 
                if (isset($_SESSION['missingCustomerName'])) {
                    printWarningIfFromDataIsMissing($_SESSION['missingCustomerName']);
                }
                ?>


                <div class="formRow">
                    <label for="adress" class="hiddenFormLabel">Adress</label>
                    <input class="textWindow" id="adress" name="adress" type="text" placeholder="Adress" 
                    value="<?php if(isset($_SESSION['placeholderAdress'])){
                        echo $_SESSION['placeholderAdress'];
                        }?>">
                </div>

                <?php
                if (isset($_SESSION['missingAdress'])) {
                    printWarningIfFromDataIsMissing($_SESSION['missingAdress']);
                }
                ?>


                <div class="formRow">
                    <label for="phone" class="hiddenFormLabel">Telefon</label>
                    <input class="textWindow" id="phone" name="phone" type="tel" placeholder="Telefon" 
                    value="<?php if(isset($_SESSION['placeholderPhone'])){
                        echo $_SESSION['placeholderPhone'];
                        }?>">
                </div>


                <?php
                if (isset($_SESSION['missingPhone'])) {
                    printWarningIfFromDataIsMissing($_SESSION['missingPhone']);
                }   
                ?>



                <div class="formRow">
                    <label for="email" class="hiddenFormLabel">E-postadress</label>
                    <input class="textWindow" id="email" name="email" type="email" placeholder="E-postadress" 
                    value="<?php if(isset($_SESSION['placeholderEmail'])){
                        echo $_SESSION['placeholderEmail'];
                    }?>">
                </div>


                <?php 
                if(isset($_SESSION['missingEmail'])){
                    printWarningIfFromDataIsMissing($_SESSION['missingEmail']);
                }
                ?>


                
            </form>


            <div class="sendFormButtonBox">
                <form>
                    <input type="submit" value="Registrera" form="registerForm">
                </form>
            </div>

            <p class="whiteSmallPrint"><a href="views/login.php">Logga in</a></p>

        </div>

    </body>

</html>