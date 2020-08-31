<?php

if(!isset($_POST['title']) || !isset($_POST['description']) || !isset($_POST['price'])){
    echo json_encode([ "error" => "Inform all values" ]);
    die();
}

$title = $_POST['title'];
$description = $_POST['description'];
$price = $_POST['price'];

if(!is_numeric($price)) {
    echo json_encode([ "error" => "Price ins't valid number" ]);
    die();
}

require('../providers/database.php');
$dbconfig = require('../config/database.php');

$database = new DataBase($dbconfig['host'], $dbconfig['database'], $dbconfig['username'], $dbconfig['password'], $dbconfig['port']);
$connection = $database->connect();
if($connection == null) {
    echo json_encode([ "error" => "Could not connect to the database" ]);
    die();
}

$query = $connection->prepare('INSERT INTO products (title, description, price) VALUES (?, ?, ?);');
$query->bindParam(1, $title);
$query->bindParam(2, $description);
$query->bindParam(3, $price);

if($query->execute()) {
    echo json_encode([ 
        "id" => $connection->lastInsertId(),
        "title" => $title,
        "description" => $description,
        "price" => $price
    ]);
}else {
    echo json_encode([ "error" => "The product could not be saved :/" ]);
}

?>