<?php

include "Database.php";

$db = new Database("localhost", "root", "root", "crud_system");

$array = ["name", "email"];
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
    <div>
        <h1>Nome: <?= $user["name"]?></p>
        <h2>Email: <?= $user["email"]?></h1>
        <hr>
    </div>
<?php endforeach ?>
</body>
</html>