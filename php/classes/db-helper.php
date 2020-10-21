<?php
class DbHelper
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }
    public function updateMultipleFromPK($id, $arrayOfFields, $arrayOfValues, $arrayOfRows, $tableName)
    {
        // $id = fk
        $statement = '';
        foreach ($arrayOfFields as $i => $field) {

            $statement .= "$arrayOfRows[$i]=:$field" . (($i + 1 !== count($arrayOfFields)) ? ', ' :  ' ');
            echo $statement;
        }


        $query = $this->connection->prepare("UPDATE $tableName SET $statement WHERE id = $id ");
        foreach ($arrayOfFields as $index => $field) {
            $query->bindValue(":$field", $arrayOfValues[$index]);
        }
        var_dump($query);
        $query->execute();
    }

    public function insertOrUpdateTextFromPK($id, $textToAdd, $tableName)
    {
        // $id = pk
    }
    public function insertOrUpdateTextFromFK($id, $rowName, $fkName, $textToAdd, $tableName)
    {
        // $id = fk
        $query = $this->connection->prepare("INSERT INTO $tableName values(null,:$fkName,:$rowName)
        ON DUPLICATE KEY UPDATE $rowName=:$rowName");
        $query->bindValue(":$fkName", $id);
        $query->bindValue(":$rowName", "$textToAdd");
        $query->execute();
    }
    public function insertOrUpdateImage($id, $fieldName, $fkName, $folderName, $tableName)
    {
        // $id = fk
        require_once(__DIR__ . '/image-upload.php');
        require_once(__DIR__ . '/image-delete.php');
        $imageUpload = new ImageUpload($_FILES["$fieldName"],  __DIR__ . "/../../img/$folderName/");
        $imageUpload->uploadImage();
        try {
            // get the old img name
            $query = $this->connection->prepare("SELECT url FROM $tableName where $fkName = $id LIMIT 1");
            $query->execute();
            $row = $query->fetch();
            // If there is already an image delete it from the folder
            if ($row) {
                $oldImgName = $row[0];
                $deleteImage = new ImageDelete($oldImgName, __DIR__ . "/../../img/$folderName/");
                $query = $this->connection->prepare("DELETE FROM $tableName WHERE $fkName = $id");
                $query->execute();
                $deleteImage->deleteSingleImage();
            }
            $query = $this->connection->prepare("INSERT INTO $tableName VALUES (NULL,:$fkName, :url) 
            ON DUPLICATE KEY UPDATE url=:url");
            $query->bindValue(":$fkName", $id);
            $query->bindValue(':url', $imageUpload->getFileName());
            $query->execute();
        } catch (PDOException $ex) {
            var_dump($ex);
            exit;
        }
    }
    public function insertOrUpdateMultipleImages($id, $fieldName, $fkName, $folderName, $tableName)
    {

        // Delete the old images 
        $query = $this->connection->prepare("SELECT url FROM $tableName where $fkName = $id LIMIT 1");
        $query->execute();
        $row = $query->fetch();
        // If there is already an image delete it from the folder
        if ($row) {
            require_once(__DIR__ . '/image-delete.php');
            $oldImgName = $row[0];
            $deleteImage = new ImageDelete($oldImgName, __DIR__ . "/../../img/$folderName");
            $query = $this->connection->prepare("DELETE FROM $tableName WHERE $fkName = $id");
            $query->execute();
            $deleteImage->deleteSingleImage();
        }

        require_once(__DIR__ . '/multiple-image-upload.php');
        $imageUploadMultiple = new ImageUploadMultipe($_FILES[$fieldName], $folderName);
        $imageUploadMultiple->uploadImages();

        $imageNames = $imageUploadMultiple->getUploadedFileNames();
        foreach ($imageNames as $image) {
            $query = $this->connection->prepare("INSERT INTO $tableName VALUES(null, :$fkName, :url)");
            $query->bindValue(":$fkName", $id);
            $query->bindValue(':url', $image);
            var_dump($query);
            $query->execute();
        }
    }
}
