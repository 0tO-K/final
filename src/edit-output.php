<?php require 'db-connect.php'; ?>
<?php require 'menu.php'; ?>
<hr>

<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>更新結果</title>
	</head>
	<body>
<?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('update goods set name=?,count=?');
    if (empty($_POST['name'])) {
        echo '商品名を入力してください。';
    } elseif (empty($_POST['count'])) {
        echo '個数を入力してください。';
    }elseif($sql->execute([htmlspecialchars($_POST['name']),$_POST['count']])){
    echo '<font color="blue">更新に成功しました。</font>';
   }else{
    echo '<font color="red">更新に失敗しました。</font>';
   }
    
?>
        <hr>
        <table>
<tr><th>番号</th><th>　グッズ名　</th><th>　個数　</th><th>　カテゴリー　</th></tr>

<?php
foreach($pdo->query('select * from goods') as $row){
    echo '<tr>';
        echo '<td>',$row['number'],'</td>';
        echo '<td>',$row['name'],'</td>';
        echo '<td>　',$row['count'],'</td>';
        echo '<td>　',$row['category'],'</td>';
        echo '<td>';
    echo'</tr>';
    echo"\n";
}
?>
        </table>
        <button onclick="location.href='goods.php'">一覧へ戻る</button>
    </body>
</html>