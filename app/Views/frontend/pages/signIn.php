<?php ipView('frontend.component.header'); ?>

<div class="form_wrapper">
    <div class="form_img">
        <img src="http://localhost/php1_ass_ph29220/public/imgs/form.png" alt="">
    </div>
    <form id="form_login" class="form_acc" action="" method="POST">
        <h2 class="form_title">Đăng nhập</h2>
        <div class="form_group-right">
            <label for="">Email</label>
            <input id="iptEmail" type="text" name="login_email" placeholder="John.snow@gmail.com">
            <p class="error"></p>
        </div>
        <div class="form_group-right">
            <label for="">Password</label>
            <input id="iptPass" type="password" name="login_password" placeholder="*********">
            <p class="error"></p>

        </div>
        <button class="btn_login">Đăng nhập ngay</button>
        <button class="btn_login-gg"><i class="fa-brands fa-google"></i> <span>Đăng nhập với tài khoản Google</span>
        </button>
        <div class="form_options">
            <a class="forgot_pass" href="">Quên mật khẩu?</a>
            <p class="options_register">Bạn chưa có tài khoản?<a
                    href="http://localhost/php1_ass_ph29220/account?signUp"> Đăng ký ngay</a></p>
        </div>
    </form>
</div>

<script>
// handle get data from db and convert arr php to arr js
const listUser = <?= json_encode($listUser) ?>

listUser.forEach(element => {
    for (let i in element) {
        if (!isNaN(Number(i))) {
            delete element[i];
        }
    }
});

function showError(item, message) {
    item.previousElementSibling.style.color = 'red';
    item.nextElementSibling.innerText = message;
    item.style.border = '1px solid red';
}

function resetError(item) {
    item.nextElementSibling.innerText = '';
    item.previousElementSibling.style.color = 'black';

    item.style.border = '';
}


// validate form and check db
const formField = ['iptEmail', 'iptPass']

const form_login = document.getElementById('form_login')

const regEmail = /^\w+@(\w+\.\w+){1,2}$/;

form_login.onsubmit = (e) => {
    e.preventDefault()

    let isError = true

    formField.forEach(field => {
        const ele = document.getElementById(field)

        if (field == 'iptEmail') {
            if (regEmail.test(ele.value.trim()) == false) {
                showError(ele, 'Email không đúng định dạng')
                isError = false
            }
        }

        if (field == 'iptPass') {
            if (ele.value.trim().length < 6) {
                showError(ele, 'Password tối thiểu 6 kí tự')
                isError = false

            }
        }

        if (ele.value.trim() == '') {
            showError(ele, 'Dữ liệu không được để trống')
            isError = false

        }

        ele.oninput = () => {
            resetError(ele)
        }
    })

    if (isError) {

        if (checkExist()) {
            form_login.submit()
        } else {
            alert('Email hoặc mật khẩu không chính xác')
        }
    }
}

function checkExist() {
    const iptEmail = document.getElementById('iptEmail')
    const iptPass = document.getElementById('iptPass')

    const isSuccess = listUser.some(user => user.email == iptEmail.value && user.password == iptPass.value)

    return isSuccess
}
</script>

<script src="http://localhost/php1_ass_ph29220/public/js/index.js"></script>