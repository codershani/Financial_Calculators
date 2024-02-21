<?php

namespace app\controllers;
use app\core\Application;
use app\core\Controller;
use app\core\middlewares\AuthMiddlewares;
use app\core\Request;
use app\core\Response;
use app\models\Project;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddlewares(['project', 'upload', 'edit']));
    }

    public function index()
    {
        $project = new Project();

        $this->setLayout('main');
        
        return $this->render('frontend/project', [
            'model' => $project
        ]);
    }

    public function project()
    {
        $project = new Project();
        
        $this->setLayout('admin');
        return $this->render('admin/project', [
            'model' => $project
        ]); 
    }

    public function upload(Request $request, Response $response)
    {
        $project = new Project();
        if($request->isPost()) {
            $project->loadData($request->getBody());

            if($project->validate() && $project->save()) {
                Application::$app->session->setFlash('success', 'Video Uploaded');
                Application::$app->response->redirect('/admin/project');
            }

            return $this->render('admin/projectUpload', [
                'model' => $project
            ]); 
        }
        
        $this->setLayout('admin');
        return $this->render('admin/projectUpload', [
            'model' => $project
        ]); 
    }

    public function edit(Request $request, Response $response)
    {

        $project = new Project();
        if($request->isPost()) {
            $project->loadData($request->getBody());

            if($project->validate() && $project->update(['id' => '11'])) {
                Application::$app->session->setFlash('success', 'Video Updated');
                Application::$app->response->redirect('/admin/project');
            }

            return $this->render('admin/projectUpload', [
                'model' => $project
            ]);
        }

        $this->setLayout('admin');
        return $this->render('admin/projectUpload', [
            'model' => $project
        ]); 
    }
}