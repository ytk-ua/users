<?php
    //モデル（M）
    //ユーザーの設計図classを作る classはたい焼きの金型。publicがあんこやカスタードなど具材が食べるたい焼きが生まれるのがインスタンス
    //オブジェクト思考とは設計図を元にやり取りをしていくこと。実世界的なストーリー。
    class User{
        //プロパティ
        public $name; //名前
        public $age; //年齢
        //コンストラクタ
        public function __construct($name='', $age=''){
            $this->name = $name;
            $this->age = $age;
            // print $this->name . "さんが生まれた" . PHP_EOL;
        }
        //メソッド
        //お酒の飲む
        public function drink(){
            //２０歳以上ならば
            if($this->age >=20){
                return $this->name . "さん、お酒はほどほどに" . PHP_EOL;
            }else{
                return $this->name . "さん、お酒は２０歳から。後" . (20 - $this->age). "年お待ち下さい" . PHP_EOL;
            }
        }
        //入力チェックをするメソッド
        public function validate(){
            //エラー情報を格納する配列作成
            $errors = array();
            //名前が入力されていなければ
            if($this->name === ''){
                $errors[] = '名前を入力してください';
            }
            //年齢が入力されていなければ
            if($this->age === ''){
                $errors[] = '年齢を入力してください';
            }else if(!preg_match('/^[0-9]+$/', $this->age)){ //０以上の整数でないならば
                $errors[] = '年齢は０以上の正数を入力してください';
            }
            
            return $errors;
        }
    }
    
    //徳永さん誕生(インスタンス化）
    // $tokunaga = new User("徳永", 38);
    //島さん誕生
    // $shima = new User("島", 18);
    //徳永さん、島さんお酒を飲む
    // $tokunaga->drink();
    // $shima->drink();
    
    // $yamada = new User("山田", 80);
    // $yamada->drink();
    
    //ユーザー一覧を保存する配列を作る
    // $users = [];
    // var_dump($users);
    // array_push($users, $tokunaga);
    // var_dump($users);
    // $users[] = $shima;
    // var_dump($users);
    // $users[] = $yamada;
    // var_dump($users);