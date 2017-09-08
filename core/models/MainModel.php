<?php


class MainModel{
    
    public static function get_departments_select(){
        global $PDO;
        
        $query = $PDO->query("SELECT * FROM departments");
        
        while($arr = $query->fetch(PDO::FETCH_ASSOC)){
            $option .= "
                <option value='$arr[dept_id]'>$arr[dept_name]($arr[dept_location])</option>
            ";
            
        }
        
        return $option;
    }
    
    
    
    
    
    
    
    public static function get_status_select(){
        global $PDO;
        
        
        $query = $PDO->query("SELECT * FROM status");
        
        while($arr = $query->fetch(PDO::FETCH_ASSOC)){
            $option .= "
                <option value='$arr[status_id]'>$arr[status_job]</option>
            ";

        }
        
        return $option;

    }
    
    
    
    
    
    
    
    public static function get_job_select(){
        global $PDO;
        
        $query = $PDO->query("SELECT * FROM job ORDER BY job_sort");
        
        $sort = 0;
        
        while($arr = $query->fetch(PDO::FETCH_ASSOC)){
            if(!empty($arr['job_name'])) {
                if($sort != $arr['job_sort']) {
                    $sort = $arr['job_sort'];

                    $option .= "<optgroup label='______'></optgroup>";
                    $option .= "
                        <option value='$arr[job_id]'>$arr[job_name]</option>
                    ";
                } else {
                    $option .= "
                        <option value='$arr[job_id]'>$arr[job_name]</option>
                    ";
                }
            }
        }

        return $option;
    }
    
    
    
    
    public static function redact_get_user(){
        global $PDO;
        $get = is_numeric($_GET['edituser']);
        if($get == true){
            $query = $PDO->query("SELECT * FROM chief ch LEFT JOIN departments d ON ch.chief_departments = d.dept_id LEFT JOIN job j ON ch.chief_job = j.job_id LEFT JOIN phones ph ON ch.chief_phone = ph.phones_id LEFT JOIN status st ON ch.chief_status = st.status_id WHERE ch.chief_id = '$_GET[edituser]'")->fetch(PDO::FETCH_ASSOC);
            
            return $query;
        }
        
        
        
        
        
    }
    
    public static function add_task(){
        global $PDO;
     
        $add_name = addslashes(htmlspecialchars($_POST['add_name']));
        $add_description = htmlspecialchars($_POST['add_description']);
        
        move_uploaded_file($_FILES['add_file']['tmp_name'],'upload/'.$_FILES['add_file']['name']);
        
        $query = $PDO->query("INSERT INTO tasks (tasks_name,
                                                tasks_description,
                                                tasks_departments,
                                                tasks_employer,
                                                tasks_customer,
                                                tasks_date,
                                                tasks_status,
                                                tasks_file
                                                )
                                                VALUES
                                                ('$add_name',
                                                '$add_description',
                                                  '$_POST[add_departments]',
                                                  '$_POST[add_employer]',
                                                  '$_POST[add_customer]',
                                                  '$_POST[add_date]',
                                                  0,
                                                  '".$_FILES['add_file']['name']."')
                                                  ");
                                                  
                                        
                                
                                          
                                            
        
        
    }
    
