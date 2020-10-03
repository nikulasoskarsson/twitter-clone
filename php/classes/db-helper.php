<?php
class DbHelper
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }
    public function insertOrUpdateImage($id, $fieldName, $folderName, $tableName)
    {
        echo $folderName;
        require_once(__DIR__ . '/image-upload.php');
        require_once(__DIR__ . '/image-delete.php');
        $imageUpload = new ImageUpload($_FILES["$fieldName"],  __DIR__ . "/../../img/$folderName/");
        $imageUpload->uploadImage();
        try {
            // get the old img name
            $query = $this->connection->prepare("SELECT url FROM $tableName where user_id = $id LIMIT 1");
            $query->execute();
            $row = $query->fetch();
            // If there is already an image delete it from the folder
            if ($row) {
                $oldImgName = $row[0];
                $deleteImage = new ImageDelete($oldImgName, __DIR__ . "/../../img/$folderName");
                $deleteImage->deleteSingleImage();
            }
            $query = $this->connection->prepare("INSERT INTO $tableName VALUES (NULL,:userId, :url) 
            ON DUPLICATE KEY UPDATE url=:url");
            $query->bindValue(':userId', $id);
            $query->bindValue(':url', $imageUpload->getFileName());
            $query->execute();
        } catch (PDOException $ex) {
            var_dump($ex);
            exit;
        }
    }
}
