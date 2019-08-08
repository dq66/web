<?php
namespace app\controllers\web;

use yii\web\Controller;
use app\models\Core;
use yii\helpers\Json;

class CoreController extends Controller
{
    public $layout = 'admin';
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionSelall()
    {
        $data = Core::find()->all();
        return Json::encode($data);
    }

    public function actionAdd()
    {
        $model = new Core();
        if (\Yii::$app->request->isPost) {
            $data = \Yii::$app->request;
            $cont = $data->post('content');
            if (empty($cont)) {
                \Yii::$app->session->setFlash('error', '内容不能为空！');
            }
            $model->title = $data->post('title');
            $model->keyword = $data->post('keyword');
            $model->source = $data->post('source');
            $model->content = $data->post('content');
            $model->html = $data->post('html');
            $model->time = date('Y-m-d h:i:s');
            if (isset($_SESSION['img'])) {
                $model->img = $_SESSION['img'];
            }
            if ($model->save()) {
                \Yii::$app->session->setFlash('success', '添加成功');
            } else {
                \Yii::$app->session->setFlash('error', '添加失败: ' . $model->getErrors());
            }
            $this->redirect(['web/core/index']);
        }

        return $this->render('add', ['model' => $model]);
    }

    public function actionUpdate()
    {
        if (\Yii::$app->request->isPost) {
            $data = \Yii::$app->request;
            // p($data->post());
            $cont = $data->post('content');
            if (empty($cont)) {
                \Yii::$app->session->setFlash('error', '内容不能为空！');
            }
            $model = Core::findOne($data->post('id'));
            $model->title = $data->post('title');
            $model->keyword = $data->post('keyword');
            $model->source = $data->post('source');
            $model->content = $data->post('content');
            $model->html = $data->post('html');
            if (isset($_SESSION['img'])) {
                $model->img = $_SESSION['img'];
            }
            if ($model->save()) {
                \Yii::$app->session->setFlash('success', '编辑成功');
            } else {
                \Yii::$app->session->setFlash('error', '编辑失败: ' . $model->getErrors());
            }
            $this->redirect(['web/core/index']);
        }

        $model = Core::findOne(\Yii::$app->request->get('id'));

        return $this->render('update', ['data' => $model]);
    }

    public function actionDelete()
    {
        $model = Core::findOne(\Yii::$app->request->get('id'));
        if ($model->delete()) {
            echo "ok";
        } else {
            echo "error";
        }
    }
}
