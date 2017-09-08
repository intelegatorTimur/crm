<?php

class ValidationHelper{
    
    public static function validation_login_name($arr){
        $login_name = true;
        if(is_array($arr)){
            foreach($arr as $value){
               $res =  preg_match('/^[a-zA-Z0-9\_\-]{3,50}$/',$value); 
                if($res == 1){
                    $login_name = true;
                }else{
                    $login_name = false;
                }
            }
            return $login_name;
        }else{
            echo "ERROR, is not array";
        }
    }
    
    public static function validation_email($arr){
        $email = true;
        if(is_array($arr)){
            foreach($arr as $value){
                $res = preg_match('/^[a-z0-9\_\-\.]{3,50}@{1}[a-z]{1,50}\.{1}\w{2,20}\.{0,1}\w{0,20}$/',$value);
                if($res == 1){
                    $email = true;
                }else{
                    $email = false;
                }
            }
            return $email;
        }else{
            echo "ERROR, is not 1array";
        }
    }

    public static function validation_phone($arr){
       $phone = true;
        if(is_array($arr)){
            foreach($arr as $value){
                $res = preg_match('/^\+{1}\d{2}\({1}\d{3}\){1}\d{3}\-{0,1}\d{2}\-{0,1}\d{2}$/',$value);  
                if($res == 1){
                    $phone = true;
                }else{
                    $phone = false;
                }
                
            }
            return $phone;
        }else{
            echo "ERROR, is not 2array";
        }
    }

    public static function validation_empty($arr){
        if(is_array($arr)){
            $empty = true;
            foreach($arr as $value){
                if(!empty($value)){
                    $empty = true;
                }else{
                    $empty = false;

                }
            }
            return $empty;
        }else{
            echo "ERROR, is not 3array";
        }
        
    }

    
    
}



?>