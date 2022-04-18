<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Saving Publisher...</title>
</head>
<body>
<?php
$name = $_POST['name'];
$ok = true;

if (empty(trim($name))) { 
    echo 'Name is required<br />';
    $ok = false;
}

if ($ok == true) {
    require 'include/db.php';


    $sql = "INSERT INTO exampublishers (name) VALUES (:name)";

    $cmd = $db->prepare($sql);
    $cmd ->bindParam(':name',$name,PDO::PARAM_STR,100);
    $cmd->execute();
    $db = null;

    echo 'Publisher Saved';
}

?>
</body>
</html>
