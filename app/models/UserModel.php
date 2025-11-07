<?php

class UserModel extends Model
{
    public function getByUser($username)
    {
        $query = $this->db->prepare('SELECT * FROM users WHERE username=?');
        $query->execute([$username]);

        return $query->fetch(PDO::FETCH_OBJ);
    }
}
