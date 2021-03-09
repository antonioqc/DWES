<?php
    namespace App\Controllers;
    use App\Models\User;
    use App\Controllers\BaseController;
    use Laminas\Diactoros\Response\HtmlResponse as HtmlResponse;

    class UserController extends BaseController {                                                                                 
        public function getUserAction($request) {
            // var_dump((string)$request->getBody());
            // var_dump($request->getMethod());
            // var_dump($request->getParsedBody());

            if ($request->getMethod()=='POST') {
                $postData = $request->getParsedBody();
                $users = new User();
                $users->email = $postData['email'];
                $users->password = password_hash($postData['pass'], PASSWORD_DEFAULT);
                $users->save();
            }
            // include '..\views\addBlog.php';
            return $this->renderHTML('addUser.twig', ["users"=>User::all()]);
        }
    }
?>