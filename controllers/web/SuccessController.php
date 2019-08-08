<?php
namespace app\controllers\web;

use yii\web\Controller;
use app\models\Success;
use yii\helpers\Json;
use app\models\Type;
use yii\web\UploadedFile;


class SuccessController extends Controller
{
    public $enableCsrfValidation = false;
    public $layout = 'admin';
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionSelall()
    {
        $data = Success::find()->with('type')->asArray()->all();
        return Json::encode($data);
    }

    public function actionAdd()
    {
        $model = new Success();
        if (\Yii::$app->request->isPost) {
            // p(\Yii::$app->request->post());
            $post = \Yii::$app->request;
            $da = Success::find()->where(['name' => $post->post('name')])->all();
            if ($da) {
                \Yii::$app->session->setFlash('error', '该文章已存在！');
            } else {
                $model->type_id = $post->post('type_id');
                $model->name = $post->post('name');
                $model->address = $post->post('address');
                $model->explain = $post->post('explain');
                $model->html = $post->post('html');
                $model->num = $post->post('num');
                if (isset($_SESSION['img'])) {
                    $model->img = $_SESSION['img'];
                }
                $model->time = date('Y-m-d h:i:s');
                if ($model->save()) {
                    \Yii::$app->session->setFlash('info', '添加成功');
                } else {
                    \Yii::$app->session->setFlash('info', '添加失败: ' . $model->getErrors());
                }
                $this->redirect(['web/success/index']);
            }


        }
        $type = Type::find()->all();
        return $this->render('add', ['model' => $model, 'type' => $type]);
    }

    public function actionUpdate()
    {
        if (\Yii::$app->request->isPost) {
            $data = \Yii::$app->request;
            // var_dump($data->post());
            $model = Success::findOne($data->post('id'));
            $model->type_id = $data->post('type_id');
            $model->name = $data->post('name');
            $model->address = $data->post('address');
            $model->explain = $data->post('explain');
            $model->html = $data->post('html');
            $model->num = $data->post('num');
            if (isset($_SESSION['img'])) {
                $model->img = $_SESSION['img'];
            }
            if ($model->save()) {
                \Yii::$app->session->setFlash('info', '编辑成功');
            } else {
                \Yii::$app->session->setFlash('info', '编辑失败： ' . $model->getErrors());
            }
            $this->redirect(['web/success/index']);
        }
        $model = Success::findOne(\Yii::$app->request->get('id'));
        $type = Type::find()->all();
        return $this->render('update', ['model' => $model, 'type' => $type]);
    }

    public function actionDelete()
    {
        // print_r(\Yii::$app->request->get());
        $model = Success::findOne(\Yii::$app->request->get('id'));
        if ($model->delete()) {
            echo "ok";
        } else {
            echo "error";
        }
    }

    public function actionUpload()
    {
        $file = new UploadedFile();
        $file->name = $_FILES["file"]['name'];
        $file->tempName = $_FILES["file"]['tmp_name'];
        $file->type = $_FILES["file"]['type'];
        $file->size = $_FILES["file"]['size'];
        $file->error = $_FILES["file"]['error'];
        $model = new Success();
        $model->img = $file;
        $path = 'uploads/' . date('Y-m-d') . '/';
        if (!\file_exists($path)) {
            createDir($path);
        }
        $path = $path . \time() . '.' . $model->img->extension;
        if ($model->img->saveAs($path)) {
            $model->img = $path;
            $_SESSION['img'] = $path;
        }
        $data = [
            'errno' => 0,
            'data' => ['../../' . $model->img]
        ];
        return Json::encode($data);
    }
}
