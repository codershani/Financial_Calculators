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
        $this->registerMiddleware(new AuthMiddlewares(['index','upload', 'update', 'delete']));
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

    public function update(Request $request, Response $response)
    {

        $id = $request->getRouteParams()['id'];
        $data = $this->tool->getTool(['id' => $id]);

        if(isset($request->getRouteParams()['status']) && $request->getRouteParams()['status'] === 'enable') {
            $result = $this->tool->updateOne(['id' => $id], ['status' => 1]);
            if($result) {
                Application::$app->response->redirect('/admin/tools');
            }
        } elseif (isset($request->getRouteParams()['status']) && $request->getRouteParams()['status'] === 'disable') {
            $result = $this->tool->updateOne(['id' => $id], ['status' => 0]);
            if($result) {
                Application::$app->response->redirect('/admin/tools');
            }
        }

        if($request->isPost()) {

            $folder = "uploads/";
            if(!file_exists($folder))
            {
                mkdir($folder,0777,true);
            }

            if(!empty($_FILES['featured_image'])) {   
                $destination = $folder . date("Y-m-d-h-i-s") . $_FILES['featured_image']['name'];
                move_uploaded_file($_FILES['featured_image']['tmp_name'], $destination);
                $_POST['featured_image'] = $destination;
            }
            
            // Handle CKEditor data
            $data->description = $request->getBody()['description'];

            // Additional fields
            $_POST['updated_at'] = date("Y-m-d-h-i-s");

            // Load data and validate
            $this->tool->loadData($_POST);

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

    public function delete(Request $request, Response $response) 
    {

    }
}