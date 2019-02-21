<?php

if(session_id() == '') {
    session_start();
}


$pdo = new PDO(
    "mysql:host=localhost;dbname=database;charset=utf8",
    "root",
    "root"
    );

$username = $_POST['loginUsername'];
$password = $_POST['loginPassword'];


$statement = $pdo->prepare("SELECT * FROM customers WHERE username = :username");


$statement->execute(
[
    ":username" => $username,
]
);

$fetched_user = $statement->fetch();


$is_password_correct = password_verify($password, $fetched_user['password']);


if($is_password_correct){
    $_SESSION['username'] = $fetched_user['username'];
    $_SESSION['userID'] = $fetched_user['id'];
    header('Location: ../views/shop.php');
} else{
    header('Location: ../views/login.php?login_failed=true');
    
}
