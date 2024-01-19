<?php require 'db-connect.php'; ?>
<?php require 'menu.php'; ?>
<hr>

<!DOCTYPE html>
<html lang="ja">
    <head>
    <meta charset="UTF-8">
    <title>追加</title>
    </head>
    <body>
        <h2>新しいグッズの追加</h2>
        <form action="toroku-output.php" method="post">
            グッズ名<input type="text" name="name" ><br>
            個数<input type="text" name="count" ><br>
            カテゴリー<select name="category"><option value="缶バッジ類">缶バッジ類</option><option value="紙類">紙類</option><option value="アクリル類">アクリル類</option><option value="ぬい類">ぬい類</option></select>
            <br><button type="submit">追加</button>
            </form>
    </body>
</html>