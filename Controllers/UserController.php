<?php

class UserController
{
    public function auth()
    {
        if (isset($_POST["submit"])) {
            $data["username"] = $_POST["username"];
            $data["password"] = $_POST["password"];
            $result = User::login($data);
            if ($result) {
                // log user in
                $_SESSION["auth"] = true;
                $_SESSION["username"] = $result->username;
                $_SESSION["admin"] = $result->admin;
                Session::set("success", "Vous avez connecter !!");
                Redirect::to("Dashboard");
            } else {
                Session::set("error", "Username ou mot de passe est incorrect");
                Redirect::to("login");
            }
        }
    }


    public function logout()
    {
        session_destroy();
    }
}
