<?php

namespace App\Controllers;
use App\Models\User;
use Laminas\Diactoros\Response\RedirectResponse;

class AuthController extends BaseController{

    public function getLogin(){
        return $this->renderHTML('login.twig');
    }


    public function postLogin($request){

        $postData = $request->getParsedBody();
        $responseMessage = null;

        $user = User::where('mail',$postData['mail'])->first();

        if($user){
            if(password_verify($postData['pass'],$user->pass)){
                $_SESSION['userId'] = $user->id;
                $responseMessage = 'OK credentials';
                return new RedirectResponse('/ejerciciosDWES/unidad6/symblogcomposer/admin');
            }else{
                $responseMessage = 'BAD credentials';
            }
        }else{
            $responseMessage = 'BAD credentials';
        }

        return $this->renderHTML(('login.twig'),[
            'responseMessage'=>$responseMessage]);
    }

    public function getLogout(){
        unset($_SESSION['userId']);
        return new RedirectResponse('/ejerciciosDWES/unidad6/symblogcomposer/login');
    }

}