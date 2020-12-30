
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>家計簿掲示板Hub</title>
		<!-- Favicon-->
		<link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/silhouettes.png'); ?>" />
		<!-- BootstrapのCSS読み込み -->
		<link href="/KakeiboHUB/assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="/KakeiboHUB/assets/css/font-awesome.min.css" rel="stylesheet">
		<link href="/KakeiboHUB/assets/css/datepicker3.css" rel="stylesheet">
		<link href="/KakeiboHUB/assets/css/styles.css" rel="stylesheet">
		<!--Custom Font-->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	</head>

<body>
<div class="col-md-8 col-md-offset-2">
    <h2>初期設定</h2>
</div>
<div class="col-md-8 col-md-offset-2">
    <form action="http://localhost/KakeiboHUB/hub/first_add/" method="post">
        <div class="form-group">
            <div class="row">
                <div class="col-md-auto">
                    <label for="income">収入</label>
                    <input type="text" class="form-control" id="income" name="income" value="">
                    <?php echo form_error('food_cost', '<div class="text-danger">', '</div>'); ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-auto">
                    <label for="food_cost">食費</label>
                    <input type="text" class="form-control" id="food_cost" name="food_cost" value="">
                    <?php echo form_error('food_cost', '<div class="text-danger">', '</div>'); ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-auto">
                    <label for="utility_cost">光熱費</label>
                    <input type="text" class="form-control" id="utility_cost" name="utility_cost" value="">
                    <?php echo form_error('utility_cost', '<div class="text-danger">', '</div>'); ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-auto">
                    <label for="rent">家賃</label>
                    <input type="text" class="form-control" id="rent" name="rent" value="">
                    <?php echo form_error('rent', '<div class="text-danger">', '</div>'); ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-auto">
                    <label for="etc">その他</label>
                    <input type="text" class="form-control" id="etc" name="etc" value="">
                    <?php echo form_error('etc', '<div class="text-danger">', '</div>'); ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-auto">
                    <label for="budget">予算</label>
                    <input type="text" class="form-control" id="budget" name="budget" value="">
                    <?php echo form_error('budget', '<div class="text-danger">', '</div>'); ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-auto">
                    <label for="name">ニックネーム</label>
                    <input type="text" class="form-control" id="name" name="name" value="">
                    <?php echo form_error('name', '<div class="text-danger">', '</div>'); ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-auto">
                    <label for="age">年齢</label>
                    <select type="text" class="form-control" id="age" name="age" value="">
                    <?php
                        $i=0;
                        while($i <= 100){
                            echo "<option>".$i."</option>\n";
                            $i++;
                        }
                        ?>
                    </select>
                    <?php echo form_error('age', '<div class="text-danger">', '</div>'); ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-auto">
                    <label for="from">地域</label>
                    <select type="text" class="form-control" id="from" name="from" value="">
                        <option value="" selected>選択してください</option>
                        <option value="北海道">北海道</option>
                        <option value="青森県">青森県</option>
                        <option value="岩手県">岩手県</option>
                        <option value="宮城県">宮城県</option>
                        <option value="秋田県">秋田県</option>
                        <option value="山形県">山形県</option>
                        <option value="福島県">福島県</option>
                        <option value="茨城県">茨城県</option>
                        <option value="栃木県">栃木県</option>
                        <option value="群馬県">群馬県</option>
                        <option value="埼玉県">埼玉県</option>
                        <option value="千葉県">千葉県</option>
                        <option value="東京都">東京都</option>
                        <option value="神奈川県">神奈川県</option>
                        <option value="新潟県">新潟県</option>
                        <option value="富山県">富山県</option>
                        <option value="石川県">石川県</option>
                        <option value="福井県">福井県</option>
                        <option value="山梨県">山梨県</option>
                        <option value="長野県">長野県</option>
                        <option value="岐阜県">岐阜県</option>
                        <option value="静岡県">静岡県</option>
                        <option value="愛知県">愛知県</option>
                        <option value="三重県">三重県</option>
                        <option value="滋賀県">滋賀県</option>
                        <option value="京都府">京都府</option>
                        <option value="大阪府">大阪府</option>
                        <option value="兵庫県">兵庫県</option>
                        <option value="奈良県">奈良県</option>
                        <option value="和歌山県">和歌山県</option>
                        <option value="鳥取県">鳥取県</option>
                        <option value="島根県">島根県</option>
                        <option value="岡山県">岡山県</option>
                        <option value="広島県">広島県</option>
                        <option value="山口県">山口県</option>
                        <option value="徳島県">徳島県</option>
                        <option value="香川県">香川県</option>
                        <option value="愛媛県">愛媛県</option>
                        <option value="高知県">高知県</option>
                        <option value="福岡県">福岡県</option>
                        <option value="佐賀県">佐賀県</option>
                        <option value="長崎県">長崎県</option>
                        <option value="熊本県">熊本県</option>
                        <option value="大分県">大分県</option>
                        <option value="宮崎県">宮崎県</option>
                        <option value="鹿児島県">鹿児島県</option>
                        <option value="沖縄県">沖縄県</option>
                    </select>
                    <?php echo form_error('from', '<div class="text-danger">', '</div>'); ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-auto">
                    <label for="job">職業</label>
                    <select type="text" class="form-control" id="job" name="job" value="">
                        <option value="">選択してください</option>
                        <option value="公務員">公務員</option>
                        <option value="経営者・役員">経営者・役員</option>
                        <option value="会社員">会社員</option>
                        <option value="自営業">自営業</option>
                        <option value="自由業">自由業</option>
                        <option value="専業主婦">専業主婦</option>
                        <option value="パート・アルバイト">パート・アルバイト</option>
                        <option value="学生">学生</option>
                        <option value="その他">その他</option>
                    </select>
                    <?php echo form_error('job', '<div class="text-danger">', '</div>'); ?>
                </div>
            </div>

            <div class="row">
                <div class="form-row text-right">
                    <div class="col-12">
                    <input type="submit" class="btn btn-primary  btn-lg" value="登録">
                    <input type="hidden" name="id" value="<?= $array[0]['id'] ?>">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</body>
</html>