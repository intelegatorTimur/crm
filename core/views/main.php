
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="/core/views/css/style.css">
    <script src="core/views/js/jquery-3.1.1.min.js"></script>
</head>
<body>


    <div class="top_bk">
        
    </div>
    <div class="logout_bk">
        
    </div>
    <div class="left_bk">
        <div class="hello_admin"><h3>HELLO <? echo $_SESSION['name'];
            ?></h3></div>
        <div class="menu_box">
            <ul>
               
                <li><a href="index.php">Главная</a></li>
                <?php if($_SESSION['priv'] < 3){ ?>
                <li><a href="index.php?controller=main&function=add_tasks">Добавить задание</a></li>
                <?php } ?>
                <li><a href="index.php?controller=main&function=my_tasks">Мои задания</a></li>
                <li><a href="index.php?controller=main&function=messages">Сообщения</a></li>
                
                <?php if($_SESSION['priv'] == 1) {     ?>
                <li><a href="index.php?controller=main&function=settings">Настройки</a></li>
                <?php }   ?>
                <li><a href="index.php?controller=main&exit=logout">Выход</a></li>
            </ul>
        </div>
    </div>
    <div class="main_bk">
        <?php
        if(isset($_GET['function']) && !empty($_GET['function'])){
            include VIEWS.$_GET['function'].".php";
        }else{
            include VIEWS."statistics.php";
        }
        
        
        ?>
    </div>
    
   <div class="right_bk">
       <div class="time">
           
           
           
       </div>
   </div>
    
</body>
<script src="core/views/js/ajax_delete_task.js"></script>
<script src="core/views/js/ajax_confirm_task.js"></script>
<script src="core/views/js/ajax_details.js"></script>
<script src="core/views/js/status.js"></script>
<script src="core/views/js/time.js"></script>
<script src="core/views/js/ajax_messages.js"></script>
</html>
