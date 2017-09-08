<?php

class main{
    
    public static function index(){
        include MODELS."MainModel.php";
        include VIEWS."main.php";
        
        
        if(isset($_GET['exit']) && $_GET['exit'] == 'logout'){
            
            if(MainModel::logout()){
                unset($_SESSION['login']);
                unset($_SESSION['id']);
                unset($_SESSION['email']);
                unset($_SESSION['priv']);
                unset($_SESSION['name']);
              
                header("Location:http://fev.loc");
            }
  
      
        }
    }
    
    
    public static function add_tasks(){
        include MODELS."MainModel.php";
        include VIEWS."main.php";
  
        if(isset($_POST['add_submit'])){
            
            MainModel::add_task();
            
        }
     
    }
    
    
    public static function my_tasks(){
    
        include MODELS."MainModel.php";
        include VIEWS."main.php";
    }
    
    public static function messages(){
        include MODELS."MainModel.php";
        include VIEWS."main.php";
    }
    
    public static function settings(){
        include MODELS."MainModel.php";
        
        include VIEWS."main.php";
        
       if(isset($_POST['submit'])){
           
           $valid1 =  ValidationHelper::validation_empty(array($_POST['new_name'],$_POST['new_departments'],$_POST['new_job'],$_POST['new_email'],$_POST['new_phone'],$_POST['new_status'],$_POST['new_login'],$_POST['new_password']));
          
           
           
           
           $valid2 = ValidationHelper::validation_login_name(array($_POST['new_name'],$_POST['new_login']));
           $valid3 = ValidationHelper::validation_email(array($_POST['new_email']));
           $valid4 = ValidationHelper::validation_phone(array($_POST['new_phone']));
           
           
           if($valid1 AND $valid2 AND $valid3 AND $valid4){
               MainModel::insert_user();
               
           }else{
               echo "<script>alert();</script>";
           }
           
       
        
        
    }
        if(isset($_GET['deluser']) && !empty($_GET['deluser']) && is_numeric($_GET['deluser']) && !isset($_GET['confirm'])){
            echo "<script>
            if(confirm('Are you sure?')){
              window.location.href = window.location.href+'&confirm=true';
            }

        </script>";
        }
        if(isset($_GET['deluser']) && !empty($_GET['deluser']) && is_numeric($_GET['deluser']) && isset($_GET['confirm']) && $_GET['confirm'] == true){
            MainModel::delete_user();
        }
}
    
    
    
public static function redact(){
    include MODELS."MainModel.php";
    include VIEWS."main.php";
    
    if(isset($_POST['red_submit'])){
        if(ValidationHelper::validation_empty(array($_POST['red_password']))){
            if(ValidationHelper::validation_email(array($_POST['red_email'])) && ValidationHelper::validation_phone(array($_POST['red_phone'])) && ValidationHelper::validation_login_name(array($_POST['red_login'])) && ValidationHelper::validation_login_name(array($_POST['red_name']))){
                MainModel::insert_redac_user_pass();
            }
        }else{
            if(ValidationHelper::validation_email(array($_POST['red_email'])) && ValidationHelper::validation_phone(array($_POST['red_phone'])) && ValidationHelper::validation_login_name(array($_POST['red_login'])) && ValidationHelper::validation_login_name(array($_POST['red_name']))){
                MainModel::insert_redac_user_no_pass();
            }
        }
    }
    


}
    
    
    
    
    
}
?>