<!DOCTYPE html>
<html lang="ja">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>家計簿掲示板Hub</title>
    <!-- BootstrapのCSS読み込み -->
    <link href="/hub/assets/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    </head>
    <body>
        
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="#">ログアウト</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="#">トップページ</a>
                    <a class="nav-item nav-link" href="#">投稿</a>
                    <a class="nav-item nav-link" href="#">DM</a>
                    <a class="nav-item nav-link" href="#">履歴</a>
                    <a class="nav-item nav-link active" href="http://localhost/Hub/setting/">設定 <span class="sr-only">(current)</span></a>
                </div>
            </div>
        </nav>
        
        <h1 class="text-center">SETTING</h2>
        <form data-toggle="validator" role="form" method="post" action="http://localhost/Hub/add/">
            <!-- <?php echo validation_errors(); ?> -->
            <div class="form-group row">
                <article class="form-group col-md-6">
                    <div class="col-md-auto">
                        <label for="income">収入</label>
                        <input type="text" class="form-control" id="income" name="income">
                        <?php echo form_error('income', '<div class="text-danger">', '</div>'); ?>
                    </div>
                    
                    <div class="col-md-auto">
                        <label for="food_cost">食費</label>
                        <input type="text" class="form-control" id="food_cost" name="food_cost">
                        <?php echo form_error('food_cost', '<div class="text-danger">', '</div>'); ?>
                    </div>

                    <div class="col-md-auto">
                        <label for="utility_cost">光熱費</label>
                        <input type="text" class="form-control" id="utility_cost" name="utility_cost">
                        <?php echo form_error('utility_cost', '<div class="text-danger">', '</div>'); ?>
                    </div>
                    
                    <div class="col-md-auto">
                        <label for="rent">家賃</label>
                        <input type="text" class="form-control" id="rent" name="rent">
                        <?php echo form_error('rent', '<div class="text-danger">', '</div>'); ?>
                    </div>

                    <div class="col-md-auto">
                        <label for="etc">その他</label>
                        <input type="text" class="form-control" id="etc" name="etc">
                        <?php echo form_error('etc', '<div class="text-danger">', '</div>'); ?>
                    </div>
                </article>

                <aside class="form-group col-md-6">
                    <div class="col-md-auto">
                        <label for="budget">予算</label>
                        <input type="text" class="form-control" id="budget" name="budget">
                        <?php echo form_error('budget', '<div class="text-danger">', '</div>'); ?>
                    </div>
                    
                    <div class="col-md-auto">
                        <label for="name">ニックネーム</label>
                        <input type="text" class="form-control" id="name" name="name">
                        <?php echo form_error('name', '<div class="text-danger">', '</div>'); ?>
                    </div>

                    <div class="col-md-auto">
                        <label for="age">年齢</label>
                        <input type="text" class="form-control" id="age" name="age">
                        <?php echo form_error('age', '<div class="text-danger">', '</div>'); ?>
                    </div>

                    <div class="col-md-auto">
                        <label for="from">地域</label>
                        <input type="text" class="form-control" id="from" name="from">
                        <?php echo form_error('from', '<div class="text-danger">', '</div>'); ?>
                    </div>
                    
                    <div class="col-md-auto">
                        <label for="job">職業</label>
                        <input type="text" class="form-control" id="job" name="job">
                        <?php echo form_error('job', '<div class="text-danger">', '</div>'); ?>
                    </div>
                    
                    <div class="col-md-auto">
                        <label for="key">パスワード変更</label>
                        <input type="text" class="form-control" id="key" name="key">
                    </div>
                </aside>
            </div>

            <div class="form-row text-center">
                <div class="col-12">
                    <input type="submit" class="btn btn-primary  btn-lg" value="更新">
                </div>
            </div>
        </form>
    
        
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"   crossorigin="anonymous"></script>
    <!-- <script src="js/bootstrap.min.js"></script> -->
</body>
</html>

