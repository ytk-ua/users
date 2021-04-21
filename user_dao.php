<?php
    //外部ファイルの読み込み
    require_once 'user.php';
    //DAO(Database Acess Object)
    class UserDAO{
        //データベースに接続するメソッド
        private static function get_connection(){
        // 接続オプション[設定データベース文字化けや接続失敗時の設定情報]
            $options = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_CLASS,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
            );
            // データベースを操作する万能の神様誕生(PDO:PHP Database Object)
            $pdo = new PDO('mysql:host=localhost;dbname=users_app', 'root', '', $options);
            // 神様、はいあげる
            return $pdo;    
        }
        //データベースを切断するメソッド
        private static function close_connection($pdo, $stmt){
            $pdo = null;
            $stmt = null;
        }
        //データベースから全ユーザー情報を取得するメソッド
        public static function get_all_users(){
        // 例外処理(tryブロック)
            try{
                // データベースに接続して万能の神様誕生
                $pdo = self::get_connection();
                // SELECT文実行　（query：命令）
                $stmt = $pdo->query('SELECT * FROM users');
                // Fetch ModeをUserクラスに設定
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'User');
                // SELECT文の結果を Userクラスのインスタンス配列に格納。fetch：抜き出せ
                $users = $stmt->fetchAll();
                
            }catch(PDOException $e){
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
            // 完成したユーザー一覧、はいあげる
            return $users;    
        }
        //データーベースに新しいユーザーを登録するメソッド
        public static function insert($user){
            // 例外処理
            try{
                // データベースに接続して万能の神様誕生
                $pdo = self::get_connection();
                // 具体的な値はあいまいにしたまま INSERT文の実行準備
                $stmt = $pdo->prepare('INSERT INTO users(name, age) VALUES(:name, :age)');
                // バインド処理（あいまいだった値を具体的な値で穴埋めする）
                $stmt->bindValue(':name', $user->name, PDO::PARAM_STR);
                $stmt->bindValue(':age', $user->age, PDO::PARAM_INT);

                // INSERT文本番実行
                $stmt->execute();
                
            }catch(PDOException $e){
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
        }
        //$id番目のユーザーを取得するメソッド
        public static function find($id){
             // 例外処理(tryブロック)
            try{
                // データベースに接続して万能の神様誕生
                $pdo = self::get_connection();
                // SELECT文実行準備
                $stmt = $pdo->prepare('SELECT * FROM users WHERE id=:id');
                // バインド処理（あいまいだった値を具体的な値で穴埋めする）
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                 // SELECT文本番実行
                $stmt->execute();

                // Fetch ModeをUserクラスに設定
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'User');
                // SELECT文の結果を Userクラスのインスタンスに格納。fetch：抜き出せ
                $user = $stmt->fetch();
                
            }catch(PDOException $e){
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
            // 完成したユーザー、はいあげる
            return $user;    
        }
        //$id番目のユーザー情報を更新する
        public static function update($user, $id){
            // 例外処理
            try{
                // データベースに接続して万能の神様誕生
                $pdo = self::get_connection();
                // 具体的な値はあいまいにしたまま UPDATE文の実行準備
                $stmt = $pdo->prepare('UPDATE users SET name=:name, age=:age WHERE id=:id');
                // バインド処理（あいまいだった値を具体的な値で穴埋めする）
                $stmt->bindValue(':name', $user->name, PDO::PARAM_STR);
                $stmt->bindValue(':age', $user->age, PDO::PARAM_INT);
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);

                // UPDATE文本番実行
                $stmt->execute();
                
            }catch(PDOException $e){
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
        }
        //$id番目のユーザーを取得するメソッド
        public static function delete($id){
             // 例外処理(tryブロック)
            try{
                // データベースに接続して万能の神様誕生
                $pdo = self::get_connection();
                // DELETE文実行準備
                $stmt = $pdo->prepare('DELETE FROM users WHERE id=:id');
                // バインド処理（あいまいだった値を具体的な値で穴埋めする）
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                 // DELETE文本番実行
                $stmt->execute();

            }catch(PDOException $e){
            }finally{
                // 後処理
                self::close_connection($pdo, $stmt);
            }
        }
    }
    