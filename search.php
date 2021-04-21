<?php
    //(C)
    require_once 'user_dao.php';
    // var_dump($_GET);
    // session_stat();
    $keyword = $_GET['name'];
    
    //$keywordであいまい検索する
    $users = UserDAO::search($keyword);
    
    //検索キーワードが空ならば
    if($keyword === ''){
        $flash_message = '';
    }else{
        $flash_message = $keyword . 'で検索しました';
    }
    
    //HTMLの表示
    include_once 'index_view.php';
    
    // var_dump($users);