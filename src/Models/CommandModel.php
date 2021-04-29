<?php
namespace zlytz\hw4\Models;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
class CommandModel
{
    public const ssize = 200;
    public const lsize = 800;
    public $newDir;
    public $imgURL;

    function __construct($theDir, $url)
    {
        $this->newDir = $theDir;
        $this->imgURL = $url;
        
    }

    function imageSlicetoNum2($sliceNum, $prefix)
    {   
        $tarimg = imagecreatefromjpeg($this->imgURL);
        $imgdata = getimagesize($this->imgURL);
        $rowNum = sqrt($sliceNum);
        $colNum = sqrt($sliceNum);
        $imgWidth = $imgdata[0]/$rowNum;
        $imgHeight = $imgdata[1]/$colNum;

        $logger = new Logger("TileMaker");
        if(!file_exists('./log'))
        {
            mkdir('./log');
        }
        $logger->pushHandler(new StreamHandler('log/imagedownload.log', Logger::DEBUG));
        $countx = 0;
        for($i = 0; $i<$imgdata[0]; $i+=$imgWidth)
        {
            $county = 0;
            for($j = 0; $j<$imgdata[1]; $j+=$imgHeight)
            {   
                $croparray = array('x'=>$i, 'y'=>$j, 'width'=>$imgWidth, 'height'=>$imgHeight);
                $imgcroped = imagecrop($tarimg, $croparray);
                $resizedimgcroped = imagescale($imgcroped, $this::ssize, $this::ssize, IMG_BILINEAR_FIXED);
                if($prefix == -1)
                {
                    imagejpeg($resizedimgcroped, $this->newDir."/".$county.$countx.".jpg");
                    $logger->info("Image $county$countx.jpg is produced!");
                }
                else
                {
                    imagejpeg($resizedimgcroped, $this->newDir."/".$prefix.$county.$countx.".jpg");
                    $logger->info("Image $prefix$county$countx.jpg is produced!");
                }
                $county++;
            }
            $countx++;
        }
    }
}
?>