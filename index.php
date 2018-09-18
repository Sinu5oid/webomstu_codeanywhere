<?php
define('APP_PATH', '/home/cabox/workspace/');
//подключение файлов ядра
$core = glob(APP_PATH.'application/core/*');
foreach($core as $path)
{
  require_once($path);
}
//загрузка списка роутов
require_once(APP_PATH.'application/routes.php');
//загрузка роутера
$router = Router::getInstance();
$router->process();