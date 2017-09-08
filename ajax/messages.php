<?php session_start();
include $_SERVER['DOCUMENT_ROOT'].'/config/db.php';

if(isset($_POST['id']) && !empty($_POST['id'])){

    $query = $PDO->query("SELECT * FROM messages LEFT JOIN chief ch on ch.chief_id = messages_from WHERE messages_from='$_POST[id]' OR messages_from='$_SESSION[id]' AND  messages_to = '$_SESSION[id]' OR  messages_to = '$_POST[id]'");
    
   $res =  $query->fetchAll(PDO::FETCH_ASSOC);
    
    
    if(count($res) > 0){
        echo json_encode($res);
    }else{
        echo 0;
    }
    
}

if(isset($_POST['send']) && !empty($_POST['send'])){
    
    $read = 0;
    $query = $PDO->prepare("INSERT INTO messages (messages_text,messages_from,messages_to,messages_read) VALUES (?,?,?,?)");
    
    $query->bindParam(1,$_POST['send']);
    $query->bindParam(2,$_SESSION['id']);
    $query->bindParam(3,$_POST['data_attr']);
    $query->bindParam(4,$read);
    
    $res = $query->execute();
    
    if($res){
        echo 1;
    }else{
        echo 0;
    }
    
   
    
}
?> 