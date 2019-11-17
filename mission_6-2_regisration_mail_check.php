<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<form method="post" action="mission_6-2_regisration_mail_form.php">

		<?php
			require 'src/Exception.php';
			require 'src/PHPMailer.php';	
			require 'src/SMTP.php';
			require 'setting.php';

			$urltoken = hash('sha256',uniqid(rand(),1));
			$url = "http://tb-210046.tech-base.net/mission_6-2_regisration_form.php"."?urltoken=".$urltoken;

			// PHPMailerのインスタンス生成
			$mail = new PHPMailer\PHPMailer\PHPMailer();
			$mail->isSMTP(); // SMTPを使うようにメーラーを設定する
			$mail->SMTPAuth = true;
			$mail->Host = MAIL_HOST; // メインのSMTPサーバー（メールホスト名）を指定
			$mail->Username = MAIL_USERNAME; // SMTPユーザー名（メールユーザー名）
			$mail->Password = MAIL_PASSWORD; // SMTPパスワード（メールパスワード）
			$mail->SMTPSecure = MAIL_ENCRPT; // TLS暗号化を有効にし、「SSL」も受け入れます
			$mail->Port = SMTP_PORT; // 接続するTCPポート

			// メール内容設定
			$mail->CharSet = "UTF-8";
			$mail->Encoding = "base64";
			$mail->setFrom(MAIL_FROM,MAIL_FROM_NAME);
			$mail->addAddress($_POST["address"], $_POST["name"]); //受信者（送信先）を追加する
			//    $mail->addReplyTo('xxxxxxxxxx@xxxxxxxxxx','返信先');
			//    $mail->addCC('xxxxxxxxxx@xxxxxxxxxx'); // CCで追加
			//    $mail->addBcc('xxxxxxxxxx@xxxxxxxxxx'); // BCCで追加
			$mail->Subject = MAIL_SUBJECT; // メールタイトル
			$mail->isHTML(true);    // HTMLフォーマットの場合はコチラを設定します
			$body ="下記のURLからご登録下さい。".'<br>'.$url;
			$mail->Body  = $body; // メール本文
			// メール送信の実行
			if(!$mail->send()) {
				echo 'メッセージは送られませんでした！';
				echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
				echo '送信完了！';
			}	
		?>

		<p><input type="submit" name="back" value="戻る"></p>

		</form>
	</body>
</html>