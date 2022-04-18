<?php

if (empty($_SESSION['username'])) {
    header('location:login.php?invalid=true');
}
try {
    require 'include/db.php';
    $sql="truncate table examitems";
    $cmd = $db->prepare($sql);
    $cmd->execute();
    header('location:games.php');
    $db = null;
    
    
}
catch (exception $e) {
    header('location:error.php');
}

?>