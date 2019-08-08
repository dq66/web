<?php
namespace app\controllers;

use yii\web\Controller;

class HomeController extends Controller
{

    public function actionIndex()
    {
        $data = ["name" => "张三", "age" => 20];
        p($data);

    }

    public function actionAbc()
    {
        return 333;
    }
}
