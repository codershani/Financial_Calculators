<?php

namespace app\controllers;
use app\core\Application;
use app\core\Controller;
use app\core\middlewares\AuthMiddlewares;
use app\core\Request;
use app\core\Response;
use app\models\Tool;

class ToolController extends Controller
{

    private Tool $tool;

    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddlewares(['project', 'upload', 'edit']));
        $this->tool = new Tool();
    }

    public function index()
    {
        $this->setLayout('admin');
        
        return $this->render('admin/tools', [
            'model' => $this->tool
        ]);
    }

    public function upload(Request $request, Response $response)
    {
        if($request->isPost()) {
            $this->tool->loadData($request->getBody());

            if($this->tool->validate() && $this->tool->save()) {
                Application::$app->session->setFlash('success', 'Video Uploaded');
                Application::$app->response->redirect('/admin/project');
            }

            return $this->render('admin/projectUpload', [
                'model' => $this->tool
            ]); 
        }
        
        $this->setLayout('admin');
        return $this->render('admin/projectUpload', [
            'model' => $this->tool
        ]); 
    }

    public function edit(Request $request, Response $response)
    {

        if($request->isPost()) {
            $this->tool->loadData($request->getBody());

            if($this->tool->validate() && $this->tool->update(['id' => '11'])) {
                Application::$app->session->setFlash('success', 'Video Updated');
                Application::$app->response->redirect('/admin/project');
            }

            return $this->render('admin/projectUpload', [
                'model' => $this->tool
            ]);
        }

        $this->setLayout('admin');
        return $this->render('admin/projectUpload', [
            'model' => $this->tool
        ]); 
    }
}