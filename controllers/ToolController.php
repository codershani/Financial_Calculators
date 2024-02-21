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
        $this->tool = new Tool();
        $this->registerMiddleware(new AuthMiddlewares(['index','upload', 'edit']));
    }

    public function index()
    {
        $data = $this->tool->getToolDetails();

        $this->setLayout('admin');
        return $this->render('admin/tools', [
            'data' => $data,
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

            return $this->render('admin/tools', [
                'model' => $this->tool
            ]); 
        }
        
        $this->setLayout('admin');
        return $this->render('admin/tools', [
            'model' => $this->tool
        ]); 
    }

    public function edit(Request $request, Response $response)
    {

        $id = $request->getRouteParams()['id'];
        $data = $this->tool->getTool(['id' => $id]);

        if($request->isPost()) {
            $this->tool->loadData($request->getBody());

            if($this->tool->validate() && $this->tool->update(['id' => $id])) {
                Application::$app->session->setFlash('success', $data->tool_name .' Updated');
                Application::$app->response->redirect('/admin/tools');
            }

            $this->setLayout('admin');
            return $this->render('admin/edit-tool', [
                'data' => $data
            ]);
        }

        $this->setLayout('admin');
        return $this->render('admin/edit-tool', [
            'data' => $data
        ]); 
    }
}