<?php
    include 'connection.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $name = $_POST["nome"];
        $email = $_POST["email"];

        $sql = "INSERT INTO user (name, email) VALUE ('$name','$email')";

        if($conn -> query($sql)){
            echo "Novo registro adicionado com sucesso!";
        } else {
            echo "Erro $sql <br>" . $conn -> error;
        }

    }

    $conn -> close();
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CREATE</title>
    </head>
    <body>
        <form method="post" action="create.php">
            <label for="Nome">Digite seu nome:</label>
            <input type="text" name="nome" require>
            <label for="Email">Digite seu email:</label>
            <input type="text" name="email" require>
            <input type="submit" value="Adicionar">
        </form>
    </body>
    </html>

