<?php

require_once './app/models/SongModel.php';
require_once './app/views/SongView.php';

class SongController
{
    private $songModel;
    private $artistModel;
    private $songView;


    public function __construct()
    {
        $this->songModel = new SongModel();
        $this->artistModel = new ArtistModel();
        $this->songView = new SongView();
    }

    public function showSongs()
    {
        $songs = $this->songModel->getSongs();
        $this->songView->showSongs($songs);
    }

    public function showSongsByArtist($id_artist)
    {
        $songs = $this->songModel->getSongsByArtist($id_artist);
        $this->songView->showSongs($songs);
    }

    public function showSong($id)
    {
        $song = $this->songModel->getSong($id);
        if (!$song) {
            $this->songView->showError("ddddddddddddddd");
        }
        $this->songView->showSong($song);
    }

    /**
     *         ABM
     *         -> VERIFICAMOS LA SESSION DE C/U (ACTUALMENTE COMENTADOS)
     *         -> INSERTAMOS VARIABLES P/ CARGAR (en caso de que sea necesario)
     *         -> ENVIAMOS LOS DATOS AL MODEL, LLAMAMOS AL MÉTODO CORRESPONDIENTE
     *         -> DESPUÉS DE EJECUTAR LA ACCIÓN, REDIRIGIMOS AL LISTADO (/songs)
     */

    public function addSongForm()
    {
        $artists = $this->artistModel->getArtists();
        $this->songView->showFormAddSong($artists);
    }

    public function addSong()
    {
        AuthHelper::verify();

        if (!isset($_POST['id_artist']) || empty($_POST['id_artist']))
            return $this->songView->showError("Falta artist");

        if (!isset($_POST['title']) || empty($_POST['title']))
            return $this->songView->showError("Falta title");

        if (!isset($_POST['album']) || empty($_POST['album']))
            return $this->songView->showError("Falta album");

        if (!isset($_POST['duration']) || empty($_POST['duration']))
            return $this->songView->showError("Falta duration");

        $id_artist = $_POST['id_artist'];
        $title = $_POST['title'];
        $album = $_POST['album'];
        $duration = $_POST['duration'];

        // genre y video pueden ser null
        $genre = $_POST['genre'] ?? null;
        $video = $_POST['video'] ?? null;

        $this->songModel->addSong($id_artist, $title, $album, $duration, $genre, $video);

        header('Location: ' . BASE_URL . 'songs');
        exit;
    }

    public function editSongForm($id)
    {
        $song = $this->songModel->getSong($id);
        $artists = $this->artistModel->getArtists();
        $this->songView->showFormEditSong($song, $artists);
    }

    public function editSong($id)
    {
        AuthHelper::verify();


        if (!isset($_POST['id_artist']) || empty($_POST['id_artist']))
            return $this->songView->showError("Falta artist");

        if (!isset($_POST['title']) || empty($_POST['title']))
            return $this->songView->showError("Falta title");

        if (!isset($_POST['album']) || empty($_POST['album']))
            return $this->songView->showError("Falta album");

        if (!isset($_POST['duration']) || empty($_POST['duration']))
            return $this->songView->showError("Falta duration");

        $id_artist = $_POST['id_artist'];
        $title = $_POST['title'];
        $album = $_POST['album'];
        $duration = $_POST['duration'];

        // genre y video pueden ser null
        $genre = $_POST['genre'] ?? null;
        $video = $_POST['video'] ?? null;

        // agregar mensajes de error o success
        $success = $this->songModel->editSong($id, $id_artist, $title, $album, $duration, $genre, $video);

        header('Location: ' . BASE_URL . 'songs');
        exit;
    }

    public function removeSong($id)
    {
        AuthHelper::verify();

        $this->songModel->removeSong($id);

        header('Location: ' . BASE_URL . 'songs');
        exit;
    }
}
