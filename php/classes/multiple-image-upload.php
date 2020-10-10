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
        var_dump($this->files);
        foreach ($this->files['tmp_name'] as $i => $file) {
            $name =  $_FILES['images']['name'][$i];
            $tmp = $_FILES['images']['tmp_name'][$i];
            $size =  $_FILES['images']['size'][$i];
            $errors = $_FILES['images']['error'][$i];
            $type = $_FILES['images']['type'][$i];

            $fileExt = explode('.', $name); // ['cat', 'png']
            $this->fileActualExt = strtolower(end($fileExt)); //jpg, png, etc..

            $newFileName = uniqid('', true) . '.' . $this->fileActualExt;


            array_push($this->fileNamesToReturn, $newFileName);;

            move_uploaded_file($tmp, __DIR__ . "/../../img/$this->folder/$newFileName");
            echo 'image uplod running';
        }
    }
    public function getUploadedFileNames()
    {
        return $this->fileNamesToReturn;
    }
}
