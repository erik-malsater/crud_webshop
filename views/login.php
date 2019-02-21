<?php 

if(session_id() == '') {
    session_start();
}

//Användaren loggas ut genom att gå till denna sida genom att username blir NULL. 
$_SESSION['username'] = NULL;


?>

<!DOCTYPE html>
<html lang="sv">

    <head>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Logga in</title>


        <link rel="stylesheet" href="../css/style.css" type="text/css">

        <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">

    </head>

    <body>

        <div class="container" id="indexContainer">

            <form action="../includes/loginProcess.php" method="post" id="registerForm">

                <h1>Logga in</h1>

                <div class="formRow">
                    <label for="loginUsername" class="hiddenFormLabel">Användarnamn</label>
                    <input class="textWindow" id="loginUsername" name="loginUsername" type="text" placeholder="Användarnamn">
                </div>

                <div class="formRow">
                    <label for="loginPassword" class="hiddenFormLabel">Lösenord</label>
                    <input class="textWindow" id="loginPassword" name="loginPassword" type="password" placeholder="Lösenord">
                </div>

                <?php
                    if (isset($_GET['login_failed'])) {
                        if ($_GET['login_failed']) {
                            ?>
                        <p class="formWarning">Fel lösenord</p>
                        <?php
                        }
                    }


                ?>
                
            </form>


            <div class="sendFormButtonBox">
                <form>
                    <input type="submit" value="Logga in" form="registerForm">
                </form>
            </div>

            <p class="whiteSmallPrint">Inget konto? <a href="../index.php">Registrera dig</a></p>

        </div>

    </body>

</html>
