<?php

require_once 'Model.php';
/* php no sabe dónde está model al declarar las clases hijas porque no carga automáticamente todos los archivos 
a menos que le haga un require/include o tenga un autoloader en config.php, por ahora lo pongo como require */

/* Maneja la comunicacion con la BBDD de canciones. CONTIENE CRUD, PHP + PDO. */

class SongModel extends Model
{
    public function getSongs()
    {
        $query = $this->db->prepare('
            SELECT songs.*, artists.name
            FROM songs
            JOIN artists ON songs.id_artist = artists.id_artist
            ORDER BY songs.id_artist
        ');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getSongsByArtist($id_artist)
    {
        $query = $this->db->prepare('SELECT songs.*, artists.name
        FROM songs JOIN artists ON songs.id_artist = artists.id_artist WHERE songs.id_artist = ? ORDER BY songs.title');
        $query->execute([$id_artist]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getSong($id)
    {
        $query = $this->db->prepare('
            SELECT songs.*, artists.name
            FROM songs
            JOIN artists ON songs.id_artist = artists.id_artist
            WHERE songs.id_song = ?
        ');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }


    // ABM
    public function addSong($id_artist, $title, $album, $duration, $genre, $video)
    {
        $query = $this->db->prepare('INSERT INTO songs (id_artist, title, album, duration, genre, video) VALUES (?,?,?,?,?,?)');
        $query->execute([$id_artist, $title, $album, $duration, $genre, $video]);
    }

    public function editSong($id, $id_artist, $title, $album, $duration, $genre, $video)
    {
        $query = $this->db->prepare('UPDATE songs SET id_artist = ?, title = ?, album = ?, duration = ?, genre = ?, video = ? WHERE id_song = ?');
        $success = $query->execute([$id_artist, $title, $album, $duration, $genre, $video, $id]);
        return $success;
    }


    public function removeSong($id)
    {
        $query = $this->db->prepare('DELETE FROM songs WHERE id_song=?');
        $query->execute([$id]);
    }
}
