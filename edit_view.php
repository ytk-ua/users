<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title><?= $user->name ?>さんの編集</title>
    <link rel="stylesheet" href="style.css">
    </head>
<body>
    <!--ビュー（V）ファイル　index.phpを参照して使っている-->
    <h1><?= $user->name ?>さんの編集</h1>
    <!--エラーメッセージの表示-->
    <?php if($errors !== null): ?>
    <ul>
    <?php foreach($errors as $error): ?>
        <li><?= $error ?></li>
    <?php endforeach; ?>
    </ul>
    <?php endif; ?>
    
    <form action="update.php" method="POST">
        <!--valueに今の状況を初期設定として入る様にしておく-->
        名前： <input type="text" name="name" value="<?= $user->name ?>"><br>
        年齢： <input type="text" name="age" value="<?= $user->age ?>"><br>
        <!--何番を更新したかが分からないと送られた先で分からない。"hidden"隠しフィールドで送る。-->
        <input type="hidden" name="id" value="<?= $user->id ?>">
        <input type="submit" value="更新">
    </form>
    <p><a href="index.php">ユーザー一覧に戻る</a></p>
</body>
</html>