<?php

const SONG_TEMPLATES = './app/templates/songTemplates/';
require_once 'View.php';

class SongView extends View
{

    public function showSongs($songs)
    {
        require SONG_TEMPLATES . 'songList.phtml';
    }

    public function showSong($song)
    {
        require SONG_TEMPLATES . 'songDetail.phtml';
    }

    public function showFormAddSong($artists)
    {
        require SONG_TEMPLATES . 'formAddSong.phtml';
    }

    public function showFormEditSong($song, $artists)
    {
        require SONG_TEMPLATES . 'formEditSong.phtml';
    }

}
