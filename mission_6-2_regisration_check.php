<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<form method="post" action="mission_6-2_regisration_mail_form.php">
		<?php
			$dsn = 'mysql:dbname=○○;host=○○';
			$user = '〇○';
			$password = '〇〇';
			$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
			$sql = "CREATE TABLE IF NOT EXISTS tbreg3"
			." ("
			. "id INT AUTO_INCREMENT PRIMARY KEY,"
			. "address TEXT,"
			. "password TEXT"
			.");";
			$stmt = $pdo->query($sql);

			$error = false;
			if(empty($_POST["address"]) || empty($_POST["pass"])){
				echo '入力されていないデータがあります。';
				$error = true;
			}
			else{
				$sql = 'SELECT * FROM tbreg3';
				$stmt = $pdo->query($sql);
				$results = $stmt->fetchAll();
				foreach ($results as $row){
					if($row["address"] == $_POST["address"]){
						$error = true;
						echo "すでに使われているメールアドレスです。".'<br>';
					}
				}
			}
			if($error==false){
				$sql = $pdo -> prepare("INSERT INTO tbreg3 (address, password) VALUES (:address, :password)");
				$sql -> bindParam(':address', $address, PDO::PARAM_STR);
				$sql -> bindParam(':password', $pass, PDO::PARAM_STR);
				$address = $_POST["address"];
				$pass = $_POST["pass"];
				$sql -> execute();
			}
			else{
				echo "エラーが発生しました。登録し直してください。".'<br>';
			}
		?>

		<input type="submit" name="trangition" value="ログイン画面に戻る">

		</form>
		<form method="post" action="mission_6-2_regisration_form.php">
		<input type="submit" name="back" value="本登録画面に戻る">
		</form>
	</body>
</html>