<?php
class Admin extends BaseController
{
    private $adminModel;

    public function __construct()
    {
        $this->loadModel('AdminModel');
        $this->adminModel = new AdminModel;
    }

    public function index()
    {
        return $this->view('admin.index');
    }

    public function productManage()
    {
        $sql = "SELECT * FROM products";
        $listPrd = $this->adminModel->query_all($sql);
        return $this->view('admin.pages.productManage', [
            'listPrd' => $listPrd
        ]);
    }
}