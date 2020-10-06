<?php
class DbHelper
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }
    public function updateMultipleFromPK($id, $arrayOfFields, $arrayOfValues, $tableName)
    {
        // $id = fk
        $statement = '';
        foreach ($arrayOfFields as $i => $field) {

            $statement .= "$field=:$field" . (($i + 1 !== count($arrayOfFields)) ? ', ' :  ' ');
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
