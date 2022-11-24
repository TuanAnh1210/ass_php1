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
        $sql = "select * from categories";
        $listsCategory = $this->homeModel->query_all($sql);

        if (!empty($_GET['dm']) && $_GET['dm'] > 0) {
            $query = "select * from products where categoryId = {$_GET['dm']}";
            $listsPrd = $this->homeModel->query_all($query);
        } else {
            $query = "select * from products where categoryId = 1";
            $listsPrd = $this->homeModel->query_all($query);
        }

        return $this->view('frontend.pages.category', [
            'listsCategory' => $listsCategory,
            'listsPrd' => $listsPrd
        ]);
    }
}