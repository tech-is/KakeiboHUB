<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// タイムゾーン設定
date_default_timezone_set('Asia/Tokyo');

function phpmailer_send($email, $pass, $url)
{
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    $mail = new PHPMailer(true);

    try {
        //Gmail 認証情報
        $host = 'smtp.gmail.com';
        $username = 'takashi.sogo6253@gmail.com';
        $password = 'Takashi6253';

        //差出人
        $from = 'takashi.sogo6253@gmail.com';
        $fromname = '管理人';

        //件名・本文
        $subject = '会員登録完了のお知らせ';
        $body = '会員の登録しました。' . "\n" . '以下の情報で登録いたします。' . "\n\n";
        $body .= "メールアドレス：" . $email . "\n";
        $body .= "パスワード：" . $pass . "\n";
        $body .= "ログインurl:" . $url . "\n" ;
        $body .= "上記のurlからログインをお願いします。" . "\n\n";
        $body .= "以上で登録は完了です。" . "\n\n";

        //メール設定
        //$mail->SMTPDebug = 2; //デバッグ用
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = $host;
        $mail->Username = $username;
        $mail->Password = $password;
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->CharSet = "utf-8";
        $mail->Encoding = "base64";
        $mail->setFrom($from, $fromname);
        $mail->addAddress($email);
        $mail->Subject = $subject;
        $mail->Body = $body;

        //メール送信
        $mail->send();
        //echo '成功';
    } catch (Exception $e) {
        echo '失敗: ', $mail->ErrorInfo;
    }
}
