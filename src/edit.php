<?php require 'db-connect.php'; ?>
<?php require 'menu.php'; ?>
<hr>

<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>更新</title>
	</head>
	<body>
<?php
    $pdo=new PDO($connect, USER, PASS);
	$sql=$pdo->prepare('select * from goods where number=?');
	$sql->execute([$_POST['number']]);
	foreach ($sql as $row) {
		echo '<form action="edit-output.php" method="post">';
		echo 'グッズ名<input type="text" name="name" value="', $row['name'], '">';
		echo '<br>個数<input type="text" name="count" value="', $row['count'], '">';
		echo '<br><input type="submit" value="更新">';
		echo '</form>';
		echo "\n";
	}
?>
<button onclick="location.href='goods.php'">一覧へ</button>
    </body>
</html>