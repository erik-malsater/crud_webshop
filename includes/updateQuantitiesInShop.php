<?php

if(session_id() == '') {
    session_start();
}
/*
Hämtar antalet beställda produkter och lägger in i array för att kunna använda som 
placeholders i textfälten när produkterna skrivs ut.
*/

$pdo = new PDO(
    "mysql:host=localhost;dbname=database;charset=utf8",
    "root",
    "root"
    );


$statement = $pdo->prepare("SELECT * FROM shopping_carts WHERE customer_id = :customer_id");


$statement->execute(
[
    ":customer_id" => $_SESSION['userID']
]
);


$fetchedCart = $statement->fetch();



$productQuantity = array();
    foreach($fetchedCart as $key => $value){
        
        if (strstr($key, 'quantity'))
        {
            $productQuantity[] = $value;
        }
        
        }

