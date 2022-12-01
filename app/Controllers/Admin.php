<?php
class Admin extends BaseController
{
    private $adminModel;
    private $cateModel;

    public function __construct()
    {
        $this->loadModel('AdminModel');
        $this->adminModel = new AdminModel;

        $this->loadModel('CategoryModel');
        $this->cateModel = new CategoryModel;
    }
    public function index()
    {
        return $this->view('admin.index');
    }
    public function productManage()
    {
        if (isset($_REQUEST['delete']) && !empty($_GET['id'])) {
            $idDelete = $_GET['id'];
            $this->adminModel->delete('products', $idDelete);
            $this->adminModel->resetId('products');
            header("location: http://localhost/php1_ass_ph29220/admin/productManage");
        }

        $listPrd = $this->adminModel->getAllPrd();
        return
            $this->view('admin.pages.productManage', ['listPrd' => $listPrd]);
    }
    public function addNewPrd()
    {
        if (!empty($_POST)) {

            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES['productImage']['name']);
            move_uploaded_file($_FILES["productImage"]["tmp_name"], $target_file);


            $prdName = $_POST['productName'];
            $prdPrice = $_POST['productPrice'];
            $prdImage = "http://localhost/php1_ass_ph29220/" . $target_file;
            $prdDesc = $_POST['productDesc'];
            $cateId = $_POST['categoryId'];

            $newListPrd = [
                'productName' => $prdName,
                'productPrice' => $prdPrice,
                'productImage' => $prdImage,
                'productDesc' => $prdDesc,
                'categoryId' => $cateId
            ];

            $this->adminModel->addPrd($newListPrd);
            header("location: http://localhost/php1_ass_ph29220/admin/productManage");
        }
        $listCate = $this->cateModel->getAllCate();

        return
            $this->view('admin.pages.addNewPrd', [
                "listCate" => $listCate
            ]);
    }

    public function updatePrd()
    {

        if (!empty($_GET["id"]) && $_GET["id"] > 0) {
            $idPrd = $_GET["id"];
            $data = $this->adminModel->one('products', $idPrd);
        } else {
            $data = [""];
        }

        if (!empty($_POST)) {
            if (!empty($_FILES['productImage']['name'])) {
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES['productImage']['name']);
                move_uploaded_file($_FILES["productImage"]["tmp_name"], $target_file);
            } else {
                $temp = 'http://localhost/php1_ass_ph29220/uploads/';
                $file_temp = $data['productImage'];
                $target_file = substr($file_temp, strlen('http://localhost/php1_ass_ph29220/'));
            }

            $prdName = $_POST['productName'];
            $prdPrice = $_POST['productPrice'];
            $prdImage = "http://localhost/php1_ass_ph29220/" . $target_file;
            $prdDesc = $_POST['productDesc'];
            $cateId = $_POST['categoryId'];

            $newListData = [
                "productName" => $prdName,
                "productDesc" => $prdDesc,
                "productImage" => $prdImage,
                "productPrice" => $prdPrice,
                "categoryId" => $cateId
            ];

            $this->adminModel->update('products', $newListData, $idPrd);
            header("location: http://localhost/php1_ass_ph29220/admin/productManage");
        }


        $listCate = $this->cateModel->getAllCate();
        return $this->view('admin.pages.updatePrd', [
            "data" => $data,
            "listCate" => $listCate
        ]);
    }

    public function userManage()
    {
        return $this->view('admin.pages.userManage');
    }

    public function cateManage()
    {

        if (isset($_GET['update']) && !empty($_GET['id']) && !empty($_GET['value'])) {
            $idCate = $_GET['id'];
            $newCate = $_GET['value'];
            $newArrCate = [
                'categoryName' => $newCate
            ];

            $this->cateModel->updateCate($newArrCate,  $idCate);
            header('location: http://localhost/php1_ass_ph29220/admin/cateManage');
        }

        if (isset($_GET['delete']) && !empty($_GET['id'])) {
            $idCateNew = $_GET['id'];
            $this->adminModel->delete('categories', $idCateNew);
            $this->adminModel->resetId('categories');

            header("location: http://localhost/php1_ass_ph29220/admin/cateManage");
        }

        if (!empty($_POST['cateName'])) {
            $newCateName = $_POST['cateName'];
            $newCateInsert = [
                'categoryName' => $newCateName
            ];
            $this->cateModel->createCategory($newCateInsert);
        }




        $listCate = $this->cateModel->getQuantityCate();

        return $this->view('admin.pages.cateManage', [
            'listCate' => $listCate
        ]);
    }

    public function addNewCate()
    {
        return $this->view('admin.pages.addNewCate');
    }
}