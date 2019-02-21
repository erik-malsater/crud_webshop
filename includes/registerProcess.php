<?php
if(session_id() == '') {
    session_start();
}

include 'functions.php';

/*
Kollar att användaren fyllt i alla kontaktuppgifter för att avgöra
om denne ska skickas tillbaka till index.php eller få fortsätta.
*/

$_SESSION['missingUsername'] = isEmpty($_POST['registerUsername']);
$_SESSION['missingPassword'] = isEmpty($_POST['registerPassword']);
$_SESSION['missingCustomerName'] = isEmpty($_POST['customerName']);
$_SESSION['missingAdress'] = isEmpty($_POST['adress']);
$_SESSION['missingPhone'] = isEmpty($_POST['phone']);
$_SESSION['missingEmail'] = isEmpty($_POST['email']);

/*
Om något formulärfält är tomt behöver inte användaren skriva om alla andra fält
då de får de värden som användaren nyss skickat in.
*/

$_SESSION['placeholderUsername'] = $_POST['registerUsername'];
$_SESSION['placeholderCustomerName'] = $_POST['customerName'];
$_SESSION['placeholderAdress'] = $_POST['adress'];
$_SESSION['placeholderPhone'] = $_POST['phone'];
$_SESSION['placeholderEmail'] = $_POST['email'];



if($_SESSION['missingUsername'] || $_SESSION['missingPassword'] || $_SESSION['missingCustomerName']
 || $_SESSION['missingAdress'] || $_SESSION['missingPhone'] || $_SESSION['missingEmail']){
    header('Location: ../index.php');
    exit;
}

//Skapar ny rad i "customers" och lägger in ifyllda personuppgifter.

$pdo = new PDO(
    "mysql:host=localhost;dbname=database;charset=utf8",
    "root",
    "root"
);


$username = $_POST['registerUsername'];
$password = $_POST['registerPassword'];
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
$customerName = $_POST['customerName'];
$adress = $_POST['adress'];
$phoneNumber = (int)$_POST['phone'];
$email = $_POST['email'];



$statement = $pdo->prepare(
    "INSERT INTO customers (username, password, customer_name, adress, phone_number, email) 
    VALUES (:username, :password, :customerName, :adress, :phoneNumber, :email)");

$statement->execute(
    [
        ":username" => $username,
        ":password" => $hashedPassword,
        ":customerName" => $customerName,
        ":adress" => $adress,
        ":phoneNumber" => $phoneNumber,
        ":email" => $email
    ]
    );

//Skapar kundkorg för den registrerade användaren för att senare endast behöva använda UPDATE för att lägga in produkter

$statement2 = $pdo->prepare("INSERT INTO shopping_carts (customer_id) SELECT id FROM customers WHERE username = :username");

$statement2->execute(
    [
        ":username" => $username
    ]
    );



$pdo = new PDO(
    "mysql:host=localhost;dbname=database;charset=utf8",
    "root",
    "root"
);

//Hämtar användarens id och gör som SESSION-variabel för att lätt kunna hitta rätt kundkorg senare

$statement3 = $pdo->prepare("SELECT id FROM customers WHERE username = :username");

$statement3->execute(
    [
        ":username" => $username
    ]
    );

$fetchedUser = $statement3->fetch();


$_SESSION['userID'] = $fetchedUser['id'];
$_SESSION['username'] = $username;
//header('Location: ../views/checkout.php');
header('Location: ../views/shop.php');

