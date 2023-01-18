<?php

class User
{
    // static public function login($data)
    // {
    //     $username = $data["username"];
    //     try {
    //         $query = "SELECT * FROM users WHERE username = :username";
    //         $stmt = BD::connect()->prepare($query);
    //         $stmt->execute(array(":username" => $username));
    //         $user = $stmt->fetch(PDO::FETCH_OBJ);
    //         if($user) {
    //             return $user;
    //         } else {
    //             return false;
    //         }
    //     } catch (PDOException $ex) {
    //         echo "error : " . $ex->getMessage();
    //         return false;
    //     }
    // }

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
}



// class User
// {
//     static public function login($data)
//     {
//         $username = $data["username"];
//         try {
//             $query = "SELECT * FROM users WHERE username = :username";
//             var_dump($query);
//             $stmt = BD::connect()->prepare($query);
//             $stmt->execute(array(":username" => $username));
//             $user = $stmt->fetch(PDO::FETCH_OBJ);
//             return $user;
//         } catch (PDOException $ex) {
//             echo "error : " . $ex->getMessage();
//         }
//     }

    
// }