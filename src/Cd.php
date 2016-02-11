<?php
  class Cd
  {
    private $album_name;
    private $artist;

    function _construct($album_name)
    {
      $this->album_name = $album_name;
    }

    function getAlbum()
    {
      return $this->album_name;
    }

    function getArtist()
    {
      return $this->artist_name;
    }
    function save()
    {
      array_push($_SESSION['list_of_cds'], $this);
    }
    static function getAll()
    {
      return $_SESSION['list_of_cds'];
    }

    static function deleteAll()
    {
      $_SESSION['list_of_cds'] = array();
    }
  }
?>
