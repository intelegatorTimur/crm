<h2>REDACT</h2>
<hr>
<div class="redact_people">
    <fieldset><legend>Редактирование юзера</legend>
        <form action="" method="post">

            <table>
                <tr><td><span>Name</span></td><td><input type="text" name="red_name" value="<?php echo  MainModel::redact_get_user()['chief_name']; ?>"></td></tr>
                <tr> <td><span>Departments</span></td><td><select name="red_departments">
                    <option value="<?php echo MainModel::redact_get_user()['dept_id'];  ?>"><?php echo MainModel::redact_get_user()['dept_name'];  ?></option>
                    <?php 

                    echo MainModel::get_departments_select();

                    ?>

                    </select></td></tr>

                <tr><td><span>Job</span></td><td><select name="red_job">
                    <option value="<?php echo MainModel::redact_get_user()['job_id'];  ?>"><?php echo MainModel::redact_get_user()['job_name']; ?></option>
                    <?php

                    echo MainModel::get_job_select();

                    ?>

                    </select></td></tr>
                <tr><td><span>E-mail</span></td><td><input type="email" name="red_email" value="<?php echo  MainModel::redact_get_user()['chief_email']; ?>"></td></tr>
                <tr><td><span>Phone</span></td><td><input type="text" name="red_phone" value="<?php echo  MainModel::redact_get_user()['phones_number']; ?>"></td></tr>
                <tr><td><span>Status</span></td><td> <select name="red_status">
                    <option value="<?php echo MainModel::redact_get_user()['status_id'];  ?>"><?php echo MainModel::redact_get_user()['status_job'];  ?></option>
                    <?php

                    echo MainModel::get_status_select();


                    ?>

                    </select></td></tr>
                <tr> <td><span>Login</span></td><td><input type="text" name="red_login" value="<?php echo  MainModel::redact_get_user()['chief_login']; ?>"></td></tr>
                <tr> <td><span>Password</span></td><td><input type="password" name="red_password" value=""></td></tr>
                <tr><td><button type="submit" name="red_submit">Send</button></td><td></td></tr>
            </table>
        </form>
    </fieldset>
</div>