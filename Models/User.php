<?php

class User
{

    static public function login($data)
    {
        $username = $data["username"];
        $password = $data["password"];
        try {
            $query = "SELECT * FROM users WHERE username = :username AND password = :password";
            $stmt = BD::connect()->prepare($query);
            $stmt->execute(array(":username" => $username, ":password" => $password));
            $user = $stmt->fetch(PDO::FETCH_OBJ);
            if ($user) {
                return $user;
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            echo "error : " . $ex->getMessage();
            return false;
        }
    }

    public static function checkUsername($username)
    {
        $req = BD::connect()->prepare('SELECT * FROM users WHERE username = :username');
        $req->execute(array('username' => $username));
        $user = $req->fetch();
        if ($user) {
            return true;
        }
        return false;
    }

}
