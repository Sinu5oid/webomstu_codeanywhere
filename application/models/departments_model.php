<?php
class DepartmentsModel extends Model
{
  
  public function getDepartmentById(int $id)
  {
    $ret = null;
    $res = $this->db->query('SELECT 
      dep_id,
      dep_name
    FROM departments WHERE dep_id = ?', [$id]);
    if(!empty($res))
    {
      $ret = $res[0];
    }
    return $ret;
  }
  
  public function getDepartments() : array
  {
    return $this->db->query('SELECT 
      dep_id,
      dep_name
    FROM departments');
  }
 
  public function addDepartment(string $dep_name) : int
  {
    $res = $this->db->query('INSERT INTO departments (dep_name) VALUES (?)', [
      $dep_name
    ]);
    if($res)
    {
      return $this->db->getlastId();
    }
    return -1;
  }
  
  public function updateDepartment(int $id, string $dep_name)
  {
    return $this->db->query('
    UPDATE departments SET
      dep_name = ?
    WHERE dep_id = ?  
      ', [
        $dep_name,
        $id
      ]);
  }
  
  public function deleteDepartment(int $id)
  {
    return $this->db->query('DELETE FROM departments WHERE dep_id = ?', [$id]);
  }
}

