<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hub Login</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/hub.css'); ?>" type="text/css">
</head>
<h1>家計簿掲示板Hub</h1>
<h2>ログイン</h2>
<?php if(!empty($error)) { ?>
        <?php echo $error; ?>
<?php } ?>
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
                <td>
                    <input type="password" name="pass" value="<?php if (!empty($pass)) {
                                                                    echo $pass;
                                                                } ?>">
                </td>
            </tr>
        </tbody>
    </table>
</fieldset>
<p class="submit"><input type="submit" value="ログイン" class="button"></p>
<div class="element_wrap">
    <a href="passreset" id="btn-reset">パスワード再設定</a>
    <p>パスワードをお忘れの方、有効期限の切れた方はこちらからパスワードを再設定してください。</p>
</div>


</form>
</body>

</html>