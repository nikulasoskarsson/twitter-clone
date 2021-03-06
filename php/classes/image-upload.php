<?php
class ImageUpload
{

    private $file;
    private $folderToUpload;



    private $fileDestination;
    private $fileName;
    private $fileTmp;
    private $fileSize;
    private $fileErrors;
    private $fileType;

    private $fileExt;
    private $fileActualExt;

    private $errors = array();
    private $allowed = array(
        'jpg', 'jpeg', 'png'
    );


    public function __construct($fileFromPost, $folder)
    {
        $this->file = $fileFromPost;
        $this->folderToUpload = $folder;
    }
    public function uploadImage()
    {
        $this->validateImage();
    }
    public function getFileName()
    {
        return $this->fileName;
    }

    private function validateImage()
    {
        $this->fileName = $this->file['name'];
        $this->fileTmp = $this->file['tmp_name']; // Tempory location of the file
        $this->fileSize = $this->file['size'];
        $this->fileErrors = $this->file['error'];
        $this->fileType = $this->file['type'];

        $this->fileExt = explode('.', $this->fileName); // ['cat', 'png']
        $this->fileActualExt = strtolower(end($this->fileExt)); //jpg, png, etc..


        // If the extension that comes from post is inside of the array of allowed extensions
        if (!in_array($this->fileActualExt, $this->allowed)) {
            array_push($this->errors, 'File type not allowed');
        }
        // If we have errors 
        if ($this->fileErrors !== 0) {
            array_push($this->errors, 'There was an error uploading this file');
        }
        // If the file size is to big
        if ($this->fileSize > 1000000) {
            array_push($this->errors, 'File size is too big!');
        }
        // If there are no errors the code keeps running
        if (!count($this->errors)) {

            // Save image name to the correct text file
            $this->saveImageInFolder();
            // $this->saveImageInTextFile();
        } else {
            var_dump($this->errors);
        }
    }
    private function saveImageInFolder()
    {
        // Save image in folder
        $this->fileName = uniqid('', true) . '.' . $this->fileActualExt;
        $this->fileDestination = $this->folderToUpload . $this->fileName;

        move_uploaded_file($this->fileTmp, $this->fileDestination);
    }
}
