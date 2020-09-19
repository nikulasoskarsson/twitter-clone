<?php
class ImageUpload
{
    private $file;
    private $fileDestination;
    private $fileName;
    private $fileTmp;
    private $fileSize;
    private $fileErrors;
    private $fileType;

    private $errors = array();
    private $allowed = array(
        'jpg', 'jpeg', 'png'
    );


    public function __construct($fileFromPost)
    {
        $this->file = $fileFromPost;
    }
    public function uploadImage()
    {
        $this->validateImage();
    }

    private function validateImage()
    {
        $this->fileName = $this->file['name'];
        $this->fileTmp = $this->file['tmp_name']; // Tempory location of the file
        $this->fileSize = $this->file['size'];
        $this->fileErrors = $this->file['error'];
        $this->fileType = $this->file['type'];

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
            echo 'no errors upploading the image';
        }
    }
}
