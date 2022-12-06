<?php
include  "PHPMailer/src/PHPMailer.php";
include  "PHPMailer/src/Exception.php";
include  "PHPMailer/src/OAuth.php";
include  "PHPMailer/src/POP3.php";
include  "PHPMailer/src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

$code = rand(1000, 9999);

try {
    //Server settings
    $mail->SMTPDebug = 0; // Enable verbose debug output
    $mail->isSMTP(); // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = 'braintech0852131210@gmail.com'; // SMTP username
    $mail->Password = 'zurbsmwbtvmkhuzs'; // SMTP password
    $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587; // TCP port to connect to

    //Recipients
    $mail->setFrom('braintech0852131210@gmail.com', 'BrainTech');

    $mail->addAddress($arrUser['email'], 'tuan anh'); // Add a recipient
    // $mail->addAddress('tuananh1210085213@gmail.com', 'tuan em'); // Add a recipient
    // Name is optional

    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz'); // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); // Optional name

    //Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'Ma xac minh email (vui long khong chia se cho ai)';
    $mail->Body = 'Mã xác minh của bạn là:' . $code;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>

<?php ipView('frontend.component.header') ?>

<div class="form_wrapper">

    <div class="form_img">
        <img src="http://localhost/php1_ass_ph29220/public/imgs/form.png" alt="">
    </div>
    <form class="authForm_wrapper" action="http://localhost/php1_ass_ph29220/account/authSuccess" method="POST">
        <h3 class="authTitle">Chúng tôi vừa gửi mã xác minh tới email của bạn !</h3>
        <p class="authSub">Vui lòng nhập mã xác minh</p>
        <input type="text" class="authCode" placeholder="Nhập mã xác minh...">
        <input hidden type="text" value="<?= $arrUser['email'] ?>" name="emailUser">
        <input hidden type="text" value="<?= $arrUser['fullname'] ?>" name="fullnameUser">
        <input hidden type="text" value="<?= $arrUser['password'] ?>" name="passwordUser">
        <input hidden type="text" value="<?= $arrUser['role'] ?>" name="roleUser">
        <input hidden type="text" value="<?= $arrUser['censorship'] ?>" name="censorshipUser">
        <button class="authBtn">Xác minh</button>
    </form>
</div>

<script>
const code = <?= json_encode($code) ?>

const authForm_wrapper = document.querySelector('.authForm_wrapper')

authForm_wrapper.onsubmit = (e) => {
    e.preventDefault()
    const codeIpt = document.querySelector('.authCode')
    if (codeIpt.value == code) {
        alert('Xác minh thành công !')
        authForm_wrapper.submit()
    }
}
</script>


<?php ipView('frontend.component.footer') ?>