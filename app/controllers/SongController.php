<?php

require_once './app/models/SongModel.php';
require_once './app/views/SongView.php';

/* Intermediario entre SongView y SongModel, controla el flujo de la aplicación,
procesa las solicitudes y valida la entrada de datos del usuario.
Pide al model la info y se la lleva a la view para que muestre. */
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

    //      songs
    public function showSongs()
    {
        $songs = $this->songModel->getSongs();
        $this->songView->showSongs($songs);
    }

    //      songsByArtist
        public function showSongsByArtist($id_artist)
    {
        $songs = $this->songModel->getSongsByArtist($id_artist);
        $this->songView->showSongs($songs);
    }

    //      song/id
    public function showSong($id)
    {
        $song = $this->songModel->getSong($id);
        if (!$song) {
            $this->songView->showError();
            // ARREGLAR MENSAJES DE ERROR
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
        // AuthHelper::verify();

        $id_artist = $_POST['id_artist'] ?? null;
        $title = $_POST['title'] ?? null;
        $album = $_POST['album'] ?? null;
        $duration = $_POST['duration'] ?? null;
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
        // AuthHelper::verify();

        $id_artist = $_POST['id_artist'] ?? null;
        $title = $_POST['title'] ?? null;
        $album = $_POST['album'] ?? null;
        $duration = $_POST['duration'] ?? null;
        $genre = $_POST['genre'] ?? null;
        $video = $_POST['video'] ?? null;

        // agregar mensajes de error o success. somehow
        $success = $this->songModel->editSong($id, $id_artist, $title, $album, $duration, $genre, $video);

        header('Location: ' . BASE_URL . 'songs');
        exit;
    }

    public function removeSong($id)
    {
        // AuthHelper::verify();

        $this->songModel->removeSong($id);

        header('Location: ' . BASE_URL . 'songs');
        exit;
    }
}
