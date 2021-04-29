<?php
namespace zlytz\hw4\Models;
class CoordModel extends Model
{
    public $imageroot = "images/";
    public $imagesuffix = ".jpg";
    public $coord;
    public $picstream;

    function __construct($coordination)
    {
        $this->coord = $coordination;
    }

    function getdata()
    {
        $coords = array();
        $coords = explode(",", $this->coord);
        
        if(count($coords)==2)
        {
            $x = $coords[0]-1;
            $y = $coords[1]-1;
            $subcoords = array();
            for($i=0; $i<3; $i++)
            {
                $x_ = $x + $i;
                for($j=0; $j<3; $j++)
                {
                    $y_ = $y + $j;
                    $subcoords[$i][$j] = "$x_".","."$y_";
                }
            }
            for($i=0;$i<3;$i++)
            {
                for($j=0;$j<3;$j++)
                {
                    $smallcoord = explode(",", $subcoords[$i][$j]);
                    if($smallcoord[0]<0||$smallcoord[1]<0 || $smallcoord[0] > 3 || $smallcoord[1] > 3)
                    {
                        $this->picstream[$i][$j] = "images/blank.jpg";
                    }
                    else
                    {
                        $this->picstream[$i][$j] = "images/".$smallcoord[0].$smallcoord[1].".jpg";
                    }
                }
            }         
        }
        return $this->picstream;        
    }
}
?>