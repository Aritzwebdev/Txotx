<?php
require 'vendor/autoload.php';
//require 'Slim/Slim.php';
//\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();
 
$app->get('/api/listaSidrerias', 'getSidrerias');
 
$app->run();
 
function getSidrerias() {
    $sql = "SELECT * FROM sagardotegiak ORDER BY izena";
    try {
        $db = getConnection();
        $stmt = $db->query($sql);
        $sidre = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo '{"sagardotegiak": ' . json_encode($sidre) . '}';
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}
 
function getConnection() {
    $dbhost="127.0.0.1";
    $dbuser="root";
    $dbpass="zubiri";
    $dbname="txotx";
    $dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbh;
}
 
?>