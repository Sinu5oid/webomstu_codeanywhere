<?php
class NotesModel extends Model
{
  
  public function getNotesByUser(int $user_id, int &$total_count, array $filters = [] ,int $limit = -1, int $page = -1) : array
  {
    $ret = [];
    $where = ' WHERE user_id = ?';
    $params = [$user_id];
    $total_count = 0;
    //where
     
    $res = $this->db->query('SELECT COUNT(id) AS count FROM notes'.$where, $params);
    $total_count = $res[0]['count'];     
    if($total_count > 0)
    {
      //limit/page
      if($limit > 0 || $page > 0)
      {
        if($page > 0)
        {
          $where .= ' LIMIT ?, ?';
          $params[] = ($page - 1) * $limit;
          $params[] = $limit;
        }
        else
        {
          $where .= ' LIMIT ?';
          $params[] = $limit;
        }
      }
      return $this->db->query('SELECT * FROM notes'.$where, $params);
    }
    return $ret;
  }
  
  public function getNoteById(int $id)
  {
    $ret = null;
    $res = $this->db->query('SELECT * FROM notes WHERE id = ?', [$id]);
    if(!empty($res))
    {
      $ret = $res[0];
    }
    return $ret;
  }
  
  public function addNote(int $user_id, string $title, string $description, DateTime $date_target) : int
  {
    $ret = -1
    $date = new DateTime();
    if($this->db->query('INSERT INTO notes (user_id, title, description, date_target, date_create) VALUE (?, ?, ?, ?, ?)',[
      $user_id,
      $title,
      $description,
      $date_target->format('Y-m-d H:i:s'),
      $date->format('Y-m-d H:i:s')
    ]))
    {
      $ret = $this->db->getLastId();
    }
    return $ret;
  }
  
  public function editNote(int $id, string $title, string $description, DateTime $date_target) : bool
  {
    return $this->db->query('
     UPDATE notes SET
      title = ?,
      description = ?,
      date_target = ?
     WHERE id = ? ',[
       $title,
       $description,
       $date_target->format('Y-m-d H:i:s'),
       $id
     ]);
  }
  
  public function deleteNoteById(int $id) : bool
  {
    return $this->db->query('DELETE FROM notes WHERE id = ?', [$id]);
  }
  
  public function deleteNotesByIds(array $ids) : bool
  {
    if(!empty($ids))
    {
      $where = ' ';
      foreach($ids as $index => $id)
      {
        if($index > 0)
        {
          $where .= ', ';
        }
        $where .= '?';
      }
      return $this->db->query('DELETE FROM notes WHERE id IN ('.$where.')', $ids);
    }
    
  }
  
  public function deleteNoteByUser(int $user_id) : bool
  {
    return $this->db->query('DELETE FROM notes WHERE user_id = ?', [$user_id]);
  }
  
  public function complete(int $id) : bool
  {
    $date = new DateTime();
    return $this->db->query('UPDATE notes SET complete = 1, date_complete = ?', $date->format('Y-m-d H:i:s')]);
  }
}