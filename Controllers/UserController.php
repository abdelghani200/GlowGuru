<?php

class UserController
{
    // public function auth()
    // {
    //     if (isset($_POST["submit"])) {
    //         $data["username"] = $_POST["username"];
    //         $result = User::login($data);
            
    //             Session::set("error", "Pseudo ou mot de passe est incorrect");
    //             Redirect::to("accueil");
            
    //     }
    // }

    public function auth()
    {
        if (isset($_POST["submit"])) {
            $data["username"] = $_POST["username"];
            $data["password"] = $_POST["password"];
            $result = User::login($data);
            if ($result) {
                // log user in
                Session::set("success", "Vous avez connecter !!");
                Redirect::to("accueil");
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
