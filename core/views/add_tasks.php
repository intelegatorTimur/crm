<h2>ADD TASK</h2>
<hr>

<div class="new_people">
    <fieldset><legend>Добавление задания</legend>
        <form action="" method="post" enctype="multipart/form-data">

            <table>
                <tr><td><span>Название</span></td><td><input type="text" name="add_name"></td></tr>
                <tr> <td><span>Описание</span></td><td><textarea name="add_description" cols="40" rows="10"></textarea></td></tr>

                <tr><td><span>Департамент</span></td><td><select name="add_departments">
                    <option value="">Укажите департамент</option>
                    <?php 

                    echo MainModel::get_departments_select();

                    ?>


                    </select></td></tr>
                
                <tr><td><span>Отправитель</span></td><td><select name="add_employer">
                    <option value="">Укажите отправителя</option>
                    <?php 

                    echo MainModel::get_job_select();

                    ?>


                    </select></td></tr>
                <tr><td><span>Исполнитель</span></td><td><select name="add_customer">
                    <option value="">Укажите исполнителя</option>
                    <?php 

                    echo MainModel::get_job_select();

                    ?>


                    </select></td></tr>
                <tr> <td><span>Прикрепите файл</span></td><td><input type="file" name="add_file"></td></tr>
                <tr> <td><span>Дата</span></td><td><input type="date" name="add_date"></td></tr>
                <tr><td><button type="submit" name="add_submit">Отправить</button></td><td></td></tr>
            </table>
        </form>
    </fieldset>
</div>







