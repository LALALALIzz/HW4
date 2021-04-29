<?php

if (!function_exists('isAvailableController')) {
 
    function isAvailableController($controller,$method)
    {
        if(class_exists($controller)){
            $webcon =$controller::getinstance();
            if(!method_exists($controller,$method)){
                echo $controller.'class does not exist'.$method.'function !';
                die();
            }
        } else {
            echo $controller.'class does not exist !';
            die();
        }
        return $webcon;
    }
}

?>