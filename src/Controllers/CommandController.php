<?php
namespace zlytz\hw4\Controllers;
use zlytz\hw4\Models\CommandModel;
class CommandController
{
    private $imgURL;
    private $destFolder;
    public const ssize = 200;
    public const lsize = 800;

    function __construct($url, $folder)
    {
        $this->imgURL = $url;
        $this->destFolder = $folder;
    }
    
    function imgSlice()
    {
        mkdir($this->destFolder);

        $blank = imagecreatetruecolor($this::ssize, $this::ssize);
        $black = imagecolorallocate($blank, 0, 0, 0);
        imagefill($blank, 0, 0, $black);
        imagejpeg($blank, $this->destFolder."/blank.jpg");

        $tarimg = imagecreatefromjpeg($this->imgURL);
        $resizedimg = imagescale($tarimg, $this::lsize, $this::lsize, IMG_BILINEAR_FIXED);
        imagejpeg($resizedimg, $this->destFolder."/all.jpg");

        $model = new CommandModel($this->destFolder, $this->destFolder."/all.jpg");
        $model->imageSlicetoNum2(16, -1);
        for($i = 0; $i < 4; $i++)
        {
            for($j = 0; $j < 4; $j++)
            {
                $smodel = new CommandModel($this->destFolder, $this->destFolder."/".$i.$j.".jpg");
                $smodel->imageSlicetoNum2(16, $i.$j);
            }
        }
    }
}
?>