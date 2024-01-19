<?php require 'db-connect.php'; ?>
<?php require 'menu.php'; ?>
<hr>

<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>削除</title>
	</head>
	<body>
<?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('delete from goods where number=?');
    if ($sql->execute([$_POST['number']])){
        echo '削除に成功しました。';
    }else{
        echo '削除に失敗しました。';
    }
?>
    <br><hr><br>
	<table>
<?php
echo '<tr><th>番号</th><th>グッズ名　</th><th>個数</th><th>　カテゴリー</th></tr>';
    foreach ($pdo->query('select * from goods') as $row) {
        echo '<tr>';
        echo '<td>',$row['number'], '</td>';
        echo '<td>',$row['name'], '</td>';
        echo '<td>',$row['count'], '</td>';
        echo '<td>',$row['category'], '</td>';
        echo '</tr>';
        echo "\n";
    }
?> 
</table>
    </body>
</html>