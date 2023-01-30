<?php

namespace App\Controller;

use App\Controller\AppController;
use cake\View\View;

class HeroController extends AppController
{
    public function home()
    {
        $this->viewBuilder()->setLayout('main_hero');
    }
}
