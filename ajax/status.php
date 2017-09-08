<?php

if(isset($_POST['online']) && !empty($_POST['online'])){
    include $_SERVER['DOCUMENT_ROOT'].'/config/db.php';

    $query = $PDO->query("SELECT j.job_name,ch.chief_name,ch.chief_online FROM chief ch LEFT JOIN job j on ch.chief_job=j.job_id");
    
    $res = $query->fetchAll();
    
    
    echo json_encode($res);
   

}



?>