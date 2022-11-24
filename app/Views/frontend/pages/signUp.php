<?php ipView('frontend.component.header'); ?>

<div class="form_wrapper">
    <div class="form_img">
        <img src="http://localhost/php1_ass_ph29220/public/imgs/form.png" alt="">
    </div>
    <form class="form_acc" action="">
        <h2 class="form_title signUp">Đăng ký</h2>
        <div class="form_group-right signUp">
            <label for="">Full name</label>
            <input type="text" placeholder="Full name..." required>
        </div>
        <div class="form_group-right signUp">
            <label for="">Email</label>
            <input type="email" placeholder="John.snow@gmail.com" required>
        </div>
        <div class="form_group-right signUp">
            <label for="">Password</label>
            <input type="password" placeholder="*********" required>
        </div>
        <div class="form_group-right signUp">
            <label for="">Confirm Password</label>
            <input type="password" placeholder="*********" required>
        </div>
        <button class="btn_register">Đăng ký</button>

    </form>
</div>

<script src="http://localhost/php1_ass_ph29220/public/js/index.js"></script>