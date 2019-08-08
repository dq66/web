<?php
namespace app\controllers\web;

use yii\web\Controller;
use app\models\Type;
use yii\helpers\Json;
use yii\web\UploadedFile;
use yii\base\Model;



class TypeController extends Controller
{
    // public $enableCsrfValidation = false;
    public $layout = 'admin';
    /**
     * 调用模板
     *
     * @return void
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * ajax查询所有类型
     *
     * @return void
     */
    public function actionTypeall()
    {
        $data = Type::find()->all();

        return Json::encode($data);
    }

    /**
     * 添加类型
     *
     * @return void
     */
    public function actionAdd()
    {
        if (\Yii::$app->request->isPost) {
            $model = new Type();
            $data = \Yii::$app->request->post('Type', []);
            $model->type_name = $data['type_name'];
            $model->img = UploadedFile::getInstance($model, 'img');
            $path = createCatalog();
            if ($model->img->saveAs($path . \time() . '.' . $model->img->extension)) {
                $model->img = $path . \time() . '.' . $model->img->extension;
            }

            if ($model->insert()) {
                \Yii::$app->session->setFlash('success', '添加成功');
            } else {
                \Yii::$app->session->setFlash('error', '添加失败: ' . $model->getErrors());
            }
            $this->redirect(['web/type/index']);
        }
    }

    /**
     * 编辑类型
     *
     * @return void
     */
    public function actionEdit()
    {
        if (\Yii::$app->request->isPost) {
            $data = \Yii::$app->request->post('Type', []);
            $model = Type::findOne($data['id']);
            $model->img = UploadedFile::getInstance($model, 'img');
            if ($model->img) {
                $path = createCatalog();
                if ($model->img->saveAs($path . \time() . '.' . $model->img->extension)) {
                    $model->img = $path . \time() . '.' . $model->img->extension;
                }
            } else {
                $model->img = \Yii::$app->request->post('yimg');
            }
            $model->type_name = $data['type_name'];
            if ($model->save()) {
                \Yii::$app->session->setFlash('success', '编辑成功');
            } else {
                \Yii::$app->session->setFlash('error', '编辑失败');
            }
            $this->redirect(['web/type/index']);
        }
    }

    /**
     * 根据ID删除类型信息
     *
     * @return void
     */
    public function actionDelete()
    {
        $model = Type::findOne(\Yii::$app->request->get('id'));
        if ($model->delete()) {
            echo "ok";
        } else {
            echo "error";
        }
    }

    public function actionUpload()
    {
        print_r(\Yii::$app->request->post());
        $model = new Type();
        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'img');
            if ($model->upload()) {
                // 文件上传成功
                return;
            }
        }
        return $this->render('upload', ['model' => $model]);
    }
}
