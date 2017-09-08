<?php

if(isset($_POST['details']) && !empty($_POST['details'])){
    include $_SERVER['DOCUMENT_ROOT'].'/config/db.php';



    $query = $PDO->prepare("SELECT * FROM tasks WHERE tasks_id=?");
    $query->bindParam(1,$_POST['details']);

    $query->execute();
    
    $res = $query->fetchObject();
        
    echo json_encode($res);
    
}



?>