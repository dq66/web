<?php
namespace app\controllers\web;

use yii\web\Controller;
use app\models\SuccessType;
use app\models\Admin;
use yii\web\UploadedFile;


class IndexController extends Controller
{
    public $layout = "admin";
    public $enableCsrfValidation = false;// ajax提交报400错误
    public function actionIndex()
    {
        if (!isset($_SESSION['admin'])) {
            $this->redirect(['web/index/login']);
        } else {
            $admin = Admin::find()->where(['name' => $_SESSION['admin']])->one();
            // var_dump($admin);
            return $this->render('index', ['admin' => $admin]);
        }
    }
//
    public function actionAdmin()
    {
        return $this->render('admin');
    }

    public function actionType()
    {
        // $sql = "select * from success_type where id=1 or 1=1";
        // $data = SuccessType::findBySql($sql)->all();
        // 查询全部数据
        $data = SuccessType::find()->all();
        // 根据条件查询
        // $data = SuccessType::find()->where(['id' => 2])->all();
        // 查询id大于2的数据
        // $data = SuccessType::find()->where(['>', 'id', 2])->all();
        // p($data);
        return $this->render('type', ['data' => $data]);
    }

    public function actionLogin()
    {
        $model = new Admin();
        if (\Yii::$app->request->isPost) {
            // $post = \Yii::$app->request->post();
            // if ($model->login($post)) {
            //     $this->redirect(['web/index/index']);
            // }
            // $da = \Yii::$app->request->post('Admin');
            $da = \Yii::$app->request->post();
            $admin = Admin::find()->where(['name' => $da['name'], 'pwd' => md5($da['pwd'])])->all();

            if ($admin) {
                $session = \Yii::$app->session;
                $session->open();
                $session['admin'] = $da['name'];
                $this->redirect(['web/index/index']);
            } else {
                \Yii::$app->session->setFlash('error', '账号或密码错误！');
            }
        }
        return $this->render('login', ['model' => $model]);
    }

    public function actionAvatar()
    {
        $model = Admin::findOne(1);
        if (\Yii::$app->request->isPost) {
            $model->img = UploadedFile::getInstance($model, 'img');
            $path = createCatalog();
            if ($model->img->saveAs($path . \time() . '.' . $model->img->extension)) {
                $model->img = $path . \time() . '.' . $model->img->extension;
            }
            if ($model->save()) {
                \Yii::$app->session->setFlash('success', '修改成功');
            } else {
                \Yii::$app->session->setFlash('error', '修改失败');
            }
            $this->redirect(['web/index/avatar']);

        } else {
            return $this->render('img', ['model' => $model]);
        }

    }

    public function actionPwd()
    {
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            $admin = Admin::find()->where(['name' => $_SESSION['admin'], 'pwd' => md5($post['pwd'])])->all();
            if ($admin) {
                $model = Admin::findOne($admin[0]->id);
                $model->pwd = md5($post['password']);
                if ($model->save()) {
                    \Yii::$app->session->setFlash('success', '修改成功');
                    // $this->redirect(['web/index/login']);
                    $this->redirect(['web/index/pwd']);
                } else {
                    \Yii::$app->session->setFlash('error', '修改失败');
                    $this->redirect(['web/index/pwd']);
                }
            } else {
                \Yii::$app->session->setFlash('error', '原密码错误！');
                $this->redirect(['web/index/pwd']);
            }

        } else {
            return $this->render('pwd');
        }

    }

    public function actionLogout()
    {
        if (\Yii::$app->session->remove('admin')) {
            $this->redirect(['web/index/login']);
        } else {
            $this->goBack();
        }
    }

}
