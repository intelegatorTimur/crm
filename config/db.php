<?php
try{
    $PDO = new PDO("mysql:host=localhost;dbname=crm","root","");
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    $e->getMessages();
}


?>