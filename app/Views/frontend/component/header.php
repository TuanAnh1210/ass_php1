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
    <link rel="stylesheet" href="http://localhost/php1_ass_ph29220/public/lib/owl/owl.carousel.min.css" />
    <link rel="stylesheet" href="http://localhost/php1_ass_ph29220/public/lib/owl/owl.theme.default.min.css" />

    <link rel="stylesheet" href="http://localhost/php1_ass_ph29220/public/lib/aos/aos.css" />
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
                        <a class="nav_link" href="http://localhost/php1_ass_ph29220/">Trang Chủ</a>
                    </li>
                    <li class="nav_item"><a class="nav_link" href="http://localhost/php1_ass_ph29220/home/category">Sản
                            Phẩm</a></li>
                    <li class="nav_item">
                        <a class="nav_link" href="#">Về Chúng Tôi</a>
                    </li>
                    <li class="nav_item"><a class="nav_link" href="#">Liên Hệ</a></li>
                </ul>

                <?php if (!empty($_SESSION)) : ?>
                <div class="header_users">
                    <h3>
                        <?php echo $_SESSION['auth']['fullname'] ?>
                    </h3>
                    <img src="https://www.iconpacks.net/icons/2/free-user-icon-3296-thumb.png" alt="">
                    <div class="sub_user">
                        <a>
                            <i class="fa-solid fa-user"></i>
                            <span>Thông tin</span>
                        </a>
                        <a href="http://localhost/php1_ass_ph29220/account/gotopage">
                            <i class="fa-solid fa-gear"></i>
                            <span>Tới trang quản trị</span>
                        </a>
                        <a href="http://localhost/php1_ass_ph29220/account/logout">
                            <i class="fa-solid fa-right-to-bracket"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </div>
                <?php endif ?>

                <?php if (empty($_SESSION)) : ?>
                <div class="header_actions">
                    <a href="http://localhost/php1_ass_ph29220/account?signIn"><input class="btn-logIn" type="button"
                            value="Đăng Nhập" /></a>
                    <a href="http://localhost/php1_ass_ph29220/account?signUp"> <input class="btn-register"
                            type="button" value="Đăng Ký" /></a>
                </div>
                <?php endif ?>


                <div class="header__menu-icon">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>
        </header>