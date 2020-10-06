<?php
class ImageUploadMultipe
{
    private $files;
    private $folder;
    private $fileNamesToReturn = array();

    public function __construct($files, $folder)
    {
        $this->files = $files;
        $this->folder = $folder;
    }

    public function uploadImages()
    {
        foreach ($this->files['tmp_name'] as $i => $file) {
            $name =  $_FILES['images']['name'][$i];
            $tmp = $_FILES['images']['tmp_name'][$i];
            $size =  $_FILES['images']['size'][$i];
            $errors = $_FILES['images']['error'][$i];
            $type = $_FILES['images']['type'][$i];

            array_push($this->fileNamesToReturn, $name);;

            move_uploaded_file($tmp, __DIR__ . "/../../img/$this->folder/$name");
        }
    }
    public function getUploadedFileNames()
    {
        return $this->fileNamesToReturn;
    }
}
