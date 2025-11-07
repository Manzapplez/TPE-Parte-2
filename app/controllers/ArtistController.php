<?php

require_once './app/models/ArtistModel.php';
require_once './app/views/ArtistView.php';

class ArtistController
{
    private $artistModel;
    private $artistView;

    public function __construct()
    {
        $this->artistModel = new ArtistModel();
        $this->artistView = new ArtistView();
    }

    public function showArtists()
    {
        $artists = $this->artistModel->getArtists();
        $this->artistView->showArtists($artists);
    }

    public function showArtist($id)
    {
        $artist = $this->artistModel->getArtist($id);
        if (!$artist) {
            $this->artistView->showError();
        }
        $this->artistView->showArtist($artist);
    }

    /**
     *         ABM
     *         -> VERIFICAMOS LA SESSION DE C/U (ACTUALMENTE COMENTADOS)
     *         -> INSERTAMOS VARIABLES P/ CARGAR (en caso de que sea necesario)
     *         -> ENVIAMOS LOS DATOS AL MODEL, LLAMAMOS AL MÉTODO CORRESPONDIENTE
     *         -> DESPUÉS DE EJECUTAR LA ACCIÓN, REDIRIGIMOS AL LISTADO (/artists)
     */

    public function addArtistForm()
    {
        $this->artistView->showFormAddArtist();
    }


    public function addArtist()
    {
        // AuthHelper::verify();

        $name = $_POST['name'];
        $biography = $_POST['biography'];

        $this->artistModel->addartist($name, $biography);

        header('Location: ' . BASE_URL . 'artists');
        exit;
    }

    // CARGA EL FORMULARIO
    public function editArtistForm($id)
    {
        $artist = $this->artistModel->getArtist($id);
        $this->artistView->showFormEditArtist($artist);
    }

    public function editartist($id)
    {
        // AuthHelper::verify();
        $name = $_POST['name'];
        $biography = $_POST['biography'];

        $this->artistModel->editartist($id, $name, $biography);

        header('Location: ' . BASE_URL . 'artists');
        exit;
    }

    public function removeartist($id)
    {
        // AuthHelper::verify();
        $this->artistModel->removeArtist($id);
        header('Location: ' . BASE_URL . 'artists');
        exit;
    }
}
