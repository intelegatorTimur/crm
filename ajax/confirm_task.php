<?php

if(isset($_POST['id']) && !empty($_POST['id'])){
    
    include $_SERVER['DOCUMENT_ROOT'].'/config/db.php';
    
    if($_POST['target'] == 'finish'){
     
        
        $query = $PDO->prepare("UPDATE tasks SET tasks_status = ? WHERE tasks_id = ?");
        $status = 2;
        $query->bindParam(1,$status);
        $query->bindParam(2,$_POST['id']);
        
        $res = $query->execute();
      if($res){
          echo 1;
      }else{
          echo 0;
      }
      
        
    }elseif($_POST['target'] == 'confirm'){
    
       
        $query = $PDO->prepare("UPDATE tasks SET tasks_status = ? WHERE tasks_id = ?");
        $status = 1;
        $query->bindParam(1,$status);
        $query->bindParam(2,$_POST['id']);


        
        $res = $query->execute();
        if($res){
            echo 1;
        }else{
            echo 0;
        }
        
      
    }
}



?>