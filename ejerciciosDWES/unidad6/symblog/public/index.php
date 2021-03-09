<?php
/**
 * index.php 
 * Front Controller
 */

session_start();
ini_set('display_errors',1);
ini_set('display_starup_error',1);
error_reporting(E_ALL);

require_once "../vendor\autoload.php";
use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Capsule\Manager as Capsule;
use Aura\Router\RouterContainer;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/..');
$dotenv->load();

$capsule = new Capsule;
$capsule->addConnection([
    'driver'    =>  'mysql',
    'host'      =>  $_ENV['DB_HOST'],
    'database'  =>  $_ENV['DB_NAME'],
    'username'  =>  $_ENV['DB_USER'],
    'password'  =>  $_ENV['DB_PASS'],
    'charset'   =>  'utf8',
    'collation' =>  'utf8_unicode_ci',
    'prefix'    =>  '',
]);


$capsule->setAsGlobal();
$capsule->bootEloquent();
$blogs = Blog::all();
$users = User::all();

$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
    );
    
$routerContainer = new RouterContainer();
$map = $routerContainer->getMap();

$map->get('index','/ejerciciosDWES/unidad6/symblog/', ['controller' => 'App\Controllers\IndexController','action' => 'indexAction']);
$map->get('addBlog','/ejerciciosDWES/unidad6/symblog/add', ['controller' => 'App\Controllers\BlogsController','action' => 'getAddBlogAction', 'auth' => true]);
$map->get('addUser','/ejerciciosDWES/unidad6/symblog/adduser', ['controller' => 'App\Controllers\UserController','action' => 'getUserAction', 'auth' => true]);
$map->get('login','/ejerciciosDWES/unidad6/symblog/login', ['controller' => 'App\Controllers\AuthController','action' => 'getLogin', 'auth' => true]);
$map->get('logout','/ejerciciosDWES/unidad6/symblog/logout', ['controller' => 'App\Controllers\AuthController','action' => 'getLogout', 'auth' => true]);
$map->get('about','/ejerciciosDWES/unidad6/symblog/about', ['controller' => 'App\Controllers\AboutController','action' => 'getAboutAction']);
$map->get('contact','/ejerciciosDWES/unidad6/symblog/contact', ['controller' => 'App\Controllers\ContactController','action' => 'getContactAction']);
$map->get('admin','/ejerciciosDWES/unidad6/symblog/admin', ['controller' => 'App\Controllers\AdminController','action' => 'getIndex']);


$map->post('saveBlog','/ejerciciosDWES/unidad6/symblog/add', ['controller' => 'App\Controllers\BlogsController','action' => 'getAddBlogAction']);
$map->post('saveUser','/ejerciciosDWES/unidad6/symblog/adduser', ['controller' => 'App\Controllers\UserController','action' => 'getUserAction']);
$map->post('savelogin','/ejerciciosDWES/unidad6/symblog/login', ['controller' => 'App\Controllers\AuthController','action' => 'postLogin']);


$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);
$needsAuth = $handlerData['auth'] ?? false;
$sessionUserId = $_SESSION['userId'] ?? null;
if ($needsAuth && !$sessionUserId) {
    header('Location: /login');
}
else {
    $handlerData = $route->handler;
    $controllerName = $handlerData['controller'];
    $actionName = $handlerData['action'];
    $controller = new $controllerName;
    $response = $controller->$actionName($request);
    foreach ($response->getHeaders() as $name => $values) {
        foreach ($values as $value) {
            header(sprintf('%s: %s', $name, $value), false);
        }
    }

    http_response_code($response->getStatusCode());
    echo $response->getBody();
}

?>