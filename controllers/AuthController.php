<?php

namespace app\controllers;
use app\core\Application;
use app\core\controller;
use app\core\middlewares\AuthMiddlewares;
use app\core\Request;
use app\core\Response;
use app\models\LoginForm;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddlewares(['admin']));
    }

    public function login(Request $request, Response $response)
    {
        $loginForm = new LoginForm();
        if($request->isPost()) {
            $loginForm->loadData($request->getBody());
            if($loginForm->validate() && $loginForm->login()) {
                Application::$app->session->setFlash('success', ' Successfully Logged In');
                $response->redirect('/admin');
                return;
            }
        }

        $this->setLayout('auth');
        return $this->render('frontend/login', [
            'model' => $loginForm
        ]);
    }
    

    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect('/');
    }

    public function admin()
    {
        $this->setLayout('admin');
        return $this->render('admin/dashboard');
    }

}