<html>
	<head>
		<b>ログイン画面</b>
		<meta charset="UTF-8">
	</head>
	<body>
		<form method="post" action="mission_6-2_regisration_mail_check.php">
 
		<p>新規登録の方はこちらからメール認証を行ってください</p>

		<p>名前：<input type="text" name="name"></p>

		<p>メールアドレス：<input type="text" name="address"></p>

		<p><input type="submit" name="reg" value="送信"></p>

		</form>

		<form method="post" action="mission_6-2_login_check.php">

		<p>ログインの方はこちらからどうぞ</p>

		<p>id(メールアドレス)：<input type="text" name="address"></p>
		
		<p>パスワード：<input type="text" name="password"></p>

		<p><input type="submit" name="login" value="ログイン"></p>

		</form>
	</body>
</html>