<?php
	$dsn = 'mysql:dbname=○○;host=○○';
	$user = '○○';
	$password = '○○';
	$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

	$address_error = true;
	$password_error = true;
	if(empty($_POST["address"]) || empty($_POST["password"])){
		echo "入力されていない項目があります。";
	}
	else{
		$sql = 'SELECT * FROM tbreg3';
		$stmt = $pdo->query($sql);
		$results = $stmt->fetchAll();
		foreach ($results as $row){
			if($row["address"] == $_POST["address"])
				$address_error = false;
			else
				echo "メールアドレスの入力が間違っているか登録されていません。".'<br>';
			if($row["password"] == $_POST["password"])
				$password_error = false;
			else
				echo "パスワードの入力が間違っているか登録されていません。".'<br>';
		}
	}
	if($address_error == false && $password_error == false){
		$urltoken = hash('sha256',uniqid(rand(),1));
		$url = "http://tb-210046.tech-base.net/mission_6-2.php"."?urltoken=".$urltoken;
		header('Location: '.$url);
	}
	else
		echo "エラーが発生しました。登録し直してください。";
?>
