<?php
include_once("conectar.php");
require 'vendor/autoload.php';
require 'Slim/Slim.php';
 
$app = new Slim();
 
$app->get('/sidrerias', 'getSidrerias');
 
$app->run();
 
function getSidrerias() {
    $sql = "select * FROM sagardotegiak";
    try {
        $stmt = query($sql);
        $sidrerias = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo '{"sagardotegiak": ' . json_encode($sidrerias) . '}';
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}
 
?>