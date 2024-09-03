<?php

include "Database.php";

$db = new Database("localhost", "root", "root", "crud_system");
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];

    $array = [
        "name" => $name,
        "email" => $email
    ];


    $table = "user";
    $db->create($array, $table);

}

    $db->close();


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>
<body>
    <form method="POST">
        <p>Digite seu nome:</p>
        <input type="text" name="name">
        <p>Digite seu email:</p>
        <input type="text" name="email">
        <button type="submit">Enviar</button>
    </form>
</body>
</html>

