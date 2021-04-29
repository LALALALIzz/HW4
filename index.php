<?php
namespace zlytz\hw4;

require_once 'vendor/autoload.php';
use zlytz\hw4\Controllers as control;

if(!isset($_POST["coord"]))
{
    $controller = new control\BaseController();
}
else
{
    $coordination = $_POST["coord"];
    $controller = new control\CoordController($coordination);
}
$controller->index();
?>

