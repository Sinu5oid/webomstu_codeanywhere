<?php
class DB
{
  private static $instance = null;
  
  public function getInstance()
  {
    if(is_null(self::$instance))
    {
      self::$instance = new DB();
    }
    return self::$instance;
  }
  
  private $coonnection = null;
  
  private $config = null;
  
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
    $statment = $this->connection->prepare($request);
    $result = $statment->execute($params);
    if($result)
    {
      return $statment->fetchAll(PDO::FETCH_ASSOC);
    }
    return $result;
  }
  
  public function getError()
  {
    return $this->connection->errorInfo();
  }
  
  public function lastId()
  {
    return $this->connection->lastInsertId();
  }
}