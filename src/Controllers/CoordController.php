<?php
namespace zlytz\hw4\Controllers;
use zlytz\hw4\Models\CoordModel;
use zlytz\hw4\Views\BaseView;
class CoordController extends Controller
{
    public $coord;
    public $view;
    public $model;
    
    function __construct($coordination)
    {
        $this->coord = $coordination;
        $this->model = new CoordModel($this->coord);
        $this->view = new BaseView();
    }

    function index()
    {   
        $picstream = $this->model->getdata();
        $this->view->setdata($picstream);
        $this->view->render();
    }
}
?>