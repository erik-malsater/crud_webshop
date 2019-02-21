<?php

if(session_id() == '') {
    session_start();
}


//Gör om den dolda variabeln för att sedan kunna använda den för att välja rätt kolumn i sql-frågan.
$string = "quantity_of_" . $_POST['hiddenProductCode'];

$numberOfProducts = (int)$_POST['numberOfProducts'];

$userID = $_SESSION['userID'];


$pdo = new PDO(
    "mysql:host=localhost;dbname=database;charset=utf8",
    "root",
    "root"
    );


$statement = $pdo->prepare(
    "UPDATE shopping_carts 
    SET $string = :numberOfProducts 
    WHERE customer_id = :userID");

$statement->execute(
    [
        ":numberOfProducts" => $numberOfProducts,
        ":userID" => $userID
    ]
);

//Skickar med en GET-variabel tillbaka för att veta vilken produkt som ska få texten "Tillagt".

$updated = $_POST['hiddenProductCode'];

header('Location: ../views/shop.php?updated='.$updated);
