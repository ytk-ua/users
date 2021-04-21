<?php
    //コントローラー（C）　データを作り出すファイル。
    //外部ファイルの読み込み（user.php）でClassのUserの定義を紐づける
    require_once "user_dao.php";
    // セッション開始
    session_start();
    // session_destroy();
    
    //DAOを使ってデータベースから全ユーザー情報を取得
    // $user_dao = new UserDAO();
    // $users = UserDAO->get_all_users();
    $users = UserDAO::get_all_users();
    
    $flash_message = $_SESSION['flash_messsage'];
    $_SESSION['flash_messsage'] = null;
    
    //HTMLの表示('index_view.php';)を表示しろって意味
    include_once 'index_view.php';
