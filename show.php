<?php
    //(C:Controller)
    require_once 'user_dao.php';
    session_start();
    // var_dump($_GET);
    $id = $_GET['id'];
    // print $id;
    
    //DAOを使って＄id番のユーザー情報をDBから持ってくる
    $user = UserDAO::find($id);
    //セッションからflash_messageを取得し、セッションから削除
    $flash_message = $_SESSION['flash_message'];
    $_SESSION['flash_message'] = null;
    
    // var_dump($user);
    
    //HTML表示
    include_once 'show_view.php';