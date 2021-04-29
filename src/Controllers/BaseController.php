<?php

namespace zlytz\hw4\Controllers;
use zlytz\hw4\Models\BaseModel;
use zlytz\hw4\Views\BaseView;
class BaseController extends Controller
{
    private $view;
    private $model;

    function __construct()
    {
        $this->view = new BaseView();
        $this->model = new BaseModel();
    }
    function index()
    {
        $picstream = $this->model->getdata();
        $this->view->setdata($picstream);
        $this->view->render();
    }


}

?>