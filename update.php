<?php

include "Database.php";

$db = new Database("localhost", "root", "root", "crud_system");


if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["name"]) and isset($_POST["email"]) and isset($_POST["id"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $id = $_POST["id"];

        $array = [
            "name" => $name,
            "email" => $email
        ];
        
        $table = "user";
        
        $db->update($array, $table, $id);
        
    }
    
    
}

$array = ["name", "email", "id"];
$table = "user";

$response = $db->read($array, $table);

?>

<?php foreach($response as $user): ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <p>Nome:</p>
        <input name="name" value="<?= $user["name"] ?>" required>
        <p>Email:</p>
        <input name="email" value="<?= $user["email"] ?>" required>
        <input name="id" value="<?= $user["id"] ?>" style="display: none">
        <button type="submit">Atualizar</button>
        <hr>
    </form>
<?php endforeach ?>
</body>
</html>