<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="<?= grid_css() ?>" />
    <link rel="stylesheet" href="<?= gridmap_css() ?>" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="<?= css_file() ?>" />
    <link rel="stylesheet" href="<?= css_responsive() ?>" />
</head>

<body>
    <main>
        <header>
            <div class="container header">
                <div class="header_logo">
                    <a href="http://localhost/php1_ass_ph29220/"><img
                            src="http://localhost/php1_ass_ph29220/public/imgs/logo.png" alt="logo" /></a>
                </div>
                <!-- nav-pc-tablet -->
                <ul class="header_nav">
                    <li class="nav_item">
                        <span class="closeIcon">
                            <i class="fa-regular fa-circle-xmark"></i>
                        </span>
                    </li>
                    <li class="nav_item">
                        <a class="nav_link active" href="#">Trang Chủ</a>
                    </li>
                    <li class="nav_item"><a class="nav_link" href="">Sản Phẩm</a></li>
                    <li class="nav_item">
                        <a class="nav_link" href="#">Về Chúng Tôi</a>
                    </li>
                    <li class="nav_item"><a class="nav_link" href="#">Liên Hệ</a></li>
                </ul>

                <div class="header_actions">
                    <input class="btn-logIn" type="button" value="Đăng Nhập" />
                    <input class="btn-register" type="button" value="Đăng Ký" />
                </div>

                <div class="header__menu-icon">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>
        </header>