<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= dashboard_css() ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="http://localhost/php1_ass_ph29220/public/lib/aos/aos.css" />
</head>

<body>
    <div class="dashBoard_wrapper">
        <div class="sideBar">
            <a href="http://localhost/php1_ass_ph29220/"><img
                    src="http://localhost/php1_ass_ph29220/public/imgs/logo.png" alt="logo"></a>
            <ul class="dashBoard_list">
                <li class="dashBoard_item">
                    <i class="fa-solid fa-table-cells"></i>
                    <a class="" href="http://localhost/php1_ass_ph29220/admin/">Dashboard</a>
                </li>
                <li class="dashBoard_item">
                    <i class="fa-solid fa-qrcode"></i>
                    <a class="" href="http://localhost/php1_ass_ph29220/admin/productManage">Quản lý sản phẩm</a>
                </li>
                <li class="dashBoard_item">
                    <i class="fa-solid fa-chart-column"></i>
                    <a class="" href="http://localhost/php1_ass_ph29220/admin/userManage">Quản lý user</a>
                </li>
                <li class="dashBoard_item">
                    <i class="fa-solid fa-table-cells"></i>
                    <a class="" href="http://localhost/php1_ass_ph29220/admin/cateManage">Quản lý danh mục</a>
                </li>
                <li class="dashBoard_item">
                    <i class="fa-solid fa-chart-column"></i>
                    <a class="" href="#">Thống kê</a>
                </li>
            </ul>
        </div>