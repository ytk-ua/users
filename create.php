<?php
    //コントローラー（C）
    require_once "user_dao.php";
    // セッション開始 色々なファイルで共通して使える
    session_start();
    // コントローラ　HTMLのタグは含まない
    // $_POST＝”スーパーグローバル変数”（ページ間をまたがって飛んでくる連想配列）
    // var_dump($_POST);
    // 入力された名前を取得
    $name = $_POST["name"];
    // print $name;
    // 入力された年齢を取得
    $age = $_POST["age"];
    // print $age;
    
    // 入力された名前と年齢を持つ命誕生
    $new_user = new User($name, $age);
    // var_dump($new_user);
    //入力チェック(検証)
    $errors = $new_user->validate();
    
    //エラーが一つもなければ
    if(count($errors) === 0){
        //DAOを使ってデータベースに追加
        UserDAO::insert($new_user);
        $_SESSION['flash_messsage'] = $name . 'さんが追加されました';
        // index.phpへ移動(リダイレクト)
        header('Location: index.php');
        exit;
    
    }else{ //エラーが一つでもあればセッションにエラー配列を保存
        $_SESSION['errors'] = $errors;
        //画面遷移
        header('location: new.php');
        exit;
    }
    
