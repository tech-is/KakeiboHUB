<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hub</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/hub.css'); ?>" type="text/css">
</head>

<body>
    <h1>家計簿掲示板Hub</h1>
    <h2>新規会員登録</h2>
    <?php echo validation_errors(); ?>
    <?php echo form_open(); ?>
    <fieldset>
        <table>
            <tbody>
                <tr>
                    <th>メールアドレス</th>
                    <td><input type="text" id="email" name="email" value="<?php if (!empty($email)) {
                                                                                echo $email;
                                                                            } ?>" /></td>
                </tr>
                <tr>
                    <th>パスワード</th>
                    <td><input type="text" name="pass" value="<?php if (!empty($pass)) {
                                                                    echo $pass;
                                                                } ?>"></td>
                </tr>
            </tbody>
        </table>
    </fieldset>
    <p class="submit"><input type="submit" value="登録確認画面" class="button"></p>
    <?php echo form_close(); ?>
</body>
</html>