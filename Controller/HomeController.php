<?php

namespace Controller;

use Controller\Traits\RenderViewTrait;

class HomeController {

    use RenderViewTrait;

    /**
     * display the home page
     */
    public function homePage() {
        $user = 'Anonymous';
        if(isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
        }

        $this->render('home', 'Accueil', [
            'user' => $user,
        ]);
    }
}