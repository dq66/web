<?php
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\bootstrap\Alert;
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>后台 - 修改密码</title>
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="shortcut icon" href="favicon.ico">
    <link href="/admin/css/bootstrap.min.css-v=3.3.5.css" rel="stylesheet">
    <link href="/admin/css/font-awesome.min.css-v=4.4.0.css" rel="stylesheet">
    <link href="/admin/css/animate.min.css" rel="stylesheet">
    <link href="/admin/css/style.min.css-v=4.0.0.css" rel="stylesheet">

</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>修改密码</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="form_basic.html#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="form_basic.html#">选项1</a>
                                </li>
                                <li><a href="form_basic.html#">选项2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                    <?php
                    // 后台错误输出提示
                    if (Yii::$app->getSession()->hasFlash('error')) {
                        echo Alert::widget([
                            'options' => ['class' => 'alert-error'],
                            'body' => Yii::$app->session->getFlash('error')
                        ]);
                    }
                    // 后台成功输出提示
                    if (Yii::$app->getSession()->hasFlash('success')) {
                        echo Alert::widget([
                            'options' => ['class' => 'alert-success'],
                            'body' => Yii::$app->session->getFlash('success')
                        ]);
                    }
                    ?>
                        <?php $form = ActiveForm::begin([
                            'method' => 'post',
                            'id' => 'signupForm',
                            'options' => [
                                'class' => 'form-horizontal m-t'
                            ]
                        ]); ?>
                        <!-- <form method="post" class="form-horizontal m-t" id="signupForm"> -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">原密码：</label>
                                <div class="col-sm-8">
                                    <input id="pwd" name="pwd" class="form-control" type="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">新密码：</label>
                                <div class="col-sm-8">
                                    <input id="password" name="password" class="form-control" type="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">确认密码：</label>
                                <div class="col-sm-8">
                                    <input id="confirm_password" name="confirm_password" class="form-control" type="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-3">
                                    <button class="btn btn-primary" type="submit">提交</button>
                                </div>
                            </div>
                            <?php ActiveForm::end(); ?>
                        <!-- </form> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/admin/js/jquery.min.js-v=2.1.4"></script>
    <script src="/admin/js/bootstrap.min.js-v=3.3.5"></script>
    <script src="/admin/js/content.min.js-v=1.0.0"></script>
    <script src="/admin/js/plugins/validate/jquery.validate.min.js"></script>
    <script src="/admin/js/plugins/validate/messages_zh.min.js"></script>
    <script src="/admin/js/demo/form-validate-demo.min.js"></script>
</body>

</html>
