<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\View\View;

class FormController extends AppController
{
    public function register()
    {
        // to get array values 
        // $this->set(compact('users'));
        $this->set('title', 'Registration');

        $this->viewBuilder()->setLayout("home");
        if ($this->request->is('post')) {
            $data = $this->request->getData();
        }
    }

    public function login()
    {
        $this->viewBuilder()->setLayout("home");
    }

    public function logout()
    {
        $this->viewBuilder()->setLayout("home");
    }
}
