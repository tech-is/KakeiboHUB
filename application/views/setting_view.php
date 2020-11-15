<body>
    <div class="">
        <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">ログアウト</a>
            
            <div class="collapse navbar-collapse" "navbarTogglerDemo03">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item"><a class="nav-link" href="*">トップページ</a></li>
                    <li class="nav-item"><a class="nav-link" href="*">投稿</a></li>
                    <li class="nav-item"><a class="nav-link" href="*">DM</a></li>
                    <li class="nav-item"><a class="nav-link" href="*">履歴</a></li>
                    <li class="nav-item"><a class="nav-link active" href="http://localhost/Hub/setting/">設定<span class="sr-only">(current)</span></a></li>
                </ul>
            </div>
        </nav> -->
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
                        <?php echo form_error('income', '<div class="">', '</div>'); ?>
                    </div>

                    <div class="col-md-auto">
                        <label for="food_cost">食費</label>
                        <input type="text" class="form-control" id="food_cost" name="food_cost">
                        <?php echo form_error('food_cost', '<div class="error">', '</div>'); ?>
                    </div>

                    <div class="col-md-auto">
                        <label for="utility_cost">光熱費</label>
                        <input type="text" class="form-control" id="utility_cost" name="utility_cost">
                        <?php echo form_error('utility_cost', '<div class="error">', '</div>'); ?>
                    </div>

                    <div class="col-md-auto">
                        <label for="rent">家賃</label>
                        <input type="text" class="form-control" id="rent" name="rent">
                        <?php echo form_error('rent', '<div class="error">', '</div>'); ?>
                    </div>

                    <div class="col-md-auto">
                        <label for="etc">その他</label>
                        <input type="text" class="form-control" id="etc" name="etc">
                        <?php echo form_error('etc', '<div class="error">', '</div>'); ?>
                    </div>
                </article>

                <aside class="form-group col-md-6">
                    <div class="col-md-auto">
                        <label for="budget">予算</label>
                        <input type="text" class="form-control" id="budget" name="budget">
                        <?php echo form_error('budget', '<div class="error">', '</div>'); ?>
                    </div>

                    <div class="col-md-auto">
                        <label for="name">ニックネーム</label>
                        <input type="text" class="form-control" id="name" name="name">
                        <?php echo form_error('name', '<div class="error">', '</div>'); ?>
                    </div>

                    <div class="col-md-auto">
                        <label for="age">年齢</label>
                        <input type="text" class="form-control" id="age" name="age">
                        <?php echo form_error('age', '<div class="error">', '</div>'); ?>
                    </div>

                    <div class="col-md-auto">
                        <label for="from">地域</label>
                        <input type="text" class="form-control" id="from" name="from">
                        <?php echo form_error('from', '<div class="error">', '</div>'); ?>
                    </div>

                    <div class="col-md-auto">
                        <label for="job">職業</label>
                        <input type="text" class="form-control" id="job" name="job">
                        <?php echo form_error('job', '<div class="error">', '</div>'); ?>
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
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"   crossorigin="anonymous"></script>
    <!-- <script src="js/bootstrap.min.js"></script> -->
</body>

