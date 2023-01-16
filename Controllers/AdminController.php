<?php

class AdminController
{
    public function index($page)
    {
        include('Views/Admin/'.$page.'.php');
    }
}