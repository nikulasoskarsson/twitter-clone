<?php
class ImageDelete
{
    private $id; // Could be user id or tweet id
    private $dirToDeleteFrom; // img/user, img/tweets etc..
    private $txtFile;
    private $nameOfRow; // What it's called in the db. userImg, img etc..

    public function __construct($id, $dirToDeleteFrom, $nameOfRow, $txtFile)
    {
        $this->id = $id;
        $this->dirToDeleteFrom = $dirToDeleteFrom;
        $this->txtFile = $txtFile;
        $this->nameOfRow = $nameOfRow;
    }

    // function that will delete a single image like a profile picture
    public function deleteSingleImage()
    {
        $sData = file_get_contents($this->txtFile);
        $aData = json_decode($sData);
        foreach ($aData as $jData) {
            if ($jData->id == $this->id) {
                $tmpName = $this->nameOfRow;
                $imgName = $jData->$tmpName;
                if (file_exists("$this->dirToDeleteFrom/$imgName")) {
                    unlink("$this->dirToDeleteFrom/$imgName");
                }



                break;
            } else {
                echo 'match not found';
            }
        }
    }
}
