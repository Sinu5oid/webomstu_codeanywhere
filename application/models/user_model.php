<?php
class UserModel extends Model
{
  public function getUsers()
  {
    return $this->db->query("SELECT * FROM users");
  }
}