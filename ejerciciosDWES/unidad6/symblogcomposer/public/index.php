<?php

ini_set('display_errors',1);
ini_set('display_starup_error',1);
error_reporting(E_ALL);

require_once ('../vendor/autoload.php');
session_start();

use Illuminate\Database\Capsule\Manager as Capsule;
use Aura\Router\RouterContainer;
use Symfony\Component\Dotenv\Dotenv;
use App\Models\Blog;
use Laminas\Diactoros\Response\RedirectResponse;
$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/../.env');

$capsule = new Capsule;

//Conexión sin usar variables de entorno
/* $capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'b_symblog',
    'username'  => 'symblog',
    'password'  => 'symblog',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);
 */
//Conexión con variables de entorno.



$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => $_ENV['DB_HOST'],
    'database'  => $_ENV['DB_NAME'],
    'username'  => $_ENV['DB_USER'],
    'password'  => $_ENV['DB_PASS'],
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);




// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

//Creamos la variable blogs para recoger las tablas
//$blogs = Blog::all();

/* $route = $_GET['route'] ?? '/';
if($route == '/'){
    require('../index.php');
}
elseif ($route == 'addBlog'){
    require('../addBlog.php');
}
elseif ($route == 'contact'){
    require('../contact.php');
}
elseif ($route == 'about'){
    require('../about.php');
}
elseif ($route == 'show'){
    require('../show.php');
} */

$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);

$routerContainer = new RouterContainer();
$map = $routerContainer->getMap();


$map->get('index','/ejerciciosDWES/unidad6/symblogcomposer/',['controller'=>'App\Controllers\IndexController',
                        'action'=>'indexAction']);

$map->get('addBlog','/ejerciciosDWES/unidad6/symblogcomposer/blogs/add',['controller'=>'App\Controllers\BlogsController',
                                    'action'=>'getAddBlogAction',
                                    'auth'=>true]);
$map->post('saveBlog','/ejerciciosDWES/unidad6/symblogcomposer/blogs/add',['controller'=>'App\Controllers\BlogsController',
                                    'action'=>'getAddBlogAction',
                                    'auth'=>true]);                                    


$map->get('contact','/ejerciciosDWES/unidad6/symblogcomposer/contact',['controller'=>'App\Controllers\IndexController',
                                'action'=>'contactAction']);


$map->get('about','/ejerciciosDWES/unidad6/symblogcomposer/about',['controller'=>'App\Controllers\IndexController',
                            'action'=>'aboutAction']);


$map->get('show','/ejerciciosDWES/unidad6/symblogcomposer/blogs/show',['controller'=>'App\Controllers\BlogsController',
                                'action'=>'showBlogAction']);

//AddUser
$map->get('addUser','/ejerciciosDWES/unidad6/symblogcomposer/users/add',['controller'=>'App\Controllers\UsersController',
                                'action'=>'getAddUserAction',
                                'auth'=>true]);

$map->post('saveUser','/ejerciciosDWES/unidad6/symblogcomposer/users/add',['controller'=>'App\Controllers\UsersController',
                                'action'=>'getAddUserAction',
                                'auth'=>true]); 

//Login
$map->get('login','/ejerciciosDWES/unidad6/symblogcomposer/login',['controller'=>'App\Controllers\AuthController',
                                'action'=>'getLogin']);

$map->post('loginUser','/ejerciciosDWES/unidad6/symblogcomposer/login',['controller'=>'App\Controllers\AuthController',
                                'action'=>'postLogin']);  

//admin

$map->get('admin','/ejerciciosDWES/unidad6/symblogcomposer/admin',['controller'=>'App\Controllers\AdminController',
                                'action'=>'getIndex',
                                'auth'=>true]);  

//logout

$map->get('logout','/ejerciciosDWES/unidad6/symblogcomposer/logout',['controller'=>'App\Controllers\AuthController',
                                'action'=>'getLogout',
                                'auth'=>true]);



$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);
if(!$route){
    echo "No route";
}else{
    //require $route->handler;
    $handlerData = $route->handler;
    $controllerName = $handlerData['controller'];
    $actionName = $handlerData['action'];

    $needsAuth = $handlerData['auth'] ?? false;
    $sessionUserId = $_SESSION['userId'] ?? null;

    if($needsAuth && !$sessionUserId){
        header('location: /login');
    }else{
        $controller = new $controllerName;
        $response = $controller->$actionName($request);

        foreach($response->getHeaders() as $name => $values) {
            foreach($values as $value){
                header(sprintf('%s: %s',$name,$value),false);
            }
        }

       /*  http_response_code($response->getStatusCode());*/
        echo $response->getBody(); 
    }


}


?>