<?php

namespace App\Controllers;
use App\Models\User;

class UsersController extends BaseController{

    public function getAddUserAction($request){

        if ($request->getMethod() == 'POST'){
            $postData = $request->getParsedBody();

            $user = new User();
            $user->mail = $postData['mail'];
            $user->pass = password_hash($postData["pass"],PASSWORD_DEFAULT);
            $user->save();
        }

        return $this->renderHTML('addUser.twig');
    }

}