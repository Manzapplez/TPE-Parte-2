<?php

require_once './app/controllers/SongController.php';
require_once './app/controllers/ArtistController.php';
// require_once './app/controllers/AuthController.php';

/* TABLA DE RUTEO
ACCION					        URL		            DESTINO
Mostrar todas las canciones 	/songs		        SongController->showSongs()
Mostrar canción				    /song/id	        SongController->showSong(id)
Form para add Song			    /formAddSong	    SongController->addSongForm()
Add Song                        /addSong            SongController->addSong()
Form para edit Song			    /editSongForm/id	SongController->editSongForm($id)
Edit Song			            /editSong/id	    SongController->editSong($id)
Eliminar cancion			    /removeSong/id	    SongController->removeSong($id)

all songs from artist           /songsByArtist      SongController->getSongsByArtist($id_artist)

Mostrar todos los artistas      /artists            ArtistController->showArtists()
Mostrar artista                 /artist/id          ArtistController->showArtist($id)
Form para add Artist            /addArtistForm      ArtistController->addArtistForm()
Add Artist                      /addArtist          ArtistController->addArtist()
Form para edit Artist           /editArtistForm/id  ArtistController->editArtistForm($id)
Edit Artist                     /editArtist/id      ArtistController->editArtist($id)
Eliminar artista                /removeArtist/id    ArtistController->removeArtist($id)

Loguear                        /login               AuthController->login()
Autenticacion                  /auth                AuthController->auth()
Desloguear                     /logout              AuthController->logout() */

class Router
{
    private $songController;
    private $artistController;
    // private $authController;

    public function __construct()
    {
        $this->songController = new SongController();
        $this->artistController = new ArtistController();
        // $this->authController = new AuthController();
    }

    public function route($action)
    {
        $params = explode('/', $action);

        switch ($params[0]) {
            // SONGS
            case 'songs':
                $this->songController->showSongs();
                break;
            case 'song':
                $this->songController->showSong($params[1] ?? null);
                break;
            case 'addSongForm':
                $this->songController->addSongForm();
                break;
            case 'addSong':
                $this->songController->addSong();
                break;
            case 'editSongForm':
                $this->songController->editSongForm($params[1] ?? null);
                break;
            case 'editSong':
                $this->songController->editSong($params[1] ?? null);
                break;
            case 'removeSong':
                $this->songController->removeSong($params[1] ?? null);
                break;

            case 'songsByArtist':
                $this->songController->showSongsByArtist($params[1] ?? null);
                break;

            // ARTISTS

            case 'artists':
                $this->artistController->showArtists();
                break;
            case 'artist':
                $this->artistController->showArtist($params[1] ?? null);
                break;
            case 'addArtistForm':
                $this->artistController->addArtistForm();
                break;
            case 'addArtist':
                $this->artistController->addArtist();
                break;
            case 'editArtistForm':
                $this->artistController->editArtistForm($params[1] ?? null);
                break;
            case 'editArtist':
                $this->artistController->editArtist($params[1] ?? null);
                break;
            case 'removeArtist':
                $this->artistController->removeArtist($params[1] ?? null);
                break;

                // AUTH
                /*
            case 'login':
                $this->authController->login();
                break;
            case 'auth':
                $this->authController->auth();
                break;
            case 'logout':
                $this->authController->logout();
                break;
            default:
                echo "Error 404: Página no encontrada";
                break;
                */
        }
    }
}

// Inicialización
$action = $_GET['action'] ?? 'songs';
$router = new Router();
$router->route($action);
