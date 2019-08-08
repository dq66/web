<?php
namespace app\controllers\web;

use yii\web\Controller;
use app\models\About;


class AboutController extends Controller
{

    public $layout = 'admin';

    /**
     * 公司简介
     *
     * @return void
     */
    public function actionProfile()
    {
        $model = About::findOne(1);
        if (\Yii::$app->request->isPost) {
            $model->profile = \Yii::$app->request->post('profile');
            if ($model->save()) {
                \Yii::$app->session->setFlash('success', '提交成功！');
            } else {
                \Yii::$app->session->setFlash('error', '提交失败！');
            }
        }
        return $this->render('profile', ['model' => $model]);
    }

    /**
     * 企业文化
     *
     * @return void
     */
    public function actionCulture()
    {
        $model = About::findOne(1);

        if (\Yii::$app->request->isPost) {
            $model->culture = \Yii::$app->request->post('culture');
            if ($model->save()) {
                \Yii::$app->session->setFlash('success', '提交成功！');
            } else {
                \Yii::$app->session->setFlash('error', '提交失败！');
            }
        }
        return $this->render('culture', ['model' => $model]);
    }

    /**
     * 组织架构
     *
     * @return void
     */
    public function actionStructure()
    {
        $model = About::findOne(1);
        if (\Yii::$app->request->isPost) {
            $model->structure = \Yii::$app->request->post('structure');
            if ($model->save()) {
                \Yii::$app->session->setFlash('success', '提交成功！');
            } else {
                \Yii::$app->session->setFlash('error', '提交失败！');
            }
        }
        return $this->render('structure', ['model' => $model]);
    }

    /**
     * 企业荣誉
     *
     * @return void
     */
    public function actionHonor()
    {
        $model = About::findOne(1);
        if (\Yii::$app->request->isPost) {
            $model->honor = \Yii::$app->request->post('honor');
            if ($model->save()) {
                \Yii::$app->session->setFlash('success', '提交成功！');
            } else {
                \Yii::$app->session->setFlash('error', '提交失败！');
            }
        }
        return $this->render('honor', ['model' => $model]);
    }

    /**
     * 设备环境
     *
     * @return void
     */
    public function actionDevice()
    {
        $model = About::findOne(1);
        if (\Yii::$app->request->isPost) {
            $model->device = \Yii::$app->request->post('device');
            if ($model->save()) {
                \Yii::$app->session->setFlash('success', '提交成功！');
            } else {
                \Yii::$app->session->setFlash('error', '提交失败！');
            }
        }
        return $this->render('device', ['model' => $model]);
    }

    /**
     * 销售网络
     *
     * @return void
     */
    public function actionNetwork()
    {
        $model = About::findOne(1);
        if (\Yii::$app->request->isPost) {
            // var_dump(\Yii::$app->request->post());
            $model->network = \Yii::$app->request->post('network');
            if ($model->save()) {
                \Yii::$app->session->setFlash('success', '提交成功！');
            } else {
                \Yii::$app->session->setFlash('error', '提交失败！');
            }
        }
        return $this->render('network', ['model' => $model]);
    }

    /**
     * 企业风采
     *
     * @return void
     */
    public function actionStyle()
    {
        $model = About::findOne(1);
        if (\Yii::$app->request->isPost) {
            $model->style = \Yii::$app->request->post('style');
            if ($model->save()) {
                \Yii::$app->session->setFlash('success', '提交成功！');
            } else {
                \Yii::$app->session->setFlash('error', '提交失败！');
            }
        }
        return $this->render('style', ['model' => $model]);
    }

    /**
     * 客户展示
     *
     * @return void
     */
    public function actionDisplay()
    {
        $model = About::findOne(1);
        if (\Yii::$app->request->isPost) {
            $model->display = \Yii::$app->request->post('display');
            if ($model->save()) {
                \Yii::$app->session->setFlash('success', '提交成功！');
            } else {
                \Yii::$app->session->setFlash('error', '提交失败！');
            }
        }
        return $this->render('display', ['model' => $model]);
    }
}
