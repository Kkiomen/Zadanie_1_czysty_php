<?php

namespace App\Controllers;

use App\Core\Alert;
use App\Core\AlertStatus;
use App\Core\BasicController;
use App\Core\Pagination;
use App\Core\PaginationDraw;
use App\Core\Redirect;
use App\Core\View;
use App\Models\CityModel;
use App\Validator\CityValidator;
use App\Validator\GetParametrValidator;
use App\Validator\PostParametrValidator;
use App\Validator\ZipCodeValidator;

class CityController extends BasicController
{


    public function create(): void
    {
        $view = View::getInstance();
        $view->set('title', 'Dodawanie miasta');

        $view->render("cityCreate");
    }

    public function save(): void
    {
        $cityName = null;

        if (isset($_POST['city'])) {
            $cityName = $_POST['city'];
        }

        if (!CityValidator::validate($cityName)) {
            $this->redirect(Redirect::backUrl());
        }

        $city = new CityModel();
        $city->name = $cityName;
        $city->save();

        $this->redirect('index.php');
    }

    public function delete(): void
    {
        $city = new CityModel();

        if (GetParametrValidator::validate('id')) {
            $cityId = $_GET['id'];
            if ($city->deleteById($cityId)) {
                Alert::make(AlertStatus::SUCCESS, 'Poprawnie usunięto element');
            } else {
                Alert::make(AlertStatus::DANGER, 'Coś poszło nie tak, spróbuj ponownie');
            }
        }

        $this->redirect(Redirect::backUrl());
    }

    public function listZipCode(): void
    {
        $view = View::getInstance();
        $view->set('title', 'Lista kodów pocztowych z miastem');

        $cityModel = new CityModel();

        if(isset($_POST['button_form'])){
            if(PostParametrValidator::validate('zipcode')){
                $zipCode = $_POST['zipcode'];
                $this->redirect('index.php?controller=City&action=listZipCode&value='. $zipCode);
                die;
            }else{
                Alert::make(AlertStatus::DANGER, 'Wprowadź wartość w polu "Kod pocztowy"');
                $this->redirect('index.php?controller=City&action=listZipCode');
                die;
            }
        }

        if(isset($_GET['value'])){
            $pagination = new Pagination($cityModel->getAllCitiesWhereLike($_GET['value']));
        }else{
            $pagination = new Pagination($cityModel->getAll());
        }

        $view->set('cities', $pagination->getAll());
        $view->set('paginateLinks', PaginationDraw::draw($pagination, 'index.php?controller=City&action=listZipCode&page='));
        $view->set('paginatePageInfo', PaginationDraw::showPageInfo($pagination));

        $view->render("zipCodeList");
    }

    public function updateZipCodeView(): void
    {
        $view = View::getInstance();
        $cityModel = new CityModel();
        $view->set('title', 'Dodaj kod pocztowy do miasta');
        $view->set('cities', $cityModel->getAll());
        $view->render('updateZipCode');
    }

    public function updateZipCode(): void
    {
        if (!PostParametrValidator::validate('city') || PostParametrValidator::validate('zipcode')) {
            $this->redirect(Redirect::backUrl());
        }

        $cityModel = new CityModel();
        if (!$cityModel->existElementById($_POST['city'])) {
            Alert::make(AlertStatus::DANGER, 'Niestety, takie miasto nie istnieje');
            $this->redirect(Redirect::backUrl());
        }

        if (!ZipCodeValidator::validate($_POST['zipcode'])) {
            Alert::make(AlertStatus::DANGER, 'Nieprawidłowy format kodu pocztowego: 00-000');
            $this->redirect(Redirect::backUrl());
        }


        $c = $cityModel->getElementById($_POST['city']);
        if ($cityModel->existCityWithZipCode($c->name, $_POST['zipcode'])) {
            Alert::make(AlertStatus::DANGER, 'Istnieje już takie miasto z takim samym kodem pocztowym');
            $this->redirect(Redirect::backUrl());
        }

        $c->zipCode = $_POST['zipcode'];
        $c->update();


        Alert::make(AlertStatus::SUCCESS, 'Kod pocztowy został poprawnie przypisany do miasta');
        $this->redirect('index.php?controller=City&action=listZipCode');
    }


}