<?php
    //(C:Controller)
    require_once 'user_dao.php';
    session_start();
    // var_dump($_GET);
    $id = $_GET['id'];
    // print $id;
    
    //DAOを使って＄id番のユーザー情報をDBから持ってくる
    $user = UserDAO::find($id);
    $errors = $_SESSION['errors'];
    $_SESSION['errors'] = null;
    // var_dump($user);
    
    //HTML表示
    include_once 'edit_view.php';