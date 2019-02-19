<?php
    require_once('core/DatabaseConnection.php');
    require_once('core/DatabaseConfiguration.php');
    require_once ('models/UserModel.php');
    require_once ('models/CategoryModel.php');
    require_once ('controllers/MainController.php');
    require_once ('views/Main/home.php');


    use App\Core\DatabaseConfiguration;
    use App\Core\DatabaseConnection;
    use App\Models\UserModel;
    use App\Models\CategoryModel;
    use App\Controllers\MainController;


    $databaseConfiguration = new DatabaseConfiguration('localhost','root','','auction_project');
    $databaseConnection = new DatabaseConnection($databaseConfiguration);

//     $userModel = new UserModel($databaseConnection);
//     $users = $userModel->getAll();
//
//     print_r($users);
//    $categoryModel= new \App\Models\CategoryModel($databaseConnection);
//    $categories = $categoryModel->getAll();
//    print_r($categories);

$controller = new MainController($databaseConnection);
$data = $controller->home();

foreach ($data as $name=>$value){
    $$name=$value;
}
require_once 'views/Main/home.php';