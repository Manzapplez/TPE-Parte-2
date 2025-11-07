<?php

const ARTIST_TEMPLATES = './app/templates/artistTemplates/';

class ArtistView extends View
{
    public function showArtists($artists)
    {
        require ARTIST_TEMPLATES . 'artistList.phtml';
    }

    public function showArtist($artist)
    {
        require ARTIST_TEMPLATES . 'artistDetail.phtml';
    }

    public function showFormAddArtist()
    {
        require ARTIST_TEMPLATES . 'formAddArtist.phtml';
    }

    public function showFormEditArtist($artist)
    {
        require ARTIST_TEMPLATES . 'formEditArtist.phtml';
    }
}
