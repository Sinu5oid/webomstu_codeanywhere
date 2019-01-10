<?php

class StaffModel extends Model {
  
  public function getStaffById(int $id)
  {
    $ret = null;
    $res = $this->db->query('SELECT 
      *
    FROM staff WHERE doc_id = ?', [$id]);
    if(!empty($res))
    {
      $ret = $res[0];
    }
    return $ret;
  }
  
  public function getStaff() : array
  {
    return $this->db->query('SELECT 
      *
    FROM staff');
  }
 
  public function addStaff(string $doc_surname, int $doc_salary, string $doc_phone) : int
  {
    $res = $this->db->query('INSERT INTO staff (doc_surname, doc_salary, doc_phone) VALUES (?,?,?)', [
      $dep_name
    ]);
    if($res)
    {
      return $this->db->getlastId();
    }
    return -1;
  }
  
  public function updateStaff(int $id, string $doc_surname, int $doc_salary, string $doc_phone)
  {
    return $this->db->query('
    UPDATE staff SET
      doc_surname, doc_salary, doc_phone
    WHERE doc_id = ?  
      ', [
        $doc_surname,
        $doc_salary,
        $doc_phone,
        $id
      ]);
  }
  
  public function deleteStaff(int $id)
  {
    return $this->db->query('DELETE FROM staff WHERE doc_id = ?', [$id]);
  }
}