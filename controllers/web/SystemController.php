<?php
namespace app\controllers\web;

use yii\web\Controller;
use app\models\System;
use yii\web\UploadedFile;

class SystemController extends Controller
{
    public $layout = "admin";
    public $enableCsrfValidation = false;

    /**
     * 显示/编辑 系统设置
     *
     * @return void
     */
    public function actionIndex()
    {
        $model = System::findOne(1);
        if (\Yii::$app->request->isPost) {
            // var_dump(\Yii::$app->request->post());
            $model->load(\Yii::$app->request->post());
            if ($model->save()) {
                \Yii::$app->session->setFlash('success', '提交成功！');
            } else {
                \Yii::$app->session->setFlash('error', '提交失败！');
            }
        }

        return $this->render('index', ['model' => $model]);
    }

    /**
     * 编辑logo
     *
     * @return void
     */
    public function actionLogo()
    {
        if (\Yii::$app->request->isPost) {

            $model = System::findOne(1);
            $model->logo = $this->img('logo');
            $path = createCatalog();
            $path = $path . \time() . '.' . $model->logo->extension;
            if ($model->logo->saveAs($path)) {
                $model->logo = '../../' . $path;
            }
            if ($model->save()) {
                echo '../../' . $path;
            }

        } else {
            echo "非法请求";
        }
    }

    /**
     * 编辑二维码
     *
     * @return void
     */
    public function actionQrcode()
    {
        if (\Yii::$app->request->isPost) {

            $model = System::findOne(1);
            $model->rwm = $this->img('rwm');
            $path = createCatalog();
            $path = $path . \time() . '.' . $model->rwm->extension;
            if ($model->rwm->saveAs($path)) {
                $model->rwm = '../../' . $path;
            }
            if ($model->save()) {
                echo '../../' . $path;
            }

        } else {
            echo "非法请求";
        }
    }

    /**
     * 编辑背景图
     *
     * @return void
     */
    public function actionBackgroundimage()
    {
        if (\Yii::$app->request->isPost) {

            $model = System::findOne(1);
            $model->bjimg = $this->img('bjimg');
            $path = createCatalog();
            $path = $path . \time() . '.' . $model->bjimg->extension;
            if ($model->bjimg->saveAs($path)) {
                $model->bjimg = '../../' . $path;
            }
            if ($model->save()) {
                echo '../../' . $path;
            }

        } else {
            echo "非法请求";
        }
    }

    /**
     * 将异步上传的图片转换成对象
     *
     * @param [type] $name：上传的图片名称
     *
     * @return void
     */
    public function img($name)
    {
        $file = new UploadedFile();
        $file->name = $_FILES[$name]['name'];
        $file->tempName = $_FILES[$name]['tmp_name'];
        $file->type = $_FILES[$name]['type'];
        $file->size = $_FILES[$name]['size'];
        $file->error = $_FILES[$name]['error'];
        return $file;
    }

    public function actionCs()
    {
        $data = [
            0 => [
                'id' => 1,
                'company_id' => 0,
                'branch_id' => 0,
                'table_name' => 'customer',
                'field_name' => 'customer_name',
                'field_label' => '客户名称',
                'input_type' => 'text',
                'expression' => '', //运算表达式
                'type' => 'native', //native表示数据库里面的字段，extend表示拓展字段
                'visible' => 'system',//显示的列
                'data' => '{"visible":["system"]}', //配置数据
            ],
            1 => [
                'id' => 2,
                'company_id' => 0,
                'branch_id' => 0,
                'table_name' => 'customer',
                'field_name' => 'sex',
                'field_label' => '性别',
                'input_type' => 'text',
                'expression' => '',
                'type' => 'native',
                'visible' => 'system',
                'data' => '{"visible":["system"]}',
            ],
            2 => [
                'id' => 3,
                'company_id' => 0,
                'branch_id' => 0,
                'table_name' => 'customer',
                'field_name' => 'customer_name',
                'field_label' => '测试',
                'input_type' => 'text',
                'expression' => '', //运算表达式
                'type' => 'native', //native表示数据库里面的字段，extend表示拓展字段
                'visible' => 'system',//显示的列
                'data' => '{"visible":["system"]}', //配置数据
            ],
            3 => [
                'id' => 4,
                'company_id' => 0,
                'branch_id' => 0,
                'table_name' => 'customer',
                'field_name' => 'customer_name',
                'field_label' => '客户',
                'input_type' => 'text',
                'expression' => '', //运算表达式
                'type' => 'native', //native表示数据库里面的字段，extend表示拓展字段
                'visible' => 'system',//显示的列
                'data' => '{"visible":["system"]}', //配置数据
            ]
        ];
        return $this->render('cs', ['data' => $data]);
    }
}
