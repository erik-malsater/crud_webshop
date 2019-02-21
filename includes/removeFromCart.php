<?php

if(session_id() == '') {
    session_start();
}

$string = "quantity_of_" . $_POST['hiddenProductCode'];

$numberOfProducts = 0;

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

var_dump($_POST['hiddenProductCode']);
var_dump($string);

header('Location: ../views/checkout.php');

