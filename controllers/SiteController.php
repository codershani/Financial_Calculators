<?php

namespace app\controllers;
use app\core\Calculator;
use app\core\Controller;
use app\core\exception\ClassNotFoundException;
use app\core\Request;
use app\models\Tool;
use app\models\ToolClass;

/**
 * Summary of SiteController
 * @author CoderShani
 * @package app\controllers
 * @copyright (c) 2023
 */
class SiteController extends Controller
{
    public Tool $tools;
    public ToolClass $toolClass;
    public Calculator $calculator;
    public $result = '';

    public function __construct() 
    {
        $this->tools = new Tool();
        $this->toolClass = new ToolClass();
    }

    public function index(Request $request)
    {
        $slug = $request->getRouteParams()['slug'];
        $tool = $this->tools->getTool(['slug' => $slug]);

        if($request->isPost()) {
            
            // Convert slug to class name using the mapping
            $calculatorClassName = $this->getCalculatorClassName($slug);
            
            if ($calculatorClassName && class_exists($calculatorClassName)) {
                $this->calculator = new $calculatorClassName();
                
                // Perform calculations using the calculator
                $this->result = $this->calculator->calculate($request->getBody()); // Assuming form data is sent in the request body
                
            } else {
                $this->setLayout('error');
                return $this->render('frontend/_error', ['exception' => new ClassNotFoundException]);
            }
        }

        // Render the view with the tool and calculator result
        $this->setLayout('main');
        return $this->render('frontend/single-tool', ['tool' => $tool, 'result' => $this->result]);
    }

    private function getCalculatorClassName($slug)
    {
        // Convert slug to class name using the mapping
        $toolClass = $this->toolClass->getClassName(['slug' => $slug]);

        if ($toolClass) {
            return 'app\\classes\\' . $toolClass->class_name;
        }

        return null;
    }

    /**
     * Summary of home
     * @return array|string
     */
    public function home()
    {
        $tool_details = $this->tools->getToolDetails();

        $params = [
            "tools" => $tool_details,
        ];

        return $this->render('frontend/home', $params);
    }

}