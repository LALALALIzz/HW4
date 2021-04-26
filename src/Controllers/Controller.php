<?php
namespace zlytz\hw4\Controllers;

class Controller
{
    public $imgURL;
    public $destFolder;

    function __construct($url, $folder)
    {
        $this->$imgURL = $url;
        $this->$destFolder = $folder;
    }

    function main()
    {
        echo "
        <!DOCTYPE html>
        <html>
        <head>
        </head>
        <body>
            <h1> Hello World !</h1>
            <img url='"; ?><?php echo $imgURL; ?> <?php echo "' />
            <h2> "; ?><?php echo $destFolder; ?><?php echo "</h2>
        </body>
        </html>";
    }
}
?>