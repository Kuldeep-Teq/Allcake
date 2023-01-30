<?php

namespace App\Controller;

use App\Controller\AppController;

class TestController extends AppController
{
    public function index()
    {
        $this->autoRender = false;
        echo "<h2>Learning How to Create Controller<h2>";
        echo "Run File Without Template Using autoRender";
    }

    public function owt()
    {
        $this->set("name", "Kushal");
        $this->set("age", "22");
    }
}
