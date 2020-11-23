<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hubconfirm</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/hub.css'); ?>" type="text/css">
</head>

<body>
    <h1>家計簿掲示板Hub</h1>
    <h2>確認画面</h2>
    <?php echo validation_errors(); ?>
    <form action="<?= base_url('hub/register'); ?>" method="post">
        <div style="text-align: center;">
            <fieldset>
                <table>
                    <tbody>
                        <tr>
                            <th>会員ID:</th>
                            <td><?php echo $email; ?></td>
                        </tr>
                        <tr>
                            <th>パスワード:</th>
                            <td><?php echo $pass; ?></td>
                        </tr>
                    </tbody>
                </table>
            </fieldset>
        </div>
        <input type="hidden" name="email" value="<?= $email; ?>">
        <input type="hidden" name="pass" value="<?= $pass; ?>">
        <div style="text-align: center;">
            <input type="button" name="btn_back" value="修正する" class="button" onclick="location.href='./'">
            <input type="submit" value="登録" class="button">
        </div>

    </form>
</body>

</html>