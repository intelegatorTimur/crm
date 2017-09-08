<?php
if(isset($_GET['controller']) && !empty($_GET['controller'])){
$controller = $_GET['controller'];
if(file_exists(CONTROLLERS.$controller.'Controller.php')){
require_once CONTROLLERS.$controller.'Controller.php';

if(isset($_GET['function']) && !empty($_GET['function'])){
$function = $_GET['function'];

if(class_exists($controller) && method_exists($controller,$function)){
$controller::$function();
}else{
echo "404";
}


}else{
$controller::index();
}
}else{
echo "404";
}

}else{

    if(isset($_SESSION['login']) && $_SESSION['login'] == 1){
        require_once CONTROLLERS.'MainController.php';
            main::index();
    }else{
        require_once CONTROLLERS.'AuthController.php';
        auth::index();
    }

}

?>