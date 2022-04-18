<?php



try {
    require 'include/db.php';

    $sql= "select * from examcategories";

    $cmd = $db->prepare($sql);
    $cmd->execute();
    $games = $cmd->fetchAll();
    

    $db = null;
}
catch (exception $e) {
    header('location:error.php');
}
?>
</body>
</html>

