<?php
class Account extends BaseController
{
    private $accountModel;

    public function __construct()
    {
        $this->loadModel('AccountModel');
        $this->accountModel = new AccountModel();
    }

    public function index()
    {
        $listUser = $this->accountModel->getAllUer();
        if (isset($_GET['signIn'])) {
            if (!empty($_POST['login_email']) && !empty($_POST['login_password'])) {
                $login_email = $_POST['login_email'];
                $auth = $this->accountModel->getAuth($login_email);
                $_SESSION['auth'] = $auth;
                if ($_SESSION['auth']['role'] == 1 && $_SESSION['auth']['censorship'] == 1) {
                    header('location: http://localhost/php1_ass_ph29220/admin');
                } else if ($_SESSION['auth']['role'] == 1 && $_SESSION['auth']['censorship'] == 0) {
                    echo '<h1>Tài khoản của bạn đang chờ duyệt </h1>';
                    unset($_SESSION['auth']);

                    die;
                } else if ($_SESSION['auth']['role'] == 0) {
                    header('location: http://localhost/php1_ass_ph29220/');
                }
            }

            $this->view('frontend.pages.signIn', [
                'listUser' => $listUser
            ]);
        } else if (isset($_GET['signUp'])) {
            if (!empty($_POST)) {
                $fullname = $_POST['fullname'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $role = $_POST['option'];
                if ($role == 'user') {
                    $arrUser = [
                        'fullname' => $fullname,
                        'email' => $email,
                        'password' => $password,
                        'role' => 0,
                        'censorship' => 1,
                    ];

                    mailAuth('sendmail', [
                        'arrUser' => $arrUser
                    ]);
                } else if ($role == 'admin') {
                    $arrUser = [
                        'fullname' => $fullname,
                        'email' => $email,
                        'password' => $password,
                        'role' => 1,
                        'censorship' => 0,
                    ];
                    mailAuth('sendmail', [
                        'arrUser' => $arrUser
                    ]);
                }
            }

            $this->view('frontend.pages.signUp', [
                'listUser' => $listUser
            ]);
        }
    }

    public function logout()
    {
        if (isset($_SESSION['auth'])) {
            unset($_SESSION['auth']);
            header('location: http://localhost/php1_ass_ph29220/');
        }
    }

    public function gotopage()
    {
        if ($_SESSION['auth']['role'] == 1 && $_SESSION['auth']['censorship'] == 1) {
            header('location: http://localhost/php1_ass_ph29220/admin');
        } else if ($_SESSION['auth']['role'] == 1 && $_SESSION['auth']['censorship'] == 0) {
            echo '<h1>Tài khoản của bạn đang chờ duyệt </h1>';
            unset($_SESSION['auth']);

            die;
        } else if ($_SESSION['auth']['role'] == 0) {
            echo '<h1>Tài khoản của bạn không có quyền quản trị </h1>';
            die;
        }
    }

    public function authSuccess()
    {
        if (!empty($_POST)) {
            $fullname = $_POST['fullnameUser'];
            $email = $_POST['emailUser'];
            $password = $_POST['passwordUser'];
            $role = $_POST['roleUser'];
            $censorship = $_POST['censorshipUser'];

            $arrUser = [
                'fullname' => $fullname,
                'email' => $email,
                'password' => $password,
                'role' => $role,
                'censorship' => $censorship,
            ];
            $this->accountModel->addNew($arrUser);
            header('location: http://localhost/php1_ass_ph29220/account?signIn');
        }
    }
}