<?php

if(session_id() == '') {
    session_start();
}

$pdo = new PDO(
    "mysql:host=localhost;dbname=database;charset=utf8",
    "root",
    "root"
);

$statement = $pdo->prepare("SELECT customer_name, adress, phone_number, email FROM customers WHERE username = :username");

$statement->execute(
    [
        ":username" => $_SESSION['username']
    ]
);

$fetchedUser = $statement->fetch();


