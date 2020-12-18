<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員登録完了画面</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/hub.css'); ?>" type="text/css">
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/silhouettes.png'); ?>" />
</head>

<body>
    <h1>家計簿掲示板Hub</h1>
    <h2>会員登録ありがとうございます。</h2>
    <?php echo validation_errors(); ?>
    <form action="<?= base_url('toppage'); ?>" method="get">

        <a href="<?= base_url('toppage'); ?>" class="button">トップページに戻る</a>
        </div>
        <p>ご登録メールアドレスへご確認のメールをお送りいたしました。</p>
        <p>urlよりマイページへお進みください。</p>

        <?php echo form_close(); ?>
</body>

</html>