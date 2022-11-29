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
    public function
    productManage()
    {
        if (isset($_REQUEST['delete']) && !empty($_GET['id'])) {
            $idDelete = $_GET['id'];
            $this->adminModel->delete('products', $idDelete);
            header("location: http://localhost/php1_ass_ph29220/admin/productManage");
        }

        $sql = "SELECT * FROM products";
        $listPrd =
            $this->adminModel->query_all($sql);
        return
            $this->view('admin.pages.productManage', ['listPrd' => $listPrd]);
    }
    public

    function addNewPrd()
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

            $this->adminModel->addPrd($prdName, $prdDesc, $prdImage, $prdPrice, $cateId);
            header("location: http://localhost/php1_ass_ph29220/admin/productManage");
        }
        $query = "SELECT * FROM categories";
        $listCate = $this->adminModel->query_all($query);

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


        $query = "SELECT * FROM categories";
        $listCate = $this->adminModel->query_all($query);
        return $this->view('admin.pages.updatePrd', [
            "data" => $data,
            "listCate" => $listCate
        ]);
    }
}