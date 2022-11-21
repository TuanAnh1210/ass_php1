<?php

class Home extends BaseController
{

    private $homeModel;

    public function __construct()
    {
        $this->loadModel('HomeModel');
        $this->homeModel = new HomeModel;
    }

    public function index()
    {
        $lists = $this->homeModel->getProduct(4, 'ASC');
        return $this->view('frontend.index', [
            'lists' => $lists
        ]);
    }

    public function detail()
    {
        if (!empty($_GET['id']) && $_GET['id'] > 0) {
            $item = $this->homeModel->getById($_GET['id']);
        }

        return $this->view('frontend.pages.detail', [
            'item' => $item
        ]);
    }

    public function category()
    {
        return $this->view('frontend.pages.category');
    }
}
