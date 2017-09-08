<?php

if(isset($_POST['delete']) && !empty($_POST['delete'])){
    include $_SERVER['DOCUMENT_ROOT'].'/config/db.php';
    
    
    $query = $PDO->prepare("DELETE FROM tasks WHERE tasks_id=?");
    
    $query->bindParam(1,$_POST['delete']);
    
    $res = $query->execute();
    
    if($res){
        echo 1;
    }else{
        echo 0;
    }
}



?>