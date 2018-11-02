<?php
class DB
{
  private static $instance = null;
  
  public static function getInstance()
  {
    if(is_null(self::$instance))
    {
      self::$instance = new DB();
    }
    return self::$instance;
  }
  
  private $connection = null;
  
  private $config = null;
  
  private $error = null;
  
  public function __construct()
  {
    $this->config = Configuration::getConfiguration(); 
    $this->connection = new PDO(
      'mysql:dbname='.$this->config->database['dbname'].';host='.$this->config->database['host'].';', 
      $this->config->database['login'], 
      $this->config->database['password']);
  }
  
  public function query(string $request, array $params = [])
  {
    $lastId = $this->getLastId();
    $statment = $this->connection->prepare($request);
    $result = $statment->execute($params);
    $this->error = $statment->errorInfo();
    if($result)
    {
      try
      {
        if($lastId == $this->getLastId())
        {
          return $statment->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;
      }
      catch(Exception $e)
      {
        return $result;
      }
      
    }
    return $result;
  }
  
  public function getError()
  {
    return $this->error;
  }
  
  public function getLastId()
  {
    $statment = $this->connection->prepare('SELECT LAST_INSERT_ID() as last_insert_id');
    if($statment->execute([]))
    {
      $result = $statment->fetchAll(PDO::FETCH_ASSOC);
      if(!empty($result))
      {
        return $result[0]['last_insert_id'];
      }
    }
    return -1;
  }
}