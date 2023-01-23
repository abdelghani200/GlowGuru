<?php

class UserController
{
    public function auth()
    {
        if (isset($_POST["submit"])) {
            $data["username"] = $_POST["username"];
            $data["password"] = $_POST["password"];
            $check = User::checkUsername($data["username"]);
            $errrors = "Username incorrect";
            $errror = "Password incorrect";
            if ($check) {
                $result = User::login($data);
                if ($result) {
                    // log user in
                    $_SESSION["auth"] = true;
                    $_SESSION["username"] = $result->username;
                    $_SESSION["admin"] = $result->admin;
                    Session::set("success", "Vous avez connecter !!");
                    Redirect::to("Dashboard");
                } else {
                    Session::set("error", $errror);
                    Redirect::to("login");
                }
            } else {
                Session::set("error", $errrors);
                Redirect::to("login");
            }
        }
    }

    public function logout()
    {
        session_destroy();
    }
}
