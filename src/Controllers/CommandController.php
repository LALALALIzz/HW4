<?php
namespace zlytz\hw4\Controllers;

class CommandController
{
    private $imgURL;
    private $destFolder;

    function __construct($url, $folder)
    {
        $this->imgURL = $url;
        $this->destFolder = $folder;
    }

    function main()
    {
        echo $this->imgURL;
        echo $this->destFolder;
    }

}
?>