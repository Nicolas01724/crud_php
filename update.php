

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="update.php">
        <label for="nomeMudar">Digite o seu nome para dar update:</label>
        <input type="text" name="nomeMudar">
        <label for="nome">Digite o novo nome:</label>
        <input type="text" name="nome">
        <label for="email">Digite o novo email:</label>
        <input type="text" name="email">
        <input type="submit" value="Atualizar">
    </form>
</body>
</html>

<?php
    include 'connection.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $old_name = $_POST["nomeMudar"];
        $new_name = $_POST["nome"];
        $new_email =$_POST["email"];

        if($new_email == null) {
            $sql = "UPDATE user SET name = '$new_name' WHERE name = '$old_name'";
        } else if($new_name == null) {
            $sql = "UPDATE user SET email = '$new_email' WHERE name = '$old_name'";
        } else {
            $sql = "UPDATE user SET name = '$new_name', email = '$new_email' WHERE name = '$old_name'";
        }
        
        if($conn -> query($sql)){
            echo "Atualização realizada.";
        } else {
            echo "Errp $sql" . $conn -> error;
        }
    }

    $conn -> close();
?>