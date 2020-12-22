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
		<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
			<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>家計簿掲示板</span>Hub</a>
				<!-- <ul class="nav navbar-top-links navbar-right">
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-envelope"></em><span class="label label-danger">15</span>
					</a>
						<ul class="dropdown-menu dropdown-messages">
							<li>
								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
									<img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
									</a>
									<div class="message-body"><small class="pull-right">3 mins ago</small>
									<a href="#"><strong>John Doe</strong> commented on <strong>your photo</strong>.</a>
									<br /><small class="text-muted">1:24 pm - 25/03/2015</small></div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
									<img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
									</a>
									<div class="message-body"><small class="pull-right">1 hour ago</small>
										<a href="#">New message from <strong>Jane Doe</strong>.</a>
									<br /><small class="text-muted">12:27 pm - 25/03/2015</small></div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="all-button"><a href="#">
									<em class="fa fa-inbox"></em> <strong>All Messages</strong>
								</a></div>
							</li>
						</ul>
					</li>
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-bell"></em><span class="label label-info">5</span>
					</a>
						<ul class="dropdown-menu dropdown-alerts">
							<li><a href="#">
								<div><em class="fa fa-envelope"></em> 1 New Message
									<span class="pull-right text-muted small">3 mins ago</span></div>
								</a></li>
							<li class="divider"></li>
							<li><a href="#">
								<div><em class="fa fa-heart"></em> 12 New Likes
									<span class="pull-right text-muted small">4 mins ago</span></div>
								</a></li>
							<li class="divider"></li>
							<li><a href="#">
								<div><em class="fa fa-user"></em> 5 New Followers
									<span class="pull-right text-muted small">4 mins ago</span></div>
								</a></li>
						</ul>
					</li>
				</ul> -->
			</div>
		</div><!-- /.container-fluid -->
	</nav>

	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?= $array[0]['name'] ?></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span><?= $array[0]['mail'] ?></div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<ul class="nav menu">
			<li><a href="http://localhost/KakeiboHUB/hub/dashboard/"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li><a href="http://localhost/KakeiboHUB/hub/post"><em class="fa fa-calendar">&nbsp;</em> Post</a></li>
			<li><a href="http://localhost/KakeiboHUB/hub/history"><em class="fa fa-bar-chart">&nbsp;</em> History</a></li>
			<li><a href="http://localhost/KakeiboHUB/hub/chat"><em class="fa fa-toggle-off">&nbsp;</em> Chat</a></li>
			<li class="active"><a href="http://localhost/KakeiboHUB/hub/setting"><em class="fa fa-clone">&nbsp;</em> Setting</a></li>
			<li><a href="http://localhost/KakeiboHUB/hub/logout"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--.sidebar -->
	
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Setting</h1>
			</div>
		</div><!--/.row-->
		<div class="row">
            <div class="col-md-12">
                <form data-toggle="validator" role="form" method="post" action="http://localhost/Hub/update/">
                    <!-- <?php echo validation_errors(); ?> -->
                    <div class="form-group row">
                        <article class="form-group col-md-6">
                            <div class="col-md-auto">
                                <label for="income">収入</label>
                                <input type="text" class="form-control" id="income" name="income" value="<?= $array[0]['income'] ?>">
                                <?php echo form_error('income', '<div class="text-danger">', '</div>'); ?>
                            </div>
                            
                            <div class="col-md-auto">
                                <label for="food_cost">食費</label>
                                <input type="text" class="form-control" id="food_cost" name="food_cost" value="<?= $array[0]['food_cost'] ?>">
                                <?php echo form_error('food_cost', '<div class="text-danger">', '</div>'); ?>
                            </div>

                            <div class="col-md-auto">
                                <label for="utility_cost">光熱費</label>
                                <input type="text" class="form-control" id="utility_cost" name="utility_cost" value="<?= $array[0]['utility_cost'] ?>">
                                <?php echo form_error('utility_cost', '<div class="text-danger">', '</div>'); ?>
                            </div>
                            
                            <div class="col-md-auto">
                                <label for="rent">家賃</label>
                                <input type="text" class="form-control" id="rent" name="rent" value="<?= $array[0]['rent'] ?>">
                                <?php echo form_error('rent', '<div class="text-danger">', '</div>'); ?>
                            </div>

                            <div class="col-md-auto">
                                <label for="etc">その他</label>
                                <input type="text" class="form-control" id="etc" name="etc" value="<?= $array[0]['etc'] ?>">
                                <?php echo form_error('etc', '<div class="text-danger">', '</div>'); ?>
                            </div>
                        </article>

                        <aside class="form-group col-md-6">
                            <div class="col-md-auto">
                                <label for="budget">予算</label>
                                <input type="text" class="form-control" id="budget" name="budget" value="<?= $array[0]['budget'] ?>">
                                <?php echo form_error('budget', '<div class="text-danger">', '</div>'); ?>
                            </div>
                            
                            <div class="col-md-auto">
                                <label for="name">ニックネーム</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?= $array[0]['name'] ?>">
                                <?php echo form_error('name', '<div class="text-danger">', '</div>'); ?>
                            </div>

                            <div class="col-md-auto">
                                <label for="age">年齢</label>
                                <input type="text" class="form-control" id="age" name="age" value="<?= $array[0]['age'] ?>">
                                <?php echo form_error('age', '<div class="text-danger">', '</div>'); ?>
                            </div>

                            <div class="col-md-auto">
                                <label for="from">地域</label>
                                <input type="text" class="form-control" id="from" name="from" value="<?= $array[0]['from'] ?>">
                                <?php echo form_error('from', '<div class="text-danger">', '</div>'); ?>
                            </div>
                            
                            <div class="col-md-auto">
                                <label for="job">職業</label>
                                <input type="text" class="form-control" id="job" name="job" value="<?= $array[0]['job'] ?>">
                                <?php echo form_error('job', '<div class="text-danger">', '</div>'); ?>
                            </div>
                            
                            <div class="col-md-auto">
                                <label for="key">パスワード変更</label>
                                <input type="text" class="form-control" id="key" name="key" value="">
                            </div>
                        </aside>
                    </div>

                    <div class="form-row text-right">
                        <div class="col-12">
							<input type="submit" class="btn btn-primary  btn-lg" value="更新">
							<input type="hidden" name="id" value="<?= $array[0]['id'] ?>">
                        </div>
                    </div>
                </form>
            </div>
		</div><!--/.row-->
	</div>	<!--/.main-->
	
	<script src="/hub/assets/js/jquery-1.11.1.min.js"></script>
	<script src="/hub/assets/js/bootstrap.min.js"></script>
	<script src="/hub/assets/js/chart.min.js"></script>
	<script src="/hub/assets/js/chart-data.js"></script>
	<script src="/hub/assets/js/easypiechart.js"></script>
	<script src="/hub/assets/js/easypiechart-data.js"></script>
	<script src="/hub/assets/js/bootstrap-datepicker.js"></script>
	<script src="/hub/assets/js/custom.js"></script>
</body>
</html>
