<?php

class auth{
    public static function index(){
        include MODELS."AuthModel.php";
        
        
            
     
            include VIEWS."auth.php";
     
      
        
        
        
        
        
        if(isset($_POST['auth_submit'])){
            $glob = AuthHelper::check();
            
        }
       
        
        
    }
}

?>