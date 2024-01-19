<?php require 'db-connect.php'; ?>
<?php require 'menu.php'; ?>
<hr>

<!DOCTYPE html>
<html lang="ja">
    <head>
    <meta charset="UTF-8">
    <title>追加結果</title>
    </head>
<body>
<?php
$pdo=new PDO($connect,USER,PASS);
$sql=$pdo->prepare('insert into goods(name,count,category)values(?,?,?)');

if(empty($_POST['name'])){
    echo '商品名を入力してください';
}else if(empty($_POST['category'])){
    echo'カテゴリーを入力してください。';
}elseif($sql->execute([$_POST['name'],$_POST['count'],$_POST['category']])){
    echo '<font color="blue">追加に成功しました。</font>';
}else{
    echo '<font color="red">追加に失敗しました。</font>';
}
?>
<br><hr><br>

<table>

<?php
echo '<tr><th>番号</th><th>グッズ名　</th><th>個数</th><th>　カテゴリー</th></tr>';
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
  <form action="goods.php" method="post">
  <button type="submit">追加画面へ戻る</button>
</form>
</body>
</html>