<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ユーザー一覧</title>
</head>
<body>
    <!--ビュー（V）ファイル　index.phpを参照して使っている-->
    <h1>ユーザー一覧</h1>
    <link rel="stylesheet" href="style.css">
    <?php if($flash_message !== null): ?>
    <p><?= $flash_message ?></p>
    <?php endif; ?>
    
    <!--//カウント関数は数を数をかずえてくれる-->
    <?php if(count($users) === 0): ?>
    <p>ユーザーは誰もいません</p>
    <?php else: ?>
    <?php foreach($users as $user): ?>
    <ul>
        <li><a href="show.php?id=<?= $user->id ?>"><?= $user->id ?></a></li>
        <li><?= $user->name ?></li>
        <li><?= $user->age ?>歳</li>
        <li><?= $user->drink() ?></li>
    </ul>
    <?php endforeach; ?>
    <?php endif; ?>
    <p><a href="new.php">新規ユーザー登録</a></p>
    <!--<p><a href="delete.php">全ユーザー削除</a></p>-->
</body>
</html>