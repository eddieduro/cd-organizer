<?php
  class Cd
  {
    private $album_name;
    private $artist;
    private $image;

    function __construct($album_name, $artist)
    {
      $this->album_name = $album_name;
      $this->artist = $artist;
    }

    function getAlbum()
    {
      return $this->album_name;
    }

    function getArtist()
    {
      return $this->artist;
    }

    function getCoverArt()
    {
      return $this->image;
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
