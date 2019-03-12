<?php

namespace App\Controllers;
use App\Core\Controller;

class MainController extends Controller
{
    public function home()
    {
        $db =$this->getDatabaseConnection();
        $categoryModel = new \App\Models\CategoryModel($db);
        $categories = $categoryModel->getAll();
        $this->set('categories', $categories);

    }





}
