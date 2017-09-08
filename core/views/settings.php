<h2>SETTINGS</h2>
<hr>

<div class="new_people">
   <fieldset><legend>Добавление нового юзера</legend>
    <form action="" method="post">
      
       <table>
           <tr><td><span>Name</span></td><td><input type="text" name="new_name"></td></tr>
           <tr> <td><span>Departments</span></td><td><select name="new_departments">
           <option value="">Укажите департамент</option>
           <?php 
               
              echo MainModel::get_departments_select();
               
            ?>
           
           </select></td></tr>
           
           <tr><td><span>Job</span></td><td><select name="new_job">
               <option value="">Укажите должность</option>
               <?php
               
               echo MainModel::get_job_select();
               
               ?>
               
           </select></td></tr>
           <tr><td><span>E-mail</span></td><td><input type="email" name="new_email"></td></tr>
           <tr><td><span>Phone</span></td><td><input type="text" name="new_phone"></td></tr>
           <tr><td><span>Status</span></td><td> <select name="new_status">
               <option value="">Укажите статус</option>
               <?php
               
               echo MainModel::get_status_select();
               
               
               ?>
               
           </select></td></tr>
           <tr> <td><span>Login</span></td><td><input type="text" name="new_login"></td></tr>
           <tr> <td><span>Password</span></td><td><input type="password" name="new_password"></td></tr>
           <tr><td><button type="submit" name="submit">Send</button></td><td></td></tr>
        </table>
    </form>
    </fieldset>
</div>






<div class="redac">
    <fieldset><legend>Редактирование юзера</legend>
    <table>
      
       <thead><tr>
           <td>Имя</td>
           <td>Департамент</td>
           <td>Должность</td>
           <td>Телефон</td>
           <td>Роль</td>
           <td>Х -></td>
           
           
       </tr></thead>
       <tbody>
           <?php
           
           echo MainModel::redac_user();
           
           ?>

      
       </tbody>
       
        
        
    </table>
    </fieldset>
</div>