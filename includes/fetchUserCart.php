<?php

if(session_id() == '') {
    session_start();
}

$pdo = new PDO(
    "mysql:host=localhost;dbname=database;charset=utf8",
    "root",
    "root"
);

$statement2 = $pdo->prepare("SELECT * FROM shopping_carts WHERE customer_id = :customer_id");

$statement2->execute(
    [
        ":customer_id" => $_SESSION['userID']
    ]
);

$fetchedCart = $statement2->fetch();

