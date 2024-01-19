<?php require 'db-connect.php'; ?>
<?php require 'menu.php'; ?>
<hr>

<h1>所持数</h1>
<?php
$pdo=new PDO($connect,USER,PASS);
echo '<table>';
echo '<tr><th>番号</th><th>　グッズ名　</th><th>　個数　</th><th>　カテゴリー　</th></tr>';
$sql=$pdo->query('select * from goods');
foreach ($sql as $row){
        echo '<tr>';
        echo '<td>',$row['number'],'</td>';
        echo '<td>　',$row['name'],'</td>';
        echo '<td>　',$row['count'],'</td>';
        echo '<td>　',$row['category'],'</td>';
        echo '<td>';
        echo '<form action="edit.php" method="post">';
        echo '<input type="hidden" name="number" value="',$row['number'],'">';
        echo '<button type="submit">更新</button>';
        echo '</form>';
        echo '</td>';
        echo '<td>';
        echo '<form action="delete.php" method="post">';
        echo '<input type="hidden" name="number" value="',$row['number'],'">';
        echo '　<button type="submit">削除</button>';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
}
echo '</table>';
?>