    public static function insert_user(){
        
        global $PDO;
        
        $chief_name = addslashes(htmlspecialchars($_POST['new_name']));
        $chief_email = addslashes(htmlspecialchars($_POST['new_email']));
        $chief_phone = addslashes($_POST['new_phone']);
        $chief_login = addslashes(htmlspecialchars($_POST['new_login']));
        $chief_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
        
        
        
       
        $query_phone = $PDO->query("INSERT INTO phones (phones_number) VALUES ('$chief_phone')");
        $id_phone = $PDO->query("SELECT phones_id FROM phones WHERE phones_number = '$chief_phone'")->fetch(PDO::FETCH_ASSOC);
        
        
       $p = "INSERT INTO chief   (chief_name,
                                                  chief_departments,
                                                  chief_job,
                                                  chief_email,
                                                  chief_phone,
                                                  chief_status,
                                                  chief_login,
                                                  chief_password) 
                                                  VALUES 
                                                  ('$chief_name',
                                                  '$_POST[new_departments]',
                                                  '$_POST[new_job]',
                                                  '$chief_email',
                                                  '$id_phone[phones_id]',
                                                  '$_POST[new_status]',
                                                  '$chief_login',
                                                  '$chief_password')";
        $query = $PDO->query($p);
        
        
    }
    
    /*
    @target: get data in array for form
    */
    public static function redac_user(){
        global $PDO;
        $html = '';
        $query = $PDO->query("SELECT * FROM chief ch LEFT JOIN departments d ON ch.chief_departments = d.dept_id LEFT JOIN job ON ch.chief_job = job.job_id LEFT JOIN phones ph ON ch.chief_phone = ph.phones_id LEFT JOIN status st ON ch.chief_status = st.status_id");
        
        while($result = $query->fetch(PDO::FETCH_ASSOC)){
            $html .= "<tr>
           <td>$result[chief_name]</td>
           <td>$result[dept_name]</td>
           <td>$result[job_name]</td>
           <td>$result[phones_number]</td>
           <td>$result[status_job]</td>
           <td><a href='http://fev.loc/index.php?controller=main&function=settings&deluser=$result[chief_id]'>Удалить</a> <a href='http://fev.loc/index.php?controller=main&function=redact&edituser=$result[chief_id]'>Редактировать</a></td>


        </tr>";
        }
        return $html;
    } 
    
    public static function insert_redac_user_pass(){
        global $PDO;
        $red_pass = password_hash($_POST['red_password'],PASSWORD_DEFAULT);
        $red_name = $_POST['red_name'];
        $red_departments = $_POST['red_departments'];
        $red_job = $_POST['red_job'];
        $red_email = $_POST['red_email'];
        $red_phone = $_POST['red_phone'];
        $red_status = $_POST['red_status'];
        $red_login= $_POST['red_login'];
        
        $id_phone = self::redact_get_user()['chief_phone'];
        $prep = $PDO->prepare("UPDATE phones SET phones_number=? WHERE phones_id=?");
        
        
        
        $prep->bindParam(2,$id_phone);
        $prep->bindParam(1,$red_phone);
        
        
        $result = $prep->execute();
        if($result){
            $query = $PDO->prepare("UPDATE chief SET chief_name=?, chief_departments=?, chief_job=?, chief_email=?, chief_phone=?, chief_status=?, chief_login=?, chief_password=? WHERE chief_id=?");
            
            $query->bindParam(1,$red_name);
            $query->bindParam(2,$red_departments);
            $query->bindParam(3,$red_job);
            $query->bindParam(4,$red_email);
            $query->bindParam(5,$id_phone);
            $query->bindParam(6,$red_status);
            $query->bindParam(7,$red_login);
            $query->bindParam(8,$red_pass);
            $query->bindParam(9,$_GET['edituser']);

            $res = $query->execute();
            if($res){
                echo "<script>alert('OK');</script>";
            }else{
                echo "<script>alert('FALSE');</script>";
            }
        }
        
        
        
        
        
        
    }
    
    
    public static function insert_redac_user_no_pass(){
        global $PDO;

      
        $red_name = $_POST['red_name'];
        $red_departments = $_POST['red_departments'];
        $red_job = $_POST['red_job'];
        $red_email = $_POST['red_email'];
        $red_phone = $_POST['red_phone'];
        $red_status = $_POST['red_status'];
        $red_login= $_POST['red_login'];

        $id_phone = self::redact_get_user()['chief_phone'];
        $prep = $PDO->prepare("UPDATE phones SET phones_number=? WHERE phones_id=?");



        $prep->bindParam(2,$id_phone);
        $prep->bindParam(1,$red_phone);


        $result = $prep->execute();
        if($result){
            $query = $PDO->prepare("UPDATE chief SET chief_name=?, chief_departments=?, chief_job=?, chief_email=?, chief_phone=?, chief_status=?, chief_login=? WHERE chief_id=?");

            $query->bindParam(1,$red_name);
            $query->bindParam(2,$red_departments);
            $query->bindParam(3,$red_job);
            $query->bindParam(4,$red_email);
            $query->bindParam(5,$id_phone);
            $query->bindParam(6,$red_status);
            $query->bindParam(7,$red_login);
        
            $query->bindParam(8,$_GET['edituser']);

            $res = $query->execute();
            if($res){
                echo "<script>alert('OK');</script>";
            }else{
                echo "<script>alert('FALSE');</script>";
            }
        }






    }
    
    
    public static function delete_user(){
        global $PDO;
        
        $query = $PDO->prepare("DELETE FROM chief WHERE chief_id=?");
        
        $query->bindParam(1,$_GET['deluser']);
        
        $res = $query->execute();
        if($res){
            header("Location:http://fev.loc/index.php?controller=main&function=settings");
        }
    }
    
    
    public static function tasks_list(){
        global $PDO;
        if($_SESSION['priv'] == 0 || $_SESSION['priv'] == 1){
           
       
        $query = $PDO->prepare("SELECT * FROM tasks t LEFT JOIN job j ON t.tasks_customer = j.job_id");
        }else{
            $query = $PDO->prepare("SELECT * FROM tasks t LEFT JOIN job j ON t.tasks_customer = j.job_id WHERE tasks_employer=$_SESSION[id]");
        }
        $query->execute();
        
        while($r = $query->fetchObject()) {
            switch($r->tasks_status){
                case 0: $send = "Не подтвержденно <br> <button data-id='".$r->tasks_id."' data-target='confirm' class='tc'>Подтверждаю</button>";
                    break;
                case 1: $send = "Подтвержденно <br> <button data-id='".$r->tasks_id."' data-target='finish' class='tc'>Выполненно</button>";
                    break;
                case 2: $send = "Выполненно";
                    break;
                    
            }
            
            
            $table .= "<tr>
                <td><a class='a_details' href='' data-details='".$r->tasks_id."'>".$r->tasks_name."</td></a>
                <td>".$r->tasks_date."</td>
                <td>".$r->job_name."</td>
                <td>".$send."</td>
                <td><a class='delete_button' data-delete='".$r->tasks_id."' href=''>Отмена</a>
                <br><a href='#'>Редактировать</a>
         
                
                </td>
                
                </td>



                </tr>";
       
            
        }
            
        return $table;
    }
    
    
    public static function logout(){
        global $PDO;
        
        $query = $PDO->query("UPDATE chief SET chief_online=0 WHERE chief_id = $_SESSION[id]");
        
        return true;
    }
    public static function get_list(){
        global $PDO;
        
        $query = $PDO->query("SELECT ch.chief_id,j.job_name,ch.chief_name,ch.chief_status FROM chief ch LEFT JOIN job j on ch.chief_job=j.job_id LEFT JOIN status st on st.status_id = ch.chief_status  WHERE st.status_marker > 0");
        
       while($res =  $query->fetch()){
           $result .= "
                       <li><a data-attr='".$res['chief_id']."'> ".$res['chief_name']." (".$res['job_name'].")</a></li>
           
           ";
       }
        
        
      return $result;  
        
    }
    
    
}



?>