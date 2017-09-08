
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="/core/views/style.css">
</head>
<body>
    <?php
    if($_SESSION['priv'] == 1) {
        echo "<a href=''>настройки</a>";
    }
    ?>
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
                <li><a href="index.php?controller=main&function=add_tasks">Добавить задание</a></li>
                <li><a href="index.php?controller=main&function=my_tasks">Мои задания</a></li>
                <li><a href="index.php?controller=main&function=messages">Сообщения</a></li>
                
                <li><a href="index.php?controller=main&function=messages">настройки</a></li>
               
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
       
   </div>
    
</body>
</html>
