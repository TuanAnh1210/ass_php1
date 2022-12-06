<?php ipView('frontend.component.header'); ?>

<div class="message__delete">
    <h2>Vui lòng xác minh email</h2>
    <h4>Và đợi kiểm duyệt (khoảng 1-2 ngày)</h4>
    <div class="btn__delete-container">
        <button class="yes">Yes</button>

    </div>
</div>
<div class="message__succ">
    <h2>Sắp xong rồi còn bước cuối thôi !!</h2>
    <h4>Nhấn yes để sang trang xác minh nhé</h4>
    <div class="btn__delete-container">
        <button class="yes_succ">Yes</button>

    </div>
</div>
<div data-aos-duration="2000" data-aos="zoom-out" class="form_wrapper">

    <div class="form_img">
        <img src="http://localhost/php1_ass_ph29220/public/imgs/form.png" alt="">
    </div>
    <form id="form_signup" class="form_acc" action="" method="POST">
        <h2 class="form_title signUp">Đăng ký</h2>
        <div class="form_group-right signUp">
            <label for="">Full name</label>
            <input id="nameIpt" type="text" placeholder="Full name..." name="fullname">
            <p class="error"></p>
        </div>
        <div class="form_group-right signUp">
            <label for="">Email</label>
            <input id="emailIpt" type="text" placeholder="John.snow@gmail.com" name="email">
            <p class="error"></p>
        </div>
        <div class="form_group-right signUp">
            <label for="">Password</label>
            <input id="passIpt" type="password" placeholder="*********" name="password">
            <p class="error"></p>
        </div>
        <div class="form_group-right signUp">
            <label for="">Confirm Password</label>
            <input id="repassIpt" type="password" placeholder="*********">
            <p class="error"></p>
        </div>
        <div class="form_group-right signUp confirmAdmin">
            <div>
                <label for="">Register user</label>
                <input checked id="userIpt" name="option" type="radio" value="user" class="auth">
            </div>
            <div>
                <label for="">Register admin</label>
                <input id="adminIpt" name="option" type="radio" value="admin" class="auth">
            </div>
        </div>


        <button class="btn_register">Đăng ký</button>

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

const formField = ['nameIpt', 'emailIpt', 'passIpt', 'repassIpt']

const form_signup = document.getElementById('form_signup')
const passIpt = document.getElementById('passIpt')
const repassIpt = document.getElementById('repassIpt')
const emailIpt = document.getElementById('emailIpt')
const regEmail = /^\w+@(\w+\.\w+){1,2}$/;


function showError(item, message) {
    item.nextElementSibling.innerText = message;
    item.previousElementSibling.style.color = 'red';
    item.style.border = '1px solid red';
}

function resetError(item) {
    item.nextElementSibling.innerText = '';
    item.previousElementSibling.style.color = 'black';

    item.style.border = '';
}

form_signup.onsubmit = (e) => {
    e.preventDefault()

    let isError = true
    formField.forEach(field => {
        const ele = document.getElementById(field)

        if (field == 'nameIpt') {
            if (ele.value.trim().length < 7) {
                showError(ele, 'Full name tối thiểu 7 kí tự')
                isError = false
            }
        }

        if (field == 'emailIpt') {
            if (regEmail.test(ele.value.trim()) == false) {
                showError(ele, 'Email không đúng định dạng')
                isError = false
            }
        }

        if (field == 'passIpt') {
            if (ele.value.trim().length < 6) {
                showError(ele, 'Password tối thiểu 6 kí tự')
                isError = false
            }
        }

        if (passIpt.value.trim() != repassIpt.value.trim()) {
            showError(passIpt, 'Password và Confirm Password không giống nhau')
            showError(repassIpt, 'Password và Confirm Password không giống nhau')
            isError = false
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
        if (checkExist() == true) {
            alert('Email đã tồn tại, vui lòng dùng email khác')
        } else {
            const auth = document.querySelectorAll('.auth')
            auth.forEach(item => {
                if (item.checked) {
                    if (item.value == 'user') {
                        // handle toast message
                        document.querySelector('.message__succ').classList.add('open')
                        document.querySelector('.yes_succ').onclick = () => {
                            form_signup.submit()
                        }
                    } else if (item.value == 'admin') {
                        document.querySelector('.message__delete').classList.add('open')
                        document.querySelector('.yes').onclick = () => {
                            form_signup.submit()
                        }
                    }
                }
            })

        }
    }
}

function checkExist() {
    const iptEmail = document.getElementById('iptEmail')

    const isSuccess = listUser.some(user => user.email == emailIpt.value)

    return isSuccess
}
</script>

<script src="http://localhost/php1_ass_ph29220/public/js/index.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="http://localhost/php1_ass_ph29220/public/lib/aos/aos.js"></script>
<script>
AOS.init();
</script>