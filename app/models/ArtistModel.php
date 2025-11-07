<?php

require_once 'Model.php';

class artistModel extends Model
{
    public function getArtists()
    {
        $query = $this->db->prepare('SELECT artists.* FROM artists');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getArtist($id)
    {
        $query = $this->db->prepare('SELECT artists.* FROM artists WHERE artists.id_artist = ?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    // ABM
    public function addArtist($name, $biography)
    {
        $query = $this->db->prepare('INSERT INTO artists (name, biography) VALUES (?,?)');
        $query->execute([$name, $biography]);
    }

    public function editArtist($id, $name, $biography)
    {
        $query = $this->db->prepare('UPDATE artists SET name = ?, biography = ? WHERE id_artist = ?');
        $query->execute([$name, $biography, $id]);
    }

    public function removeArtist($id)
    {
        $query = $this->db->prepare('DELETE FROM artists WHERE id_artist=?');
        $query->execute([$id]);
    }
}
