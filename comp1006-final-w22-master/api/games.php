<?php
require '../include/db.php';

$publisher = null;

if (!empty($_GET['publisher'])) { 
    $publisher = $_GET['publisher'];
}

$sql = "SELECT examgames.*, exampublishers.name
FROM examgames INNER JOIN exampublishers ON examgames.publisherId = exampublishers.publisherId";

if (!empty($publisher)) {
    $sql .= " WHERE exampublishers.name = :publisher";
}

$cmd = $db->prepare($sql);

if (!empty($publisher)) {
    $cmd->bindParam(':publisher', $publisher, PDO::PARAM_STR, 50);
}
$cmd->execute();
$games = $cmd->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($games);

$db = null;
?>