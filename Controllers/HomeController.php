<?php


class  HomeController
{
    public function index($page)
    {
        include('Views/interfaces/'.$page.'.php');
    }
}