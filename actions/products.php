<?php

require('../providers/database.php');
$dbconfig = require('../config/database.php');

$database = new DataBase($dbconfig['host'], $dbconfig['database'], $dbconfig['username'], $dbconfig['password'], $dbconfig['port']);
$connection = $database->connect();
if($connection == null) {
    echo json_encode([ "error" => "Could not connect to the database" ]);
    die();
}

$query = $connection->prepare('SELECT * FROM products');

if($query->execute()) {
    echo json_encode($query->fetchAll(PDO::FETCH_ASSOC));
}else {
    echo json_encode([ "error" => "Unable to list products :/" ]);
}

?>