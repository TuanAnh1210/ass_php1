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
        if (isset($_GET['signIn'])) {
            $this->view('frontend.pages.signIn');
        } else if (isset($_GET['signUp'])) {
            $this->view('frontend.pages.signUp');
        }
    }
}
