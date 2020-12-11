<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>再設定</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/hub.css'); ?>" type="text/css">
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/silhouettes.png'); ?>" />
</head>
<body>
<h1>家計簿掲示板Hub</h1>
    <h2>パスワード再設定</h2>
    <?php echo validation_errors(); ?>
    <?php if(isset($error_message)) { echo $error_message; } ?>
    <form method="post">
    <fieldset>
        <table>
            <tbody>
                <tr>
                    <th>メールアドレス</th>
                    <td><input type="text" id="email" name="email" value="" /></td>
                </tr>
                <tr>
                    <th>ニックネーム</th>
                    <td><input type="text" name="name" value="" /></td>
                </tr>
                <tr>
                    <th>パスワード</th>
                    <td><input type="text" name="pass" value=""></td>
                </tr>
            </tbody>
        </table>
    </fieldset>
    <p class="submit"><input type="submit" value="再設定" class="button"></p>
</form>
</body>
</html>