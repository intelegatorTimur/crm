

<h2>TASKS</h2>
<hr>

<div class="new_people">
 <div class="details">
     <div class="tasks_close">
     <a href="">Закрыть</a>
     </div>
     <div class="details_name">
         
         
     </div>
     <div class="details_description">
      
     </div>
     
     
     
 </div>

<div class="redac">
    <fieldset><legend>Задания</legend>
        <table>

            <thead><tr>
                <td>Названия</td>
                <td>Дата</td>
                <td>Отправитель</td>
                <td>Статус</td>
                <td>Управление заданием</td>
                


                </tr></thead>
            <tbody>
                <?php
                
               echo MainModel::tasks_list();

                ?>


            </tbody>



        </table>
    </fieldset>
</div>
</div>