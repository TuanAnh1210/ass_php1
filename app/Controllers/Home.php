<?php

class Home extends BaseController
{

    private $homeModel;
    private $cateModel;

    public function __construct()
    {
        $this->loadModel('HomeModel');
        $this->homeModel = new HomeModel;

        $this->loadModel('CategoryModel');
        $this->cateModel = new CategoryModel;
    }

    public function index()
    {
        $lists = $this->homeModel->getAll();
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
        $listsCategory = $this->cateModel->getAllCate();
        $listsPrd = $this->homeModel->getAll();


        return $this->view('frontend.pages.category', [
            'listsCategory' => $listsCategory,
            'listsPrd' => $listsPrd
        ]);
    }
}