<?php
    // コントローラ
    session_start();
    //create.phpで発生したerror情報を$errorsでSESSIONから取り出し
    $errors = $_SESSION['errors'];
    //セッションに保存されたエラー情報を破棄
    $_SESSION['errors'] = null;

    // HTMLファイルの表示
    include_once "new_view.php";
