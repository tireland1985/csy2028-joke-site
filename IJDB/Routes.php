<?php
namespace IJDB;
class Routes implements \CSY2028\Routes{
    public function getPage($route){
        require '../database.php';

        $jokesTable = new \CSY2028\DatabaseTable($pdo, 'joke', 'id');
        $categoriesTable = new \CSY2028\DatabaseTable($pdo, 'category', 'id');

        $controllers = [];
        $controllers['joke'] = new \IJDB\Controllers\Joke($jokesTable);
        $controllers['category'] = new \IJDB\Controllers\Category($categoriesTable);

        if($route == ''){
            $page = $controllers['joke']->home();
        }
        else {
            list($controllerName, $functionName) = explode('/', $route);
            $controller = $controllers[$controllerName];
            $page = $controller->$functionName();
        }
        return $page;

    }
}