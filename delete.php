<?php
    // (C)コントローラ
    require_once 'user_dao.php';
    session_start();
    // var_dump($_POST);
    $id = $_POST['id'];

    //$id番目のユーザーを削除
    UserDAO::delete($id);
    
    $_SESSION['flash_messsage'] = $id . '番目のユーザーを削除しました';
    header('Location: index.php');
    exit;