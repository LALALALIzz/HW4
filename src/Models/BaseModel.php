<?php
namespace zlytz\hw4\Models;

class BaseModel
{
    private $picstream = array(); 

    function getdata()
    {
        for($i = 0; $i < 3; $i++)
        {
            for($j = 0; $j < 3; $j++)
            {
                $this->picstream[$i][$j] = "images/blank.jpg";
            }
        }
        return $this->picstream;
    }

}
?>