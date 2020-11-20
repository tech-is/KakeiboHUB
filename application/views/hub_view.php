<h1>TECH I.S. 掲示板</h1>
<form method="post" action="http://localhost/codeigniter/bbs/add">
	<div class="usernameWrapper">
		<div class="form-group">
			<label >表示名</label>
			<input id="view_name" type="text" name="username"class="form-control">
		</div>
		<!-- 空の場合errorメッセージを出力する -->
		<?php if(isset($error_username["username"])){ ?>
			<p class="error_message"><?= $error_username["username"]; ?></p>
		<?php } ?>
	</div>
	<div class="messageWrapper">
		<div class="form-group">
			<label for="message">ひと言メッセージ</label>
			<textarea id="message" name="message" class="form-control"></textarea>
		</div>
		<!-- 空の場合errorメッセージを出力する -->
		<?php if(isset($error_message["message"])){ ?>
		<p class="error_message"><?= $error_message["message"]; ?></p>
		<?php } ?>
	</div>

	<div class="btnWrapper">
		<input type="submit" name="btn_submit" value="書き込む"class="btn btn-primary">
	</div>
</form>
<div class="bodyWrapper">
<!-- 配列に格納されているデータの数を取得 -->
<?php $num = count($array_inf); ?>
<?php for( $i=0 ; $i<$num ; $i++ ) { ?>
	<div class="messageRow">
		<div class="message">
			<div class="user_id">
				<p>NO.<?= $array_inf[$i]['id'] ?></p>
			</div>
			<div class="user_name">
				<p>Name:<?= $array_inf[$i]['username'] ?></p>
			</div>
			<div class="user_message">
				<p><?= $array_inf[$i]['message'] ?></p>
			</div>
			<div class="timestanp">
				<p><?= $array_inf[$i]['created_at'] ?></p>
			</div>
			<!-- JavaScript関数を使いbbsクラスのdeleteメソットを読み込む -->
			<div class="user_delete">
			<button class="btn btn-danger delete" onclick="return click_delete(<?= $array_inf[$i]['id'] ?>)">削除</button>
			</div>
		</div>
	</div>
<?php } ?>

<script type="text/javascript">
	function click_delete(data){
		if(window.confirm('本当に削除されますか？')){
			var id = data;
			location.href='http://localhost/codeigniter/bbs/delete?num=' + id;
		}else{
			window.alert('キャンセルされました');
		}
	}
</script>

<div class="pagination">
	<?php echo $this->pagination->create_links(); ?>
</div>
