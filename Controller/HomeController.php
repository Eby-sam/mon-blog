<?php

namespace App\Controller;

class HomeController extends AbstractController
{

    /**
     * @return void
     */
    public function index()
    {
        $this->render('home/index');
    }
}