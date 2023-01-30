<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;



class EmployeeController extends AppController
{
    public function index()
    {
        $connection = ConnectionManager::get('default');
        $results = $connection->execute('SELECT * FROM products')->fetchAll('assoc');
        print_r($results);
    }
}
