<?php

namespace zlytz\hw4;

use zlytz\hw4\Controllers\CommandController;
require_once '../vendor/autoload.php';

$paraCount = count($argv);
if($paraCount < 3)
{
    $paraDiff = 3 - $paraCount;
    echo "$paraCount parameters received, $paraDiff more parameters expecected !";
    exit;
}
else if($paraCount > 3)
{
    echo "Excessive parameter input !";
    exit;
}

$imgURL = $argv[1];
$destFolder = $argv[2];

$imgController = new CommandController($imgURL, $destFolder);
$imgController -> main();
?>