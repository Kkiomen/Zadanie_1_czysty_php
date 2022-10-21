<?php

namespace App\Controllers;

use App\Core\BasicController;
use App\Core\Pagination;
use App\Core\PaginationDraw;
use App\Core\View;
use App\Models\CityModel;


class IndexController extends BasicController
{
    public function indexAction()
    {
        $cityModel = new CityModel();
        $pagination = new Pagination($cityModel->getAll());

        $view = View::getInstance();
        $view->set('title', 'Lista miast');
        $view->set('cities', $pagination->getAll());
        $view->set('paginateLinks', PaginationDraw::draw($pagination, 'index.php?page='));
        $view->set('paginatePageInfo', PaginationDraw::showPageInfo($pagination));
        $view->render("home");
    }
}