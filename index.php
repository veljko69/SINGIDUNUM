<?php
    require_once 'Configuration.php';
    require_once'core/DatabaseConnection.php';
    require_once'core/DatabaseConfiguration.php';
    require_once 'core/Controller.php';
    require_once 'models/CategoryModel.php';
    require_once 'models/UserModel.php';
    require_once 'controllers/MainController.php';
    require_once 'core/Route.php';
//    require_once 'Routes.php';
    require_once 'core/Router.php';


use App\Core\DatabaseConfiguration;
    use App\Core\DatabaseConnection;
    use App\Models\UserModel;
    use App\Models\CategoryModel;
    use App\Controllers\MainController;
    use App\Core\Controller;
    use App\Core\Router;
    use App\Core\Route;

$databaseConfiguration = new DatabaseConfiguration(
        Configuration::DATABASE_HOST,
        Configuration::DATABASE_USER,
        Configuration::DATABASE_PASS,
        Configuration::DATABASE_NAME
    );
    $databaseConnection = new DatabaseConnection($databaseConfiguration);

     $url = filter_input(INPUT_GET , 'URL');
     $httpMethod = filter_input(INPUT_SERVER,'REQUEST_METHOD');

     $router = new App\Core\Router();
     $routes = require'Routes.php';
     foreach ($routes as $route){

         $router->add($route);
     }
//print_r($route);

     var_dump($router);
$route = $router->find($httpMethod,$url);

          $userModel = new UserModel($databaseConnection);
     $users = $userModel->getAll();
     print_r($users);

    $categoryModel= new \App\Models\CategoryModel($databaseConnection);
    $categories = $categoryModel->getAll();
    print_r($categories);

$controller = new \App\Controllers\MainController($databaseConnection);

$controller->home();
$name=null;
$data = $controller->getData();
$categories = $data['categories'];
foreach ($data as $name=>$value){
    $$name = $value;

}

require_once 'views/Main/home.php';
