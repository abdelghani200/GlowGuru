<?php

class UserController
{
    public function auth()
    {
        if (isset($_POST["submit"])) {
            $data["username"] = $_POST["username"];
            $result = User::login($data);
            if ($result->username === $_POST["username"] && password_verify($_POST["password"], $result->password)) {
                $_SESSION["logged"] = true;
                $_SESSION["username"] = $result->username;
                $_SESSION["fullname"] = $result->fullname;
                $_SESSION["admin"] = $result->admin;
                Redirect::to("home");
            } else {
                Session::set("error", "Pseudo ou mot de passe est incorrect");
                Redirect::to("login");
            }
        }
    }

    protected function isAdmin()
    {
        if(isset($_SESSION['auth']) && $_SESSION['auth'] === 1){
            return true;
        } 
        else{
        //    return header('Location: /login'); 
           Redirect::to("login");
        }
    }

    public function logout()
    {
        session_destroy();
    }
}