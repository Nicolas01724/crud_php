<?php

include "Database.php";

$db = new Database("localhost", "root", "root", "crud_system");


if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["id"])) {
        $id = $_POST["id"];
        
        $table = "user";
        
        $db->delete($table, $id);
        
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
        <p name="name">Name: <?= $user["name"] ?></p>
        <p>Email:</p>
        <p name="email">Email: <?= $user["email"] ?></p>
        <input name="id" value="<?= $user["id"] ?>" style="display: none">
        <button type="submit">Deletar</button>
        <hr>
    </form>
<?php endforeach ?>
</body>
</html>