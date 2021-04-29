<?php
namespace zlytz\hw4;

require_once 'vendor/autoload.php';
use zlytz\hw4\Controllers as control;
$method = 'index';
if(!isset($_POST["coord"]))
{
    $controller = new control\BaseController();
}
else
{
    $controller = new control\CoordController($_POST["coord"]);
}

$controller->index();
?>

