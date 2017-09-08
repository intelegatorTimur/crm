<?php

class AuthHelper{
    
    public static function check(){
     
        

     
        if(!empty($_POST['auth_login']) && !empty($_POST['auth_password'])){
            $log = $_POST['auth_login'];
            $preg = preg_match('/^[a-zA-Z0-9\_]{3,100}$/',$log,$arr);
           if($preg == 1){
               $ps = AuthModel::auth($log);

               if($ps != false && is_array($ps)){
                   if(password_verify($_POST['auth_password'],$ps['chief_password'])){
                       $_SESSION['login'] = 1;
                       $_SESSION['id'] =  $ps['chief_id'];
                       $_SESSION['email'] =  $ps['chief_email'];
                       $_SESSION['priv'] =  $ps['chief_status'];
                       $_SESSION['name'] = $ps['chief_login'];
                 
                       if(AuthModel::online($_SESSION['id'])){
                           header("Location: ".HOST);
                       }
                       
                   }
               }else{
                   echo "GET OUT";
               }
           }
          
           
            
        }
    }
}


?>