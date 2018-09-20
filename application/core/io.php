<?php
class IO
{
  //доступ к данным переданным методом GET
  public static function get($key)
  {
    if(array_key_exists($key, $_GET))
    {
      return $_GET[$key];
    }
    return null;
  }
  
  //доступ к массиву данных переданных методом POST
  public static function post($key)
  {
    if(array_key_exists($key, $_POST))
    {
      return $_POST[$key];
    }
    return null;
  }
  
  //доступ к данных переданных методом POST из потока
  public static function postRow() : string
  {
    return '';
  }
  
  //форматированный вывод отладочной информации
  public static function varDump($string)
  {
    echo '<pre>';
    var_dump($string);
    echo'</pre>';
  }
  
}