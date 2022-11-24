<?php ipView('frontend.component.header'); ?>

<div class="form_wrapper">
    <div class="form_img">
        <img src="http://localhost/php1_ass_ph29220/public/imgs/form.png" alt="">
    </div>
    <form class="form_acc" action="">
        <h2 class="form_title">Đăng nhập</h2>
        <div class="form_group-right">
            <label for="">Email</label>
            <input type="email" placeholder="John.snow@gmail.com" required>
        </div>
        <div class="form_group-right">
            <label for="">Password</label>
            <input type="password" placeholder="*********" required>
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

<script src="http://localhost/php1_ass_ph29220/public/js/index.js"></script>