<div class="dashBoard_acc">
    <i style="font-size: 24px; margin-right: 18px; color: #0066B2;" class="fa-regular fa-bell"></i>
    <p style="font-size: 16px; margin-right: 10px">Xin chào,
        <span style="color: #0066B2;">
            <?php echo $_SESSION['auth']['fullname'] ?>
        </span>
    </p>
    <img src="http://localhost/php1_ass_ph29220/public/imgs/ava.jpg" alt="">
    <div class="sub_user">
        <a>
            <i class="fa-solid fa-user"></i>
            <span>Thông tin</span>
        </a>

        <a style="text-decoration: none; color:black;" href="http://localhost/php1_ass_ph29220/account/logout">
            <i class="fa-solid fa-right-to-bracket"></i>
            <span>Logout</span>
        </a>
    </div>
</div>