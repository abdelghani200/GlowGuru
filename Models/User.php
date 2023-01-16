<?php

class User
{
    static public function login($data)
    {
        $username = $data["username"];
        try {
            $query = "SELECT * FROM users WHERE username = :username";
            $stmt = BD::connect()->prepare($query);
            $stmt->execute(array(":username" => $username));
            $user = $stmt->fetch(PDO::FETCH_OBJ);
            return $user;
        } catch (PDOException $ex) {
            echo "error : " . $ex->getMessage();
        }
    }

    
}
