<?php
class Configuration
{
  private static $configuration = null;
  
  public static function getConfiguration()
  {
    if(is_null(self::$configuration))
    {
      self::$configuration = new Configuration();
    }
    return self::$configuration;
  }
  
  private function __construct()
  {
  }
  
  public function __get($name)
  {
    if(property_exists($this, $name))
    {
      return $this->$name;
    }
    return null;
  }
  
  //общие настройки
  private $common = [
    'base_url'    => 'web_omstu-borntokill1361002.codeanyapp.com'
  ];
  
  //настройки базы данных
  private $database = [
    'host'      => 'localhost',
    'dbname'    => 'web_db',
    'login'     => 'web_user',
    'password'  => 'web_password',
    'prefix'    => ''
  ];
  
  private $smarty = [
      'templates_dir' => APP_PATH.'application/views',
      'configs_dir' => APP_PATH.'temp/smarty/config',
      'compile_dir' => APP_PATH.'temp/smarty/compile',
      'cache_dir' => APP_PATH.'temp/smarty/cache'
  ];
  
  //настройки почты
  private $mail = [];
}