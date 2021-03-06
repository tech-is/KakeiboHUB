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
	<!-- サイドバー -->
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
			<li class="active"><a href="http://localhost/KakeiboHUB/hub/dashboard/"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li><a href="http://localhost/KakeiboHUB/hub/pay"><em class="fa fa-calendar">&nbsp;</em> Post</a></li>
			<li><a href="http://localhost/KakeiboHUB/hub/history"><em class="fa fa-bar-chart">&nbsp;</em> History</a></li>
			<li><a href="http://localhost/KakeiboHUB/hub/chat"><em class="fa fa-toggle-off">&nbsp;</em> Chat</a></li>
			<li><a href="http://localhost/KakeiboHUB/hub/setting"><em class="fa fa-clone">&nbsp;</em> Setting</a></li>
			<li><a href="http://localhost/KakeiboHUB/hub/logout"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
	<!-- メインバー -->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-container">
			<div class="row">
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-shopping-cart color-blue"></em>
						<div class="large"><?= $array[0]['budget'] ?></div>
							<div class="text-muted">予算</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-blue panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-comments color-orange"></em>
						<div class="large"><?= $array[0]['job'] ?></div>
							<div class="text-muted">職業</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-orange panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
						<div class="large"><?= $array[0]['age'] ?></div>
							<div class="text-muted">年齢</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding"><em class="fa fa-xl fa-search color-red"></em>
						<div class="large"><?= $array[0]['from'] ?></div>
							<div class="text-muted">地域</div>
						</div>
					</div>
				</div>
			</div><!--/.row-->
		</div>
		<!-- グラフ -->
		<!-- <div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Site Traffic Overview
						<ul class="pull-right panel-settings panel-button-tab-right">
							<li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
								<em class="fa fa-cogs"></em>
							</a>
							<ul class="dropdown-menu dropdown-menu-right">
									<li>
										<ul class="dropdown-settings">
											<li><a href="#">
												<em class="fa fa-cog"></em> Settings 1
											</a></li>
											<li class="divider"></li>
											<li><a href="#">
												<em class="fa fa-cog"></em> Settings 2
											</a></li>
											<li class="divider"></li>
											<li><a href="#">
												<em class="fa fa-cog"></em> Settings 3
											</a></li>
										</ul>
									</li>
								</ul>
							</li>
						</ul>
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<canvas class="main-chart" id="line-chart" height="200" width="600"></canvas>
						</div>
					</div>
				</div>
			</div> -->
		<!-- </div>/.row -->

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default chat">
					<div class="panel-heading">
						みんなの家計簿
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
					</div>
					<div class="panel-body">
						<ul>
						<?php $num = count($array_inf); ?>
						<?php for( $i=0 ; $i<$num ; $i++ ) { ?>
							<li class="right clearfix"><span class="chat-img pull-right">
								</span>
								<div class="chat-body clearfix">
									<div class="header"><strong class="pull-left primary-font">
										名前：<?= $array_inf[$i]['name'] ?>　年齢：<?= $array_inf[$i]['age'] ?>　出身：<?= $array_inf[$i]['from'] ?>
									</strong> <small class="text-muted">
									</small></div>
									<p><?= $array_inf[$i]['private_cost'] ?>　¥<?= $array_inf[$i]['cost'] ?></p>
								</div>
							</li>
						<?php } ?>
						</ul>
					</div>
				</div>
			</div>
		</div><!-- /.row -->
	</div>	<!--/.main-->
	
	<script src="/KakeiboHUB/assets/js/jquery-1.11.1.min.js"></script>
	<script src="/KakeiboHUB/assets/js/bootstrap.min.js"></script>
	<script src="/KakeiboHUB/assets/js/chart.min.js"></script>
	<script src="/KakeiboHUB/assets/js/chart-data.js"></script>
	<script src="/KakeiboHUB/assets/js/easypiechart.js"></script>
	<script src="/KakeiboHUB/assets/js/easypiechart-data.js"></script>
	<script src="/KakeiboHUB/assets/js/bootstrap-datepicker.js"></script>
	<script src="/KakeiboHUB/assets/js/custom.js"></script>
	<!-- グラフ -->
	<script>
		window.onload = function () {
			var chart1 = document.getElementById("line-chart").getContext("2d");
			window.myLine = new Chart(chart1).Line(lineChartData, {
			responsive: true,
			scaleLineColor: "rgba(0,0,0,.2)",
			scaleGridLineColor: "rgba(0,0,0,.05)",
			scaleFontColor: "#c5c7cc"
			});
		};
	</script>
</body>
</html>