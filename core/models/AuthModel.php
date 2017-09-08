<?php

class AuthModel{
    public static function auth($auth_login){
        global $PDO;
        
        $query = $PDO->query("SELECT * FROM chief WHERE chief_login = '$auth_login'")->fetch(PDO::FETCH_ASSOC);
        
        if(!empty($query['chief_login'])){
            return $query;
        }else{
            return false;
        }
        
    }
   public static function online($id){
       global $PDO;
       
       $query = $PDO->query("UPDATE chief SET chief_online = 1 WHERE chief_id = $id");
       
       return $query;
   }
}

?>