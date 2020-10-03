<?php
class ImageDelete
{
    private $url; //name of image
    private $dirToDeleteFrom; // img/user, img/tweets etc..

    public function __construct($url, $dirToDeleteFrom)
    {
        $this->url = $url;
        $this->dirToDeleteFrom = $dirToDeleteFrom;
    }

    // function that will delete a single image like a profile picture
    public function deleteSingleImage()
    {
        unlink("$this->dirToDeleteFrom/$this->url");
    }
}
