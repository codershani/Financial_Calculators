<?php

namespace app\controllers;
use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\ContactForm;
use app\models\Tool;

/**
 * Summary of SiteController
 * @author CoderShani
 * @package app\controllers
 * @copyright (c) 2023
 */
class SiteController extends Controller
{
    public Tool $tools;

    public function __construct() 
    {
        $this->tools = new Tool();
    }

    public function index(Request $request) 
    {
        $slug = $request->getRouteParams()['slug'];

        $tool = $this->tools->getTool(['slug' => $slug]);

        $this->setLayout('main');
        return $this->render('frontend/single-tool', [ 'tool' => $tool]);

    } 

    /**
     * Summary of home
     * @return array|string
     */
    public function home()
    {
        $tool_details = $this->tools->getToolDetails();


        $params = [
            "name" => "CoderShani",
            "tools" => $tool_details,
        ];

        return $this->render('frontend/home', $params);
    }

}