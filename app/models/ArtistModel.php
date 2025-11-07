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
    public function addArtist($name, $biography, $image = null)
    {
        $pathImg = null;
        if ($image)
            $pathImg = $this->uploadImage($image);
        $query = $this->db->prepare('INSERT INTO artists (name, biography, image) VALUES (?,?,?)');
        $query->execute([$name, $biography, $pathImg]);

        return $this->db->lastInsertId();
    }

    public function editArtist($id, $name, $biography, $image = null)
    {
        $pathImg = null;
        if ($image)
            $pathImg = $this->uploadImage($image);
        $query = $this->db->prepare('UPDATE artists SET name = ?, biography = ?, image = ? WHERE id_artist = ?');
        $query->execute([$name, $biography, $pathImg, $id]);

        return $this->db->lastInsertId();
    }

    public function removeArtist($id)
    {
        $query = $this->db->prepare('DELETE FROM artists WHERE id_artist=?');
        $query->execute([$id]);
    }

    private function uploadImage($image)
    {
        $target = 'images/artists/' . uniqid() . '.jpg';
        move_uploaded_file($image, $target);
        return $target;
    }
}